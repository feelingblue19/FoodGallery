<?php
    session_start();
    include 'koneksi.php';
    if(!isset($_SESSION['userid']))
        header('location: login.php');
    else
        $id=$_SESSION['userid'];
?>
<!doctype html>
<html lang="en">
	<head>
        <title>My Profile</title>

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
            
                <header class="d-none d-md-block">
                    <h1><span>Food</span>Gallery</h1>
                </header>
                
                
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
								<li class="nav-item">
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
                            <h1 class="text-right">My Profile</h1>
                        </div>
                    </div>
                </div>

                <?php
                    $sql=$koneksi->query("SELECT * FROM users WHERE id=$id");
                    $user=$sql->fetch_array();
                ?>
				
                <!-- Main content area -->
                <div class="row">
                <!-- Main content -->
                <main class="container-fluid">
					<article>
					 <div class="col-p">
                        <div class="all">
                        <div class="profile">
                            <div class="col-sm">
                                <?php
                                    echo '<h2><img class="fotoP" src="icon.png" style="float: left;" />'.$user['first_name'].' '. $user['last_name'].'</h2>';
                                    echo '<a href="editprofile.php?id='.$id.'" class="btn btn-edit">Edit Profile</a>';
                                ?>
                            </div>
                         </div>
                         
                            <div class="col-sm-1">
                                <h2>Content</h2>
                             </div>
                       
                        
                        <?php
                            $review=$koneksi->query("SELECT id, judul, content from review WHERE userid=$id");
                            while($posting=$review->fetch_array())
                            {
                                echo '<div class="konten">';
                                echo '<div class="col-sm">';
                                    echo '<a href="review.php?postid='.$posting['id'].'"><h2>'.$posting['judul'].'</h2></a>';
									echo nl2br('<p>'.$posting['content'].'</p>');
                                    echo '<a href="editreview.php?id='.$posting['id'].'" class="btn btnEK">Edit</a>';
                                    echo '<a href="deletereview.php?id='.$posting['id'].'" class="btn btnDK" onclick="return confirm(\'Delete this post?\')">Delete</a>';
                                echo '</div>';
                                echo '</div>';
                            }

                            $recipe=$koneksi->query("SELECT id, judul, content from recipe WHERE userid=$id");
                            while($posting=$recipe->fetch_array())
                            {
                                echo '<div class="konten">';
                                echo '<div class="col-sm">';
                                    echo '<a href="recipe.php?postid='.$posting['id'].'"><h2>'.$posting['judul'].'</h2></a>';
									echo nl2br('<p>'.$posting['content'].'</p>');
                                    echo '<a href="editrecipe.php?id='.$posting['id'].'" class="btn btnEK">Edit</a>';
                                    echo '<a href="deleterecipe.php?id='.$posting['id'].'" class="btn btnDK" onclick="return confirm(\'Delete this post?\')">Delete</a>';
                                echo '</div>';
                                echo '</div>';
                            }
                        ?>                        
                    </div>
                    </div>
					</article>
				</div>
			</div>
        </div>
    </main>

        <!-- Bootcamp JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </body>
</html>