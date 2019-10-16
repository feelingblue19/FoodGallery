<?php

	$message="";
	$success="";

	include ('koneksi.php');
	
	$mail=$koneksi->real_escape_string($_GET['email']);
	$tkn=$_GET['token'];
	
	$sql=$koneksi->query("SELECT * FROM users WHERE email='$mail' AND token='$tkn' AND status=0");
	if($sql->num_rows>0)
	{
		$sql=$koneksi->query("UPDATE users SET status=1 WHERE email='$mail'");

		if($sql)
		{
			$success="Account verification success";
		}
		else
		$message="Account Verification failed";
	}
	else
		$message="Your email is already verified";

	if($message!="")
		header("location: login.php?message=$message");
	else if($success!="")
		header("location: login.php?success=$success");
	
?>