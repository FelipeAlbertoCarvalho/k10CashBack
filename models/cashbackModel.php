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


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
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

}