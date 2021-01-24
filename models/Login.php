<?php

class Login extends Mysql {
  
  public function isLogged()
  {
    if (isset($_SESSION['nivel']) && !empty($_SESSION['nivel'])) {
      return true;
    } else {
      return false;
    }
  
  }
  
}
