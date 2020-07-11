<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Imitation Jewellery</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/Logos/Jewellery logos.PNG" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- data table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"/>

    <script src="js/modernizer.js"></script>

</head>
<body>
    <div id="preloader">
        <div class="loader">
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__ball"></div>
		</div>
    </div>
    
	
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/Logos/Jewellery logos1.PNG" width="70px" height="50px" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a href="about-us.php">About us</a></li>
                        <?php
                            if(isset($_SESSION['user']))
                            {
                                echo "<li><a href='Shop.php'>Shop</a></li>";
                            }
                        ?>
                        <li><a href="services.php">Our Services</a></li>
                        <li><a href="Gallery.php">Gallery</a></li> 
                        <li><a href="contact1.php">Contact</a></li>
                        <?php
                            if(isset($_SESSION['user']))
                            {
                                $id=$_SESSION['user'];
                                echo "<li><a href='UserProfile.php?id=".$id."'>Profile</a></li><li><a href='LogOut.php'>LogOut</a></li>";
                            }
                            else
                            {
                                echo "<li><a href='Login.php'>Sign In</a></li><li><a href='SignUp.php'>Register</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>