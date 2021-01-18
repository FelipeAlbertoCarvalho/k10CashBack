<?php
class Mysql
{
  protected $pdo = null;

  public function __construct()
  {
    global $config;

    try {
      $this->pdo = new PDO("mysql:dbname=" . $config["dbname"] . ";host=" . $config["dbhost"], $config["dbuser"], $config["dbpass"]);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}
