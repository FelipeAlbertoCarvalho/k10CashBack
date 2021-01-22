<?php
class ClienteController extends Controller
{
  public function index()
  {

    $datas = array(
      "title" => "Area Cliente"
    );

    $this->render("cliente", $datas);
  }
  
}