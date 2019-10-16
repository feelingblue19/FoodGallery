<?php

	$message="";
	$success="";

    if(isset($_POST['submit']))
    {
		session_start();
		$target = "images/"; 
		$target = $target . basename( $_FILES['photo1']['name']); 
		include ('koneksi.php');
        
        $judul=$_POST['judul'];
        $tanggal=$_POST['tanggal'];
		$foto=$_FILES['photo1']['name'];
		$content=$_POST['content'];
		$userid=$_SESSION['userid'];

		if(move_uploaded_file($_FILES['photo1']['tmp_name'],$target)) 
		{
			$sql=$koneksi->query("insert into recipe values('','$judul', '$tanggal', '$foto', '$content', '$userid')");
			if($sql)
				$success="Post berhasil";
			else
				$message="Post gagal";
		}
		else
		{	
			$message="Post gagal";
		}
		
		if($message!="")
			header('location: writerecipe.php?message='.$message.'');
		else if($success!="")
			header('location: writerecipe.php?success='.$success.'');
		
    }
	
	
?>
    