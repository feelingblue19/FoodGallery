<?php   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    require_once '../config.php';
    
    $message="";
    $success="";

    if(isset($_POST['simpan']))
	{
	
	    include ('koneksi.php');
        
        $first_n=$_POST['first_name'];
        $last_n=$_POST['last_name'];
        $email=$_POST['email'];
        $pass=$_POST['password'];

        $sql=$koneksi->query("select email from users where email='$email'");
        if($sql->num_rows>0)
        {
			$message="Your account is already registered";
        }
        else
        {
            $token='qwertyuiopasdfghjklzxcvbnmWERTYUIOPASDFGHJKLZXCVBNM1234567890';
            $token=str_shuffle($token);
            $token=substr($token, 0, 10);
			
            $passHashed=password_hash($pass, PASSWORD_BCRYPT);
            $mail=new PHPMailer(TRUE);                            
			$mail->isSMTP();                                    
			$mail->Host = SMTP_HOST; 
			$mail->SMTPAuth = true;                             
			$mail->Username = SMTP_UNAME;           
			$mail->Password = SMTP_PASSWORD;                      
			$mail->SMTPSecure = 'tls';                       
			$mail->Port = SMTP_PORT;          
            $mail->setFrom('foodgallery.d@gmail.com');
            $mail->addAddress($email);
			$mail->isHTML(true);
            $mail->Subject="Verify email Food Gallery";
            $mail->Body=" 
            Hello $first_n $last_n,<br><br>
            
			Please click on the link below to activate your account<br>
			<a href=' https://localhost/uts/createaccount-confirm.php?email=$email&token=$token'>https://localhost/uts/createaccount-confirm.php?email=$email&token=$token</a>
			";
            if($mail->send())
            {
                $success="Verificition email has been sent to your email address";
				$sql=$koneksi->query("insert into users value('', '$first_n', '$last_n', '$email', '$passHashed', 0, '$token')");
            }
            else
            {
                $message="Verification email failed to sent";
            }
        }
        if($message!="")
            header("location: createaccount.php?message=$message");
        else if($success!="")
            header("location: createaccount.php?success=$success");
	}
?>
    