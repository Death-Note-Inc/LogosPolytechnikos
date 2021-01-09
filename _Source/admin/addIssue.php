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
    $name = $_POST['name_issue'];
    $status = $_POST['status_issue'];
    $date = $_POST['date_issue'];


    $issue->create_issue($name, $date, $status);

    header("Location: issues-manage.php?success=1");

?>