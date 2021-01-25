<?php

class loginModel extends Mysql {
  
  protected $email;
  protected $senha;
  
  public function getLoginAdmin()
  {
    $sql = "SELECT * 
            FROM admin
            WHERE email='{$this->getEmail()}'
            AND senha='{$this->getSenha()}'";

    $sql = $this->conn->query($sql);

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $_SESSION['id_admin'] = $sql['id'];
      return true;
    } else {
      return false;
    }
  }

  public function getLoginCliente()
  {
    $sql = "SELECT * 
            FROM cliente
            WHERE email='{$this->getEmail()}'
            AND senha='{$this->getSenha()}'";

    $sql = $this->conn->query($sql);

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $_SESSION['id_cliente'] = $sql['id'];
      return true;
    } else {
      return false;
    }
  }
  
  public function getLoginLoja()
  {
    $sql = "SELECT * 
            FROM loja
            WHERE email='{$this->getEmail()}'
            AND senha='{$this->getSenha()}'";

    $sql = $this->conn->query($sql);

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $_SESSION['id_loja'] = $sql['id'];
      return true;
    } else {
      return false;
    }
  }
  
  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }
  
  public function setSenha($senha) {
    $this->senha = md5($senha);
  }

  public function getSenha() {
    return $this->senha;
  }
}
