<?php 

class Sobre extends Controller {

  public function index() {
    $this->view('Templates/header', ['titulo' => 'Sobre']);
    $this->view('Pages/sobre');
    $this->view('Templates/footer');
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