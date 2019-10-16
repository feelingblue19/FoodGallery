<?php
	$id=$_GET['postid'];
	include ('koneksi.php');
	$sql=$koneksi->query("SELECT * FROM review WHERE id=$id");
	$post=$sql->fetch_array();
	$sql=$koneksi->query('SELECT first_name, last_name FROM users WHERE id='.$post['userid'].'');
	$author=$sql->fetch_array();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <title><?php echo $post['judul']; ?></title>
        <style>
			.boxhead{
				width:700px;
				height:auto;
				background: #e1e3e8;
				display: inline-block;
				margin-left: 10px;
				margin-bottom: 10px;
				padding: 20px 20px 20px 20px;
				border-radius: 10px;
			}
		</style>

		<style>
			.box{
				width:200px;
				height:200px;
				background:white;
				display: inline-block;
				margin-top: 10px;
				margin-left: 10px;
			}
		</style>

		<style>
			.boxtext{
				background:white;
				display: inline-block;
				margin-top: 10px;
				margin-left: 10px;
			}
		</style>
		
		<style>
			.boximg{
			width:210px;
			}
		</style>

		<style>
			.boxrekomen{
				width:650px;
				height:225px;
				background:#800000;
				display: inline-block;
				margin-left: 10px;
				margin-top: 10px;
			}
		</style>
		<style>
			.boxall{
				width:700px;
				background: white;
				display: inline-block;
				margin-left: 10px;
				margin-bottom: 10px;
				border-style: solid;
				border-radius: 10px;
				padding: 10px 10px 10px 10px;
			}
		</style>
		<style>
			.tablefood
			{
				background: transparent;
				width: 650px;
			}
		</style>
		<style>
			.thfood
			{
				background: transparent;
				width: 400px;
				border-width: 0px;
			}
		</style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		
        <!-- Main CSS --> 
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">

        <!-- Font Awesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
    </head>
  
    <body>

         <!-- Main navigation -->
        <div id="sidebar">
                      
            <div class="navbar-expand-md navbar-dark"> 
            
                <?php 
            
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
                            <h2 class="text-right">Food Galery</h2>
                        </div>
                    </div>
                </div>

                <!-- Main content area -->
                <main class="container-fluid">
                    <div class="row">
                        <?php
                            
                        ?>
                        <!-- Main content -->
                        <div class="col-md-8">
                            <div class="boxhead">
								<table class="tablefood">
									<tr>
										<th class="thfood" colspan="1"><h1 style="float: left; text-align: left;"><?php echo $post['judul']; ?></h1></th>
										<th class="thfood" colspan="2"><h5 align="right"><img class="fotoP2" src="icon.png"/><?php echo $author['first_name']; echo ' '; echo $author['last_name']; ?></h5></th>
									</tr>
									<tr>
										<td align="right" width="200px"><h5 style="display: inline;"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $post['location']; ?></h5></td>
										<td align="right" width="170px"><h5 style="display: inline;"><span class="glyphicon glyphicon-usd"></span> <?php echo $post['harga']; ?></h5></td>
										<td align="right" width="200px"><h5 style="display: inline;"><span class="glyphicon glyphicon-calendar"></span> <?php  echo $post['tanggal']; ?></h5></td>
									</tr>
								</table>
                            </div>
                            <div class="boxall">
								<div class="boximg">
									<div class="img-thumbnail">
										<img height="200px" width="200px" src="<?php echo 'images/'.$post['foto'].''; ?>">
									</div>
								</div>
								<div class="boxtext">
									<h5>Review</h5>
									<p><?php echo nl2br($post['content']); ?></p>
								</div>
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