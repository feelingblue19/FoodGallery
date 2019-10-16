<!doctype html>
<html lang="en">
	<head>
        <title>Edit Profile</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Main CSS --> 
        <link rel="stylesheet" href="login.css">
        <!-- Font Awesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
 
    <body>   
        
        <div id="content">
            <div id="content-wrapper">
               

                <!-- Main content area -->
                <div class="row">
                <!-- Main content -->
					
					<div class="form-wrapper">
						<?php
                            $id = $_GET['id'];
                            include ('koneksi.php');
                            $sql=$koneksi->query("SELECT * FROM users WHERE id='$id'");
                            $data=$sql->fetch_array();
                        ?>
						<form action="editprofile-process.php" method="post">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
							<table>
								<tr>
									<td align="center"><a href="index.php"><img src="logo.png" width="350px" height="200px"></a></td>
								</tr>
								</tr>
								
										<?php include_once('login-process.php');
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
								<tr>
									<td>First Name</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" type="text" name="first_name" size="50" value="<?php echo $data['first_name']; ?>">
									</td>
								</tr>
								<tr>
									<td>Last Name</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" type="text" name="last_name" size="50" value="<?php echo $data['last_name']; ?>">
									</td>
								</tr>
								<tr>
									<td>Email</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" type="email" name="email" size="50" value="<?php echo $data['email']; ?>">
									</td>
								</tr>
								<tr>
									<td>Password Lama</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" type="password" name="password_lama" size="50">
									</td>
								</tr>
								<tr>
									<td>Password Baru</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" type="password" name="password_baru" size="50">
									</td>
								</tr>
								<tr>
									<td>Confirm Password</td>
								</tr>
								<tr>
									<td>
										<input class="form-control" type="password" name="confirm_password" size="50">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center"><button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button></td>
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