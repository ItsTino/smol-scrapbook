<?php
require_once('../app/globalFuncs.php');
session_start();

//Check if $_SESSION['authState'] is not set or is not equal to 'logged_in'
if (!isset($_SESSION['authState']) || $_SESSION['authState'] !== 'logged_in') {
echo 'badlogin';
exit;
}


//upload.php

if(isset($_FILES['images']))
{
	for($count = 0; $count < count($_FILES['images']['name']); $count++)
	{
		$extension = pathinfo($_FILES['images']['name'][$count], PATHINFO_EXTENSION);

		$new_name = uuidv4() . '.' . $extension;

		move_uploaded_file($_FILES['images']['tmp_name'][$count], 'media/' . $new_name);

	}

	echo 'success';
}


?>