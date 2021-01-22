<?php
class LoginController extends Controller
{

  //private $loja;
  //private $cliente;
  private $login;
  
  public function __constructor()
  {
    $this->login = new loginModel();
  }

  public function index()
  {

    $datas = array(
      "title" => "Login"
    );

    if (isset($_POST['login']) && !empty($_POST['login'])) 
    {
      
      if ($_POST['radiobutton'] == '1') //loja busca na tabela loja
      {
        //$this->loja = new lojaModel();
        $this->loja->setEmail(($_POST['login']));
        $this->loja->setSenha(($_POST['password']));

        if($this->loja->getLoginLoja())
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
        
        //$this->cliente = new clienteModel();
        $this->login->setEmail(($_POST['login']));
        $this->login->setSenha(($_POST['password']));

        if($this->login->getLoginCliente())
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
  
}
