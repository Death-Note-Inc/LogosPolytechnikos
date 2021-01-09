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


if((isset($_POST['reviewers'])) and (isset($_POST['issues']))) {
    $test = $_POST['reviewers'];
    $issue_id = $_POST['issues'];
    $name = $_POST['name_post'];
    $status = $_POST['status'];
    
    $post->updatePost($test, $issue_id, $name, $status);

    echo "Článek byl úspěšně upraven.";

} 
else {
    echo "Error při úpravě článku.";
}



?>