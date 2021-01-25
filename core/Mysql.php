<?php
class Mysql
{
  protected $conn = null;

  public function __construct()
  {
    global $config;

    try {
      $this->conn = new PDO("mysql:dbname=" . $config["dbname"] . ";host=" . $config["dbhost"], $config["dbuser"], $config["dbpass"]);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}
