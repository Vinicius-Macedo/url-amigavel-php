<?php


class Unfold extends Controller {
  
  public function index() {
    $this->view('Templates/header', ['titulo' => 'Página não encontrada']);
    $this->view('Pages/404');
    $this->view('Templates/footer');
  }
}