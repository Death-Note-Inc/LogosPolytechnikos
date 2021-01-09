<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//load dependeces
include_once("parts/db-connect.php");


//redirtect user if not logged in
if (!$user->is_logged_in()) {
    $user->redirect('index.php');
}

//check the logout button
if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
    $user->log_out();
    $user->redirect('index.php');
    
}
    $id = $_GET['id'];
    $name = $_POST['user_name'];
    $surname = $_POST['user_surname'];
    $email = $_POST['user_email'];
    $role = $_POST['role'];
    $password = $_POST['user_password'];


    $user->updateUser($id, $name, $surname, $email, $role, $password);

    header("Location: users-manage.php");

?>