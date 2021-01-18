<?php
require "env.php";

global $config;
$config = array();

if (ENV == "dev") {
  define("BASE_URL", "");
  $config["dbname"] = "";
  $config["dbhost"] = "localhost";
  $config["dbuser"] = "root";
  $config["dbpass"] = "";
} else {
  define("BASE_URL", "http://cashback.agenciak10.com.br");
  $config["dbname"] = "";
  $config["dbhost"] = "localhost";
  $config["dbuser"] = "root";
  $config["dbpass"] = "";
}
