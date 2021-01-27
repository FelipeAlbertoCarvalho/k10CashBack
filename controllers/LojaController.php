<?php
class LojaController extends Controller
{

  private $login;

  public function index()
  {

    $this->login = new loginModel();

    $datas = array(
      "title" => "Area Cliente"
    );

    if($this->login->isLojaLogged())
    {
      $this->render("loja", $datas);

    } 
    else 
    {
      header("Location:.$BASE_URL");
    }

    

  }
  
}