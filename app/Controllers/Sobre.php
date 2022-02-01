<?php 

class Sobre extends Controller {

  public function index() {
    $this->view('Templates/header', ['titulo' => 'Sobre']);
    $this->view('Pages/sobre');
  }

  public function empresa() {
    $this->view('Templates/header', ['titulo' => 'Sobre - emrpresa']);
    $this->view('Pages/sobre/empresa');
  }
  
  public function notfound()
  {
    $this->view('Templates/header', ['titulo' => 'Página não encontrada']);
    $this->view('Pages/404');
  }
}

// CONTROLER CLASS

// public function model()
// {
//   require_once '../app/Models/' . $models . '.php';
//   return new $model;
// }

// public function view($view, $dados = [])
// {
//   $arquivo = ('../app/Views/' . $view . '.php');
//   if (file_exists($arquivo)) :
//     require_once $arquivo;
//   else:
//     die('O arquivo de view não existe!');
//   endif;
// }