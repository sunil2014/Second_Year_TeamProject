<?php
ob_start;
session_start();
include "./mysql_connect.php";
$user = $_SESSION["authenticatedUser"];
if ($_SERVER['REQUEST_METHOD'] == "POST") {

	//Assigning variables
	$image = $_FILES['file']['name'];
	$size = $_FILES['file']['size'];
	$type = $_FILES['file']['type'];
	$tmp = $_FILES['file']['tmp_name'];

	//File size and extension
	$max = 1048576;
	$extension = strtolower(substr($image, strpos($image, '.') + 1));

	//Upload codes
	if (isset($image)) {
		if (empty($image)) {
			echo '<p class="error">Please choose an image to upload</p>';
		} elseif ($size > $max) {
			echo '<p class="error">Your image must not exceed 1MB</p>';
		} elseif ($extension !== 'jpg' && $extension !== 'jpeg' && $extension !== 'gif' && $extension !== 'png') {
			echo '<p class="error">Only images in JPG, JPEG, GIF and PNG are acceptable!</p>';
		} else {
			$location = 'upload/' . $image;
			move_uploaded_file($tmp, $location);
			$query = "UPDATE addcustomer SET Image='$location' WHERE Username='$user'";
			$querychange = mysql_query($query);
			header('location: imageprocessing.php');
		}
	}
}
?>
