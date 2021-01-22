<?php
class LoginController extends Controller
{

  private $loja;
  private $cliente;

  public function index()
  {

    $datas = array(
      "title" => "Login"
    );

    if (isset($_POST['login']) && !empty($_POST['login'])) 
    {
      
      if ($_POST['radiobutton'] == '1') //loja busca na tabela loja
      {
        $this->loja = new lojaModel();
        $this->loja->setEmail(($_POST['login']));
        $this->loja->setSenha(($_POST['password']));

        if($this->loja->getLogin())
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
        
        $this->cliente = new clienteModel();
        $this->cliente->setEmail(($_POST['login']));
        $this->cliente->setSenha(($_POST['password']));

        if($this->cliente->getLogin())
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