<?php
class CashbackController extends Controller
{

  private $cliente;
  private $loja;
  private $login;
  private $cashback;

  public function __construct()
  {
    $this->login = new loginModel();
  }
  
  public function index()
  {

  }

  public function cadastrarCashback()
  {
    $this->cashback = new cashbackModel();
    $infoCliente = array();
    $infoLoja = array();
    
    if($this->login->isLojaLogged())  //loja esta inserindo , pego id da loja entao
    {    
      $this->loja = new lojaModel();
      $this->cliente = new clienteModel();
      $infoLoja = $this->loja->getInfoLoja($_SESSION['id_loja']);
      $infoCliente = $this->cliente->getInfoCliente($_POST['id_cliente']);  //caso nao seja generico o id do form

      $this->cashback->setIdLoja($infoLoja['id']);
      $this->cashback->setIdCliente($infoCliente['id']);
      $this->cashback->setValorCompra($_POST['valor_compra']);
      $this->cashback->setValorCashback($infoLoja['valor_cashback']); 
      $this->cashback->setImgCupomFiscal($_FILES['img_cupom_fiscal']);
      $this->cashback->setDataCompra($_POST['data_compra']);
      $this->cashback->setInseridoPor($_SESSION['usuario']);
      
      move_uploaded_file($this->cashback->getDataCompra() . "_" . $infoLoja['nome_loja'] . "_" . $this->cashback->getValorCompra() . "_" . $infoCliente['nome_equipe'] , "public/images/fiscal" . $this->cashback->getImgCupomFiscal());

      $retorno = $this->cashback->inserirCashback();

      if ($retorno)  //redireciona para algum lugar ou mostra algo
      {

      } 
      else 
      {

      }

    }
    else 
    {
      if($this->login->isClienteLogged())
      {
        $this->cliente = new clienteModel();
        $this->loja = new lojaModel();
        $infoCliente = $this->cliente->getInfoCliente($_SESSION['id_cliente']);
        $infoLoja = $this->loja->getInfoLoja($_POST['id_loja']);

        $this->cashback->setInseridoPor($_SESSION['usuario']);

        $this->cashback->setIdLoja($infoLoja['id']);
        $this->cashback->setIdCliente($infoCliente['id']);
        $this->cashback->setValorCompra($_POST['valor_compra']);
        $this->cashback->setValorCashback($infoLoja['valor_cashback']); 
        $this->cashback->setImgCupomFiscal($_FILES['img_cupom_fiscal']);
        $this->cashback->setDataCompra($_POST['data_compra']);
        $this->cashback->setInseridoPor($_SESSION['usuario']);
        
        //mudei apenas a sequencia do nome da loja com o cliente
        move_uploaded_file($this->cashback->getDataCompra() . "_" . $infoCliente['nome_equipe'] . "_" . $this->cashback->getValorCompra() . "_" . $infoLoja['nome_loja'] , "public/images/fiscal" . $this->cashback->getImgCupomFiscal());

        $retorno = $this->cashback->inserirCashback();
        
        if ($retorno)  //redireciona para algum lugar ou mostra algo
        {
        } else {
        }

      }
      else 
      {

      }
    }

  }

  public function inserirValorRecebidoCashbackLojista()
  { //aqui eu so vou chamar quando eu tiver na area de lojista
    //vou ter que saber o id do lojista e o id do cliente
    //e dai sabendo disso eu tenho que buscar o id em quais tuplas eles se ecnontram
    //que seria um do cliente o outro da loja
    $this->cashback = new cashbackModel();
    $infoLoja = array();

    if($this->login->isLojaLogged())
    {
      $infoLoja = $this->cashback->getInfoCashbackWhere($_SESSION['id_loja'], $_POST['id_cliente'], "loja");
      $this->cashback->setId($infoLoja['id']);
      $this->cashback->setIdLoja($infoLoja['id_loja']);
      $this->cashback->setIdCliente($infoLoja['id_cliente']);
      $this->cashback->setInseridoPor($infoLoja['inserido_por']);
      $this->cashback->setValorRecebidoDoLojista($_POST['valor_recebido_do_lojista']);
      $this->cashback->setDataRecebidoDoLojista("COLOCAR DATA");

      $this->cashback->inserirValorRecebidoDoLojista(); //fazer isso 2x,
      //caso nao faça so ira inserir em uma tupla que seria a quem inseriu_por ...
    }

  }

  public function inserirValorPagoCashbackCliente()
  {
    
  }
}