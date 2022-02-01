<?php

class Controller
{

  public function model()
  {
    require_once MODELS_FOLDER . $models . '.php';
    return new $model;
  }

  public function view($view, $dados = [])
  {
    $arquivo = (VIEWS_FOLDER . $view . '.php');
    if (file_exists($arquivo)) :
      require_once $arquivo;
    else:
      die('O arquivo de view não existe!');
    endif;
  }

  public function notfound()
  {
    $this->view('Templates/header', ['titulo' => 'Página não encontrada']);
    $this->view('Pages/404');
  }
}
