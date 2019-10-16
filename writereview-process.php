<?php

    if(isset($_POST['submit']))
    {
		session_start();
		$target = "images/"; 
		$target = $target . basename( $_FILES['photo1']['name']); 
        include ('koneksi.php');
        
        $judul=$_POST['judul'];
        $location=$_POST['location'];
        $tanggal=$_POST['tanggal'];
        $harga=$_POST['harga'];
		$foto=$_FILES['photo1']['name'];
		$content=$_POST['content'];
		$userid=$_SESSION['userid'];

		if(move_uploaded_file($_FILES['photo1']['tmp_name'],$target)) 
		{
			$sql=$koneksi->query("insert into review values('','$judul', '$location', '$tanggal', '$harga', '$foto', '$content', '$userid')");
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
			header('location: writereview.php?message='.$message.'');
		else if($success!="")
			header('location: writereview.php?success='.$success.'');
    }
?>
    