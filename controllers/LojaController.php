<?php
class LojaController extends Controller
{
  public function index()
  {
    
    $datas = array(
      "title" => "Area Loja"
    );

    $this->render("loja", $datas);
  }
  
}