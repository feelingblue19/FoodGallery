<?php

	$message="";
	$success="";

    if(isset($_POST['submit']))
    {
		include ('koneksi.php');

		$id=$_POST['id'];
		$judul=$_POST['judul'];
        $location=$_POST['location'];
        $tanggal=$_POST['tanggal'];
        $harga=$_POST['harga'];
		$content=$_POST['content'];

		if(!empty($_FILES['photo1']['tmp_name']))
		{
			$target = "reviews/"; 
			$target = $target . basename( $_FILES['photo1']['name']); 
			$foto=$_FILES['photo1']['name'];
			if(move_uploaded_file($_FILES['photo1']['tmp_name'],$target))
			{
				$sql=$koneksi->query("UPDATE review SET judul='$judul', location='$location', tanggal='$tanggal', harga='$harga', foto='$foto', content='$content' where id='$id'");
				if($sql)
					$success="Edit Berhasil";
				else
					$messages="Edit Gagal";
			}
			else
			{
				$message="Edit Gagal";
			}
		}
		else
		{
			$sql=$koneksi->query("UPDATE review SET judul='$judul', location='$location', tanggal='$tanggal', harga='$harga', content='$content' where id='$id'");
			if($sql)
			{
				$success="Edit Berhasil";
			}
			else{
				$message="Edit Gagal";
			}

		}
		
		if($message!="")
			header('location: editreview.php?message='.$message.'');
		else if($success!="")
			header('location: editreview.php?success='.$success.'');
		
		
		
    }
?>        