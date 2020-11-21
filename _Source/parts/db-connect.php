<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once("user.php");
include_once("cpost.php");


$config = parse_ini_file("config.ini"); //fix me later
$db_host = $config["db_host"];
$db_user = $config["db_user"];
$db_pass = $config["db_password"];
$db_name = $config["db_name"];


try {
    $db_conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    array_push($errors, $e->getMessage());
}

$user = new User($db_conn);
$post = new Post($db_conn);