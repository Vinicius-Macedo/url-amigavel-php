<?php


class Notfound extends Controller {
  
  public function index() {
    $this->view('Templates/header', ['titulo' => 'Página não encontrada']);
    $this->view('Pages/404');
  }
}