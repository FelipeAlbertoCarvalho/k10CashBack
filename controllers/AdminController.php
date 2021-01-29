<?php
class AdminController extends Controller
{

  private $admin;
  private $login;
  private $loja;
  private $cliente;

  public function __construct()
  {
    $this->admin = new AdminModel();
    $this->login = new LoginModel();

    if (!$this->login->isAdminLogged()) {
      $this->renderAdmin("adminLogin", "K10 | Login", $datas = array());
    }
  }

  public function index()
  {
    $datas = array();

    if (isset($_POST['login']) && !empty($_POST['password'])) {
      $this->login->setEmail(($_POST['login']));
      $this->login->setSenha(($_POST['password']));

      if ($this->login->getLoginAdmin()) {
        header("Location: " . BASE_URL . "admin");
      } else {
        header("Location: " . BASE_URL . "admin");
      }
    } else if ($this->login->isAdminLogged()) {
      $datas["info"] = $this->admin->getInfoAdmin($_SESSION["id_admin"]);
      $this->renderAdmin("admin", "K10 | Administrador", $datas);
    } else {
      $this->renderAdmin("adminLogin", "K10 | Login", $datas);
    }
  }

  public function logout()
  {
    unset($_SESSION["id_admin"]);
    header("Location: " . BASE_URL . "admin");
  }

  public function cadastrarAdmin()  //chamo aqui quando é para efetuar  cadastro
  {
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

  public function cadastrarCliente()
  {
    //ver se precisa declarar aqui novamente
    $this->cliente = new clienteModel();

    if ($this->login->isClienteLogged()) //se for admin pega todos os dados
    {
      //povoar o objeto com os dados do form
      $this->cliente->setNome($_POST['nome']);
      $this->cliente->setRg($_POST['rg']);
      $this->cliente->setCpf($_POST['cpf']);
      $this->cliente->setNascimento($_POST['nascimento']);
      $this->cliente->setNomeEquipe($_POST['nome_equipe']);
      $this->cliente->setEmail($_POST['email']);
      $this->cliente->setSenha($_POST['senha']);
      $this->cliente->setUrlImgCliente($_FILES['url_img_cliente']);

      move_uploaded_file($_FILES["url_img_loja"]["tmp_name"], "public/images/clientes" . $this->loja->getUrlImgCliente());

      $retorno = $this->cliente->inserirUsuario();

      if ($retorno)  //redireciona para algum lugar ou mostra algo
      {
      } else {
      }
    } else {
    }
  }

  public function cadastrarLoja()
  {
    //ver se precisa declarar aqui novamente
    $this->loja = new lojaModel();

    if ($this->login->isLojaLogged()) //se já estiver logado
    {
      $this->loja->setNomeResponsavel($_POST['nome_responsavel']);
      $this->loja->setCnpj($_POST['cnpj']);
      $this->loja->setNomeLoja($_POST['nome_loja']);
      $this->loja->setValorCashback($_POST['valor_cashback']);
      $this->loja->setEmail($_POST['email']);
      $this->loja->setSenha($_POST['senha']);
      $this->cliente->setUrlImgCliente($_FILES['url_img_loja']);

      move_uploaded_file($_FILES["url_img_loja"]["tmp_name"], "public/images/lojas" . $this->loja->getUrlImgLoja());

      $retorno = $this->loja->inserirLoja();

      if ($retorno)  //redireciona para algum lugar ou mostra algo
      {
      } else {
      }
    } else {
    }
  }
}
