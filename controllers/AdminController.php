<?php
class AdminController extends Controller
{

  private $admin;

  public function index()
  {

    if(isset($_SESSION['id_admin'])) //se já estiver logado
    {
      $this->home();
    }
    else 
    {
      $datas = array(
      "title" => "Login Admin"
      );
      $this->render("adminLogin", $datas);
    }

  }

  public function home()
  {
    $datas = array(
      "title" => "Administrador"
    );

    $this->render("admin", $datas);
  }



  public function cadastrarAdmin()  //chamo aqui quando é para efetuar  cadastro
  {
    $this->admin = new AdminModel();

    $this->admin->setNome(($_POST['nome']));
    $this->admin->setEmail($_POST['email']);
    $this->admin->setSenha($_POST['password']);

    echo ($this->admin->cadastrarAdmin());
    //retornar erro na entrada como eu faço quando for inserir dois email iguais?
    
    $datas = array(
      "title" => "Login Administrador"
    );
    
    $this->render("adminLogin", $datas);

  }

}