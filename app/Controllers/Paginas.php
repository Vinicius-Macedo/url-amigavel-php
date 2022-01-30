<?php 

class Paginas extends Controller {

  public function index() {
    $this->view('Templates/header', ['titulo' => 'Home']);
    $this->view('Pages/home');
    $this->view('Templates/footer');
  }

}