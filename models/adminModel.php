<?php

class adminModel extends Mysql
{
  public $id;
  public $nome;
  /*
  public $rg;
  *public $cpf;
  *public $nascimento;
  *public $nome_equipe;
  */
  public $email;
  public $senha;

  public function __construct()
  {
    parent::__construct();
  }

  public function cadastrarAdmin()
  {
    $sql = "INSERT INTO admin (nome, email, senha)
            VALUES(?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getNome(), PDO::PARAM_STR);
    /*
    *$stmt->bindValue(2, $this->getRg(), PDO::PARAM_STR);
    *$stmt->bindValue(3, $this->getCpf(), PDO::PARAM_STR);
    *$stmt->bindValue(4, $this->getNascimento());
    *$stmt->bindValue(5, $this->getNomeEquipe());
    */
    $stmt->bindValue(2, $this->getEmail(), PDO::PARAM_STR);
    $stmt->bindValue(3, $this->getSenha());
    
    if($stmt->execute()){
      return 1;
    } else {
      return 0;
    }
  }



  public function deletarCliente($id)
  {
    $sql = "DELETE FROM admin WHERE id = {$id};";

    $retorno = $this->conn->query($sql);

    return $retorno;
  }

  public function buscarCliente($id = null)
  {
    $array = array();

    if ($id == null) { //busca e retorna todos

      $sql = "SELECT * FROM admin";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetchAll();
      }
    } else {
      $sql = "SELECT * FROM admin WHERE id = '{$id}'";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetch();
      }
    }
  }

  public function updateCliente($senhaAlterar)
  {
    if($senhaAlterar){
      $sql = "UPDATE admin 
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

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getNome()
  {
    return $this->nome;
  }
/*
  public function setRg($rg)
  {
    $this->rg = $rg;
  }

  public function getRg()
  {
    return $this->rg;
  }

  public function setCpf($cpf)
  {
    $this->cpf = $cpf;
  }

  public function getCpf()
  {
    return $this->cpf;
  }

  public function getNascimento()
  {
    return $this->nascimento;
  }

  public function setNascimento($nascimento)
  {
    $this->nascimento = $nascimento;
  }

  public function setNomeEquipe($nome_equipe)
  {
    $this->nome_equipe = $nome_equipe;
  }

  public function getNomeEquipe()
  {
    return $this->nome_equipe;
  }
*/
  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }
  
  public function setSenha($senha)
  {
    $this->senha = $senha;
  }

  public function getSenha()
  {
    return md5($this->senha);
  }


}
