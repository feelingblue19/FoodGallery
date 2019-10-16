<?php
    session_start();
?>
<!doctype html>
<html lang="en">
	<head>
        <title>Home</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Main CSS --> 
        <link rel="stylesheet" href="css/style.css">
        <!-- Font Awesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
                    <a class="navbar-brand d-md-none d-lg-none d-xl-none" href="#"><span>my</span>website</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#SidebarContent" aria-controls="SidebarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
         
                <div id="SidebarContent" class="collapse flex-column navbar-collapse">
 
                        
                    
                    <!-- Main navigation items -->
                    <nav class="navbar navbar-dark">
                        <div id="mainNavbar">
                            <ul class="flex-column mr-auto">
                                <li class="nav-item active">
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
								<li class="nav-item">
                                        <a class="nav-link" href="writerecipe.php">Write Recipe</a>
                                </li>
                                <!-- ////////////////////////////////////////////////////////////// -->
                                <?php
                                    if(isset($_SESSION['userid']))
                                    {
                                        echo '
                                        <li class="nav-item">
                                                <a class="nav-link" href="logout.php">Log Out</a> 
                                        </li> ';
                                    }
                                    else
                                    {
                                        echo '
                                        <li class="nav-item">
                                                <a class="nav-link" href="login.php">Log In</a> 
                                        </li> ';
                                        
                                    }
                                ?>
                                <!-- ////////////////////////////////////////////////////////////// -->
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
					<div class="col-sm8">
                        <div id="poptrox">
                            <ul id="gallery"> 
								<?php
									include('koneksi.php');
									$sql=$koneksi->query("SELECT id, foto, judul from review");
									while($data = $sql->fetch_array())
									{
										echo '<li class="nopad">';
											echo '<div class="img-thumbnail">';
												echo '<img src="images/'.$data['foto'].'" width="350" height="250">';
												echo '<a href="review.php?postid='.$data['id'].'"><h4 align="center">'.$data['judul'].'</h4></a>';
											echo '</div>';
										echo '<li>';
								    }
									$sql=$koneksi->query("SELECT id, foto, judul from recipe");
									while($data = $sql->fetch_array())
									{
										echo '<li class="nopad">';
											echo '<div class="img-thumbnail">';
												echo '<img src="images/'.$data['foto'].'" width="350" height="250">';
												echo '<a href="recipe.php?postid='.$data['id'].'"><h4 align="center">'.$data['judul'].'</h4></a>';
											echo '</div>';
										echo '<li>';
								    }
                                ?>
                            </ul>
                        </div>
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