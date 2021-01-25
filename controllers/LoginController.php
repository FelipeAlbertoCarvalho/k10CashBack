<?php
class LoginController extends Controller
{

  private $loginLoja;
  private $loginCliente;
  private $loginAdmin;

  public function index()
  {

    $datas = array(
      "title" => "Login"
    );

    if (isset($_POST['login']) && !empty($_POST['login'])) 
    {
      
      if ($_POST['radiobutton'] == '1') //loja busca na tabela loja
      {
        $this->loginLoja = new loginModel();
        $this->loginLoja->setEmail(($_POST['login']));
        $this->loginLoja->setSenha(($_POST['password']));

        if($this->loginLoja->getLoginLoja())
        {
          //login efetuado com sucesso chama a page da loja
          $this->render("loja", $datas);
        } 
        else 
        {
          //deu erro no login deve ir pra outro lugar

        }

      } 
      else 
      {  //cliente, busca na tabela cliente
        
        $this->loginCliente = new loginModel();
        $this->loginCliente->setEmail(($_POST['login']));
        $this->loginCliente->setSenha(($_POST['password']));

        if($this->loginCliente->getLoginCliente())
        {
          //login efetuado com sucesso chama a page do cliente
          $this->render("cliente", $datas);
        } 
        else 
        {
          //deu erro no login deve ir pra outro lugar
        }
      }

    } 
    else 
    {
      $this->render("home", $datas);
    }

  }
  
  public function admin()
  {
    $this->loginAdmin = new loginModel();
    $this->loginAdmin->setEmail(($_POST['login']));
    $this->loginAdmin->setSenha(($_POST['password']));

    $datas = array(
      "title" => "Administrador"
    );

    if($this->loginAdmin->getLoginAdmin())
    {
      //login efetuado com sucesso chama a page do admin
      $this->render("admin", $datas);
    } 
    else 
    {
      //deu erro no login deve ir pra outro lugar
      
    }
  }

  public function validarLogin()  //recebe a pagina para redirecionar e o que retrnou do model
  {

  }

}
