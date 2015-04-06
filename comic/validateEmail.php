<?php
	include('config.php');
	$email = $_REQUEST['email'];
	$query = $mysqli->query("SELECT `id` FROM `users` WHERE `email`='$email'");
	if($query){
		if(mysqli_num_rows($query)!=0)
			echo "Email ID already exists";
		else 
			echo "ok";
	}
?>
