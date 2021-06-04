<?php
class cashbackModel extends Mysql
{

  private $id;
  private $id_loja;
  private $id_cliente;
  private $valor_compra;
  private $valor_cashback;
  private $img_cupom_fiscal;
  private $data_compra;
  private $data_registro;
  private $inserido_por;
  private $valor_recebido_do_lojista;
  private $valor_pago_ao_cliente;
  private $data_recebido_do_lojista;
  private $data_pago_ao_cliente;

  public function __construct()
  {
    parent::__construct();
  }

  public function inserirCashback()
  {

    $this->data_registro = new DateTime();
    $this->data_registro = $this->data_registro->format('d-m-Y H:i:s');

    $sql = "INSERT INTO cliente (id_loja, id_cliente, valor_compra, valor_cashback, img_cupom_fiscal, data_compra, data_registro, inserido_por)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getIdLoja(), PDO::PARAM_STR);
    $stmt->bindValue(2, $this->getIdCliente(), PDO::PARAM_STR);
    $stmt->bindValue(3, $this->getValorCompra(), PDO::PARAM_STR);
    $stmt->bindValue(4, $this->getValorCashback());
    $stmt->bindValue(5, $this->getImgCupomFiscal());
    $stmt->bindValue(6, $this->getDataCompra(), PDO::PARAM_STR);
    $stmt->bindValue(7, $this->getDataRegistro());
    $stmt->bindValue(8, $this->getInseridoPor());

    if($stmt->execute()){

      return 1;

    } else {
      return 0;
    }
  }

  public function getInfoCashback($id = null, $usuario = null)
  {
    if($usuario == 'loja')
    {

      $sql = "SELECT * FROM cashback WHERE id_loja = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(1, $id);
      $stmt->execute();

      if ($stmt->rowCount() == 0) {
        return;
      }
      return $stmt->fetch();

    } 
    else if($usuario == 'cliente')
    {

      $sql = "SELECT * FROM cashback WHERE id_cliente = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(1, $id);
      $stmt->execute();

      if ($stmt->rowCount() == 0) {
        return;
      }
      return $stmt->fetch();

    } 
    else if($usuario == 'admin')
    {
      $sql = "SELECT * FROM cashback";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() == 0) {
        return;
      }
      return $stmt->fetch();
    }

  }

  public function getInfoCashbackWhere($id_loja = null, $id_cliente = null, $usuario = null)
  {
    if($usuario == 'loja')
    {

      $sql = "SELECT * FROM cashback WHERE id_loja = ? && id_cliente = ? &&  ";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(1, $id_loja);
      $stmt->bindValue(2, $id_cliente);
      $stmt->execute();

      if ($stmt->rowCount() == 0) {
        return;
      }
      return $stmt->fetch();

    } 
    else if($usuario == 'cliente')
    {

      $sql = "SELECT * FROM cashback WHERE id_cliente = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(1, $id);
      $stmt->execute();

      if ($stmt->rowCount() == 0) {
        return;
      }
      return $stmt->fetch();

    } 
    else if($usuario == 'admin')
    {
      $sql = "SELECT * FROM cashback";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() == 0) {
        return;
      }
      return $stmt->fetch();
    }
  }

  public function inserirValorRecebidoDoLojista()
  {//vou ter que inserir nas duas tuplas , no do lojista e do cliente

    $sql = "UPDATE cashback
            SET valor_recebido_do_lojista = ?, data_recebido_do_lojista = ?
            WHERE id = ? && id_loja = ? && inserido_por = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getValorRecebidoDoLojista(), PDO::PARAM_STR);
    $stmt->bindValue(2, $this->getDataRecebidoDoLojista(), PDO::PARAM_STR);
    $stmt->bindValue(3, $this->getId(), PDO::PARAM_STR);
    $stmt->bindValue(4, $this->getIdLoja(), PDO::PARAM_STR);
    $stmt->bindValue(5, $this->getInseridoPor(), PDO::PARAM_STR);

    if($stmt->execute()){

      return 1;

    } else {
      return 0;
    }
  }

  public function inserirValorPagoAoCliente()
  {//vou ter que inserir nas duas tuplas , no do lojista e do cliente

    $sql = "UPDATE cashback
            SET valor_pago_ao_cliente = ?, data_pago_ao_cliente = ?
            WHERE id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getValorPagoAoCliente(), PDO::PARAM_STR);
    $stmt->bindValue(2, $this->getDataPagoAoCliente(), PDO::PARAM_STR);
    $stmt->bindValue(3, $this->getId(), PDO::PARAM_STR);

    if($stmt->execute()){

      return 1;

    } else {
      return 0;
    }
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
  
  public function setIdLoja($id_loja)
  {
    $this->id_loja = $id_loja;
  }

  public function getIdLoja()
  {
    return $this->id_loja;
  }

  public function setIdCliente($id_cliente)
  {
    $this->id_cliente = $id_cliente;
  }

  public function getIdCliente()
  {
    return $this->id_cliente;
  }

  public function setValorCompra($valor_compra)
  {
    $this->valor_compra = $valor_compra;
  }

  public function getValorCompra()
  {
    return $this->valor_compra;
  }
  
  public function setValorCashback($valor_cashback)
  {
    $this->valor_cashback = $valor_cashback;
  }

  public function getValorCashback()
  {
    return $this->valor_cashback;
  }

  public function setImgCupomFiscal($img_cupom_fiscal){
    $this->img_cupom_fiscal = md5(time() . rand(0, 999) . $img_cupom_fiscal . ".jpg");
  }

  public function getImgCupomFiscal(){
    return $this->img_cupom_fiscal;
  }

  public function setDataRegistro($data_registro)
  {
    $this->data_registro = $data_registro;
  }

  public function getDataRegistro()
  {
    return $this->data_registro;
  }

  public function setDataCompra($data_compra)
  {
    $this->data_compra = $data_compra;
  }

  public function getDataCompra()
  {
    return $this->data_compra;
  }

  public function setInseridoPor($inserido_por)
  {
    $this->inserido_por = $inserido_por;
  }

  public function getInseridoPor()
  {
    return $this->inserido_por;
  }

  public function setValorRecebidoDoLojista($valor_recebido_do_lojista)
  {
    $this->valor_recebido_do_lojista = $valor_recebido_do_lojista;
  }

  public function getValorRecebidoDoLojista()
  {
    return $this->valor_recebido_do_lojista;
  }

  public function setValorPagoAoCliente($valor_pago_ao_cliente)
  {
    $this->valor_pago_ao_cliente = $valor_pago_ao_cliente;
  }

  public function getValorPagoAoCliente()
  {
    return $this->valor_pago_ao_cliente;
  }

  public function setDataRecebidoDoLojista($data_recebido_do_lojista)
  {
    $this->data_recebido_do_lojista = $data_recebido_do_lojista;
  }

  public function getDataRecebidoDoLojista()
  {
    return $this->data_recebido_do_lojista;
  }

  public function setDataPagoAoCliente($data_pago_ao_cliente)
  {
    $this->data_pago_ao_cliente = $data_pago_ao_cliente;
  }

  public function getDataPagoAoCliente()
  {
    return $this->data_pago_ao_cliente;
  }

}