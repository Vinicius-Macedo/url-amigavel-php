<?php

class Controller
{

  public function model()
  {
    require_once '../app/Models/' . $models . '.php';
    return new $model;
  }

  public function view($view, $dados = [])
  {
    $arquivo = ('../app/Views/' . $view . '.php');
    if (file_exists($arquivo)) :
      require_once $arquivo;
    else:
      die('O arquivo de view não existe!');
    endif;
  }
}
