<?php

class lojaModel extends Mysql
{
  public $id;
  public $nome_responsavel;
  public $cnpj;
  public $nome_loja;
  public $valor_cashback;
  public $email;
  public $senha;

  public function __construct()
  {
    parent::__construct();
  }

  public function inserirLoja()
  {
    $sql = "INSERT INTO loja (nome_responsavel, cnpj, nome_loja, valor_cashback, email, senha)
            VALUES(?, ?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getNomeResponsavel(), PDO::PARAM_STR);
    $stmt->bindValue(2, $this->getCnpj());
    $stmt->bindValue(3, $this->getNomeLoja());
    $stmt->bindValue(4, $this->getValorCashback());
    $stmt->bindValue(5, $this->getEmail(), PDO::PARAM_STR);
    $stmt->bindValue(6, $this->getSenha());
    
    if($stmt->execute()){
      return 1;
    } else {
      return 0;
    }
  }

  public function deletarLoja($id)
  {
    $sql = "DELETE FROM loja WHERE id = {$id};";

    $retorno = $this->conn->query($sql);

    return $retorno;
  }

  public function buscarLoja($id = null)
  {
    $array = array();

    if ($id == null) { //busca e retorna todos

      $sql = "SELECT * FROM loja";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetchAll();
      }
    } else {
      $sql = "SELECT * FROM loja WHERE id = '{$id}'";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetch();
      }
    }
  }

  public function updateLoja($senhaAlterar)
  {
    if($senhaAlterar){
      $sql = "UPDATE loja 
              SET nome = :nome, email = :email, nascimento = :nascimento, senha = :senha
              WHERE id = :id";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":nome", $this->nome);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":nascimento", $this->nascimento);
      $senha = $this->getSenha();
      $stmt->bindParam(":senha", $senha);
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();
    } else {
      $sql = "UPDATE usuario 
              SET nome = :nome, email = :email, nascimento = :nascimento
              WHERE id = :id";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":nome", $this->nome);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":nascimento", $this->nascimento);
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();
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

  public function setNomeResponsavel($nome_responsavel)
  {
    $this->nome_responsavel = $nome_responsavel;
  }
  
  public function getNomeResponsavel()
  {
    return $this->nome_responsavel;
  }
  
  public function setCnpj($cnpj)
  {
    
    $this->cnpj = $cnpj;
  }
  
  public function getCnpj()
  {
    return $this->cnpj;
  }
  
  public function setNomeLoja($nome_loja)
  {
    $this->nome_loja = $nome_loja;
  }

  public function getNomeLoja()
  {
    $this->nome_loja;
  }

  public function getValorCashback()
  {
    return $this->valor_cashback;
  }

  public function setValorCashback($valor_cashback)
  {
    $this->valor_cashback = $valor_cashback;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getSenha()
  {
    return md5($this->senha);
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
  }

}
