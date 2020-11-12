<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$config = parse_ini_file("config.ini"); //fix me later
echo $config["db_host"];

$mysqli = new mysqli($config["db_host"],$config["db_user"],$config["db_password"],$config["db_name"]);

if ($mysqli -> connect_errno) {
  echo "Chyba při připojení MySQL: " . $mysqli -> connect_error;
  exit();
}
