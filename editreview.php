<!doctype html>
<html lang="en">
	<head>
        <title>Edit Review</title>

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
                    session_start();
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
                        <?php
                            if(isset($_GET['id']))
								$id = $_GET['id'];
                            $sql=$koneksi->query("SELECT * FROM review WHERE id='$id'");
                            $data=$sql->fetch_array();
                        ?>
						<form action="editreview-process.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
									<td>Judul Review</td>
									<td>
										<input class="form-control" type="text" name="judul" size="50" value="<?php echo $data['judul']; ?>">
									</td>
								</tr>
								<tr>
									<td>Location</td>
									<td>
										<input class="form-control" type="text" name="location" size="50" value="<?php echo $data['location']; ?>">
									</td>
									</tr>
								<tr>
									<td>Tanggal</td>
									<td>
										<input class="form-control" type="text" name="tanggal" size="50" value="<?php echo $data['tanggal']; ?>">
									</td>
								</tr>
								<tr>
									<td>Harga</td>
									<td>
										<input class="form-control" type="text" name="harga" size="50" value="<?php echo $data['harga']; ?>">
									</td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>
										<input class="form-control" type="file" name="photo1" size="50">
									</td>
								</tr>
								<tr>
									<td valign="top">Content</td>
									<td>
										<textarea class="form-control" cols="100" rows="9" name="content"><?php echo $data['content']; ?></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="right"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
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