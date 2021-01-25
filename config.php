<?php
require "env.php";

global $config;
$config = array();

if (ENV == "dev") {
  define("BASE_URL", "http://localhost/k10-main/");
  $config["dbname"] = "k10_cashback";
  $config["dbhost"] = "localhost";
  $config["dbuser"] = "root";
  $config["dbpass"] = "";
} else {
  define("BASE_URL", "http://cashback.agenciak10.com.br");
  $config["dbname"] = "k10_cashback";
  $config["dbhost"] = "localhost";
  $config["dbuser"] = "root";
  $config["dbpass"] = "";
}
