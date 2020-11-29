<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("db-connect.php");

$id = "1";

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));






// Check if file already exists
if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}




// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

//get the current working directory.
	//mkdir("../uploads/1",0777,true);

	$name = $_POST["articleName"];
	$post->create($user->getUserInfo("id"),'Nový', $name);
	$post_id = $post->GetLastestPost();
	$dir = "../uploads/" .$post_id;
	mkdir($dir,0777,true);
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../uploads/" .$post_id ."/".$_FILES["fileToUpload"]["name"])) {
		echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " Byl nahrán.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}



?>