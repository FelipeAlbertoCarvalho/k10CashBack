<?php
class LoginController extends Controller
{

  private $loginLoja;
  private $loginCliente;

  
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
        
<<<<<<< HEAD
        $this->loginCliente = new loginModel();
        $this->loginCliente->setEmail(($_POST['login']));
        $this->loginCliente->setSenha(($_POST['password']));

        if($this->loginCliente->getLoginCliente())
=======
        //$this->cliente = new clienteModel();
        $this->login->setEmail(($_POST['login']));
        $this->login->setSenha(($_POST['password']));

        if($this->login->getLoginCliente())
>>>>>>> a6c1b18dd4e8ca9a874ba04a879f14e1e055c92a
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
