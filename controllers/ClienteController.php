<?php
class ClienteController extends Controller
{

  private $login;

  public function index()
  {
    
    $this->login = new loginModel();

    $datas = array(
      "title" => "Area Cliente"
    );

    if($this->login->isClienteLogged())
    {
      $this->render("cliente", $datas);

    } 
    else 
    {
      //direcionar para a home
      header("Location:.$BASE_URL");
    }

  }
 
  

}