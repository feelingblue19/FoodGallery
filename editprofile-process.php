<?php

    $message="";
    $success="";
    if(isset($_POST['simpan']))
	{
	
	    include ('koneksi.php');
        
        $id=$_POST['id'];
        $first_n=$_POST['first_name'];
        $last_n=$_POST['last_name'];
        $email=$_POST['email'];
        $pass=$_POST['password_lama'];
        $new_pass=$_POST['password_baru'];
        $con_pass=$_POST['confirm_password'];

        $sql=$koneksi->query("select * from users where id='$id'");
        $data=$sql->fetch_array();

        if(password_verify($pass, $data['password']))
        {
            if($new_pass==$con_pass)
            {
                if(!password_verify($new_pass, $data['password']))
                {
                    $passHashed=password_hash($new_pass, PASSWORD_BCRYPT);
                    if($email==$data['email'])
                    {
                        $ganti=$koneksi->query("UPDATE users SET first_name='$first_n', last_name='$last_n', password='$passHashed' WHERE id=$id");
                        if($ganti)
                           $success="Edit profile berhasil";
                        else
                            $message="Edit profile gagal";
                    }
                    else
                    {
                        $cari=$koneksi->query("SELECT * FROM users WHERE email='$email'");
                        if($cari->num_rows>0)
                            $message="Email dengan alamat tersebut sudah terdaftar";
                        else
                        {
                            $ganti=$koneksi->query("UPDATE users SET first_name='$first_n', last_name='$last_n', email='$email', password='$passHashed' WHERE id=$id");
                            if($ganti)
                                $success="Edit profile berhasil";
                            else
                                $message="Edit profile gagal";
                        }
                    }
                }
                else   
                {
                    $message="Password baru dan password lama sama";
                }
            }
            else
                $message="Password baru dan confirm password tidak sama";
        }
        else   
            $message="Password lama salah";
        
        if($message!="")
            header("location: editprofile.php?message=$message&id=$id");
        else if($success!="")
            header("location: editprofile.php?success=$success&id=$id");
    }
?>
    