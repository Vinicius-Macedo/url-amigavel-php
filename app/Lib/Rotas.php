<?php

// ESSA CLASSE CHECA A URL E CHAMA OS ARQUIVOS E MÉTODOS CORRESPONDENTES DO CONTROLLER
class Rotas
{
  // // PARÂMETROS PARA OS CONTROLLERS NO SITE
  // O ARQUIVO
  private $controller;
  // O MÉTODO
  private $render;
  // OS PARÂMETROS
  private $parameters = [];

  // CHAMA E CHECA OS CONTROLLERS
  public function __construct()
  {
    // PEGA A URL SANITIZA E FORMATA ELA | EVITAR ERROS CASO ADIANTE OS METÓDOS TENTEM CHECAR O INDICE DE UM TIPO NULL;
    $url = $this->getUrl() ? $this->getUrl() : [0];
    // CHECA OS CONTROLLERS
    $url = $this->checkController($url);

    // CRIAR UMA CLASSE PARA ACESSAR OS MÉTODOS DO CONTROLLER
    require_once CONTROLLERS_FOLDER . $this->controller . '.php';
    $this->controller = new $this->controller();

    // CHECA SE $render existe e seta
    $url = $this->checkRender($url);

    // EXECUTA AS FUNÇÕES DE RENDERIZAÇÃO DO CONTROLLER
    $this->parameters = $url ? array_values($url) : [];
    call_user_func_array([$this->controller, $this->render], $this->parameters);
  }

  // PEGA A URL E SANITIZA ELA
  private function getUrl()
  {
    $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
    if (isset($url)) :
      $url = trim(rtrim($url, '/'));
      $url = explode('/', $url);
      return $url;
    endif;
  }

  // CHECA SE $controller EXISTE E SETA
  private function checkController($url)
  {
    if (file_exists(CONTROLLERS_FOLDER . ucwords($url[0]) . '.php')) :
      $this->controller = ucwords($url[0]);
      // ELIMA O VALOR [0] PARA NÃO SER INSERIDO EM PARAMETERS MAIS A FRENTE NO __CONSTRUCT
      unset($url[0]);
    elseif ($url == [0]) :
      $this->controller = 'Home';
    else :
      $this->controller = 'Notfound';
    endif;
    return $url;
  }

  // CHECAR SE  $render EXISTE E SETA
  private function checkRender($url)
  {
    if (isset($url[1])) :
      if (method_exists($this->controller, $url[1])) :
        $this->render = $url[1];
        // ELIMA O VALOR [0] PARA NÃO SER INSERIDO EM PARAMETERS MAIS A FRENTE NO __CONSTRUCT
        unset($url[1]);
      else :
        $this->render = 'notfound';
      endif;
    else :
      $this->render = 'index';
    endif;
    return $url;
  }
}