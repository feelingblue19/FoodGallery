<!doctype html>
<html lang="en">
	<head>
        <title>Log In</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Main CSS --> 
        <link rel="stylesheet" href="login.css">
        <!-- Font Awesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript">
		 function fn_ValForm()
           {
                var Reg = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
                var sMsg = "";                    
                
                if(document.getElementById("email").value == "")
                {
                    sMsg += ("\n* Anda belum mengisikan Email");
                }
                if(document.getElementById("email").value != "")
                {
                    if(!Reg.test(document.getElementById("email").value))
                    {
                        sMsg += ("\n* Format email anda salah");       
                    }
                }
                if(document.getElementById("password").value == "")
                {
                    sMsg += ("\n* Anda belum mengisikan Password");
                }
                if(sMsg != "" )
                {
                    alert("Peringatan:\n" + sMsg);
                    return false;
                }
                else{
                    return true;
                }
            }

	</script>
    </head>
 
    <body>   
        
        <div id="content">
            <div id="content-wrapper">
               

                <!-- Main content area -->
                <div class="row">
                <!-- Main content -->
					
					<div class="form-wrapper">
						<form action="login-process.php" method="post">
							<table>
								<tr>
									<td align="center"><a href="index.php"><img src="logo.png" width="350px" height="200px"></a></td>
								</tr>
								<?php
									if(isset($_GET['message']))
									{
										$messages=$_GET['message'];
										echo '
										<tr><td>
										<br><div class="alert alert-danger" role="alert" align="center">'.$messages.'</div>
										</td></tr>';
									}
									else if(isset($_GET['success']))
									{
										$succes=$_GET['success'];
										echo '
										<tr><td>
										<br><div class="alert alert-success" role="alert" align="center">'.$succes.'</div>
										</td></tr>';
									}
								?>
								<tr>
									<td>Email</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" type="email" name="email" id="email" size="50" required="">
									</td>
								</tr>
								<tr>
									<td>Password</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" type="password" name="password" id="password" size="50" required="">
										<small class="form-text text-muted"><a href="createaccount.php">Create Account?</a></small>
									</td>
								</tr>
								
								<tr>
									<td colspan="2" align="center"><button type="submit" name="submit" class="btn btn-primary" onclick="fn_ValForm()">LOGIN</button></td>
								</tr>									
							</table>
						</form>  
					</div>
					
				</div>
			</div>
        </div>

        <!-- Bootcamp JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	
    </body>
</html>