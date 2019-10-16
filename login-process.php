<?php

	$message="";

	if(isset($_POST['submit']))
	{
		$mail=$_POST['email'];
		$pass=$_POST['password'];

		include ('koneksi.php');
		$sql=$koneksi->query("select * from users where email='$mail'");
		$data=$sql->fetch_array();

		if($sql->num_rows>0)
        {
			if(password_verify($pass, $data['password']))
			{
				if($data['status']==1)
				{
					session_start();
					$_SESSION['userid']=$data['id'];
					header("location: index.php");
					
				}
				else
					$message="Your account has not been verified";
			}
			else 
				$message="Incorrect password";	
		}
		else
		{
			$message="Incorrect email";		
		}

		if($message!="")
		{
			header("location: login.php?message=$message");
		}
	}


?>