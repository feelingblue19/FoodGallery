<?php
        session_start();
        if(!isset($_SESSION['userid']))
            header("location: login.php?message=Please login to write a recipe")
    ?>
<html lang="en">
	<head>
        <title>Write Recipe</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Main CSS --> 
        <link rel="stylesheet" href="css/style.css">
        <!-- Font Awesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script type="text/javascript">
         function fn_ValForm()
           {
                var Reg = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
                var sMsg = "";                    
                if(document.getElementById("judul").value == "")
                {
                    sMsg += ("\n* Anda belum mengisikan Judul");
                }if(document.getElementById("tanggal").value == "")
                {
                    sMsg += ("\n* Anda belum mengisikan Tanggal");
                }
                if(document.getElementById("content").value == "")
                {
                    sMsg += ("\n* Anda belum mengisikan Content");
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
        <!-- Main navigation -->
        <div id="sidebar">
                      
            <div class="navbar-expand-md navbar-dark"> 
            
            <?php 
                    include ('koneksi.php');
                    if(isset($_SESSION['userid']))
                    {
                        $userid=$_SESSION['userid'];
                        $sql=$koneksi->query("SELECT first_name FROM users WHERE id='$userid'");
                        $data=$sql->fetch_array();
                        $id=$_SESSION['userid'];
                        echo '
                        <header class="d-none d-md-block">
                            <a href="profile.php?id='.$id.'"><h4>'.$data['first_name'].'</h4></a>
                        </header> ';
                    }
                    else
                    {
                        echo '
                        <header class="d-none d-md-block">
                            <h4>Guest</h4>
                        </header> ';
                    }
                ?>
                
                
                <!-- Mobile menu toggle and header -->
                <div class="mobile-header-controls">
                    <a class="navbar-brand d-md-none d-lg-none d-xl-none" href="#"><span>Food</span>Gallery</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#SidebarContent" aria-controls="SidebarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
         
                <div id="SidebarContent" class="collapse flex-column navbar-collapse">
 
                        
                    
                    <!-- Main navigation items -->
                    <nav class="navbar navbar-dark">
                        <div id="mainNavbar">
                            <ul class="flex-column mr-auto">
                                <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home </a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="foodreview.php">Food Review</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="foodrecipe.php">Recipe</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="writereview.php">Write Review</a>
                                </li>
								<li class="nav-item active">
                                        <a class="nav-link" href="writerecipe.php">Write Recipe</a>
                                </li>
								<li class="nav-item">
                                        <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>   
                    </nav>
                
                    <!-- Social icons -->
                    <p class="sidebar-social-icons social-icons">
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="#"><i class="fa fa-youtube fa-2x"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
                    </p>
                
                </div>
            </div> 
        </div>
    
        
        <div id="content">
            <div id="content-wrapper">

                <div class="jumbotron-wrap">
                    <div class="container-fluid">
                        <div class="jumbotron static-slider">
                            <h1 class="text-right">Food Galery</h1>
                        </div>
                    </div>
                </div>
				
                <!-- Main content area -->
                <div class="row">
                <!-- Main content -->
                <main class="container-fluid">
					<article>
					<div class="form-wrapper">
						<form action="writerecipe-process.php" method="post" enctype="multipart/form-data">
							<table>
								<?php
									if(isset($_GET['message']))
									{
										$messages=$_GET['message'];
										echo '
										<tr><td colspan="2">
										<div class="alert alert-danger" role="alert" align="center">'.$messages.'</div>
										</td></tr>';
									}
									else if(isset($_GET['success']))
									{
										$succes=$_GET['success'];
										echo '
										<tr><td colspan="2">
										<div class="alert alert-success" role="alert" align="center">'.$succes.'</div>
										</td></tr>';
									}
								?>
								<tr>
									<td>Judul Recipe</td>
									<td>
										<input class="form-control" type="text" name="judul" id="judul" size="50" required="">
									</td>
								</tr>
								<tr>
									<td>Tanggal</td>
									<td>
										<input class="form-control" type="date" name="tanggal" id="tanggal" size="50" required="">
									</td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>
										<input class="form-control" type="file" name="photo1" size="50" accept="image/jpg, image/png">
									</td>
								</tr>
								<tr>
									<td valign="top">Content</td>
									<td>
										<textarea class="form-control" cols="100" rows="9" name="content" id="content" required=""></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="right"><button type="submit" name="submit" class="btn btn-primary" onclick="fn_ValForm()">Submit</button></td>
								</tr>
							</table>
						</form>  
					</div>
					</article>
                    </main>
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