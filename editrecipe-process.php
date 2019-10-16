<?php

	$message="";
	$success="";

    if(isset($_POST['submit']))
    {
		include ('koneksi.php');

		$id=$_POST['id'];
        $judul=$_POST['judul'];
        $tanggal=$_POST['tanggal'];
		$content=$_POST['content'];

		if(!empty($_FILES['photo1']['tmp_name']))
		{
			$target = "recipes/"; 
			$target = $target . basename( $_FILES['photo1']['name']); 
			$foto=$_FILES['photo1']['name'];
			if($sql && move_uploaded_file($_FILES['photo1']['tmp_name'],$target))
			{
				$sql=$koneksi->query("UPDATE recipe SET judul='$judul', tanggal='$tanggal', foto='$foto', content='$content' WHERE id='$id'");
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
			$sql=$koneksi->query("UPDATE recipe SET judul='$judul', tanggal='$tanggal', content='$content' WHERE id='$id'");
			if($sql)
			{
				$success="Edit Berhasil";
			}
			else{
				$message="Edit Gagal";
			}
		}
		
		if($message!="")
			header('location: editrecipe.php?message='.$message.'');
		else if($success!="")
			header('location: editrecipe.php?success='.$success.'');
			
		
		
		
    }
?>
    