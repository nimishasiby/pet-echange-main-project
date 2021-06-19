<?php
session_start();
if(!isset($_SESSION["reg_id"]))
{
	header("location:../reg/register/login.php");
}
date_default_timezone_set("asia/calcutta");
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();
$cats = $dao->getData("*","tbl_category","status='A'");
?>
<!DOCTYPE html>

<html lang="en">
  <head>


 <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pets - Pet Care, Shop, and Veterinary Html Template</title>
    <meta name="description" content="Pets is responsive multi-purpose HTML5 template compatible with Bootstrap 4. Take your Startup business website to the next level. it is designed for pet care, clinic, veterinary, shop, store, adopt, food, pets, businesses or any type of person or business who wants to showcase their work, services and professional way">
    <meta name="keywords" content="animals, business, cats, dogs, ecommerce, modern, pet care, pet services, pet shop, pet sitting, pets, shelter animals, store, veterinary">
    <meta name="author" content="rometheme.net"> 
	
	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.min.css">
	
	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    <script src="js/vendor/modernizr.min.js"></script>

</head>

<body>

	<!-- LOAD PAGE -->
	<div class="animationload">
		<div class="loader"></div>
	</div>
	
	<!-- BACK TO TOP SECTION -->
	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	<!-- HEADER -->
    <div class="header header-1">

		<!-- TOP BAR -->
    	<div class="topbar d-none d-md-block">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-6 col-md-6">
						<p class="mb-0">Welcome</p>
						
					</div>

					<div class="col-sm-6 col-md-6">
						<div class="sosmed-icon d-inline-flex pull-right">
							
						</div>
					</div>

					
				</div>
			</div>
		</div>

		<!-- MIDDLE BAR -->
		<div class="middlebar d-none d-sm-block">
			<div class="container">
				
				
				<div class="contact-info">
					<!-- INFO 1 -->
					<div class="box-icon-1">
						<div class="icon">
							<div class="fa fa-clock-o"></div>
						</div>
						<div class="body-content">
							<div class="heading">Open Hours :</div>
							24 Hours
						</div>
					</div>
					<!-- INFO 2 -->
					<div class="box-icon-1">
						<div class="icon">
							<div class="fa fa-phone"></div>
						</div>
						<div class="body-content">
							<div class="heading">Call Today :</div>
							+91 7902403217
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<!-- NAVBAR SECTION -->
		<div class="navbar-main">
			<div class="container">
			    <nav id="navbar-example" class="navbar navbar-expand-lg">
			        <a class="navbar-brand" href="index.html">
						<img src="images/logo.png" alt="">
					</a>
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			            <ul class="navbar-nav">
						<?php
						foreach($cats as $cat)
						{
						?>
		  <li class="nav-item dropdown dmenu">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						        <?php echo $cat["categoryname"]; ?>
						        </a>
			                    <div class="dropdown-menu">
								<?php
								if($subcats=$dao->getData("*","tbl_subcategory","cat_id=".$cat["cat_id"]." and status='A'"))
								{
									foreach($subcats as $subcat)
									{
									?>
			                    	<a class="dropdown-item" href="listsubcats.php?id=<?php echo $subcat["subcat_id"]; ?>"><?php echo $subcat["subcat_name"]; ?></a>
									<?php

									}
								}
								?>
							    </div>
								
			                </li>
						<?php
						}
						?>
							
							
							
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			                
			                
			                
			                
			                <li class="nav-item dropdown dmenu">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							       FEEDBACKS
						        </a>
			                    <div class="dropdown-menu">
			                    	<a class="dropdown-item" href="feedback.php">New</a>
	          						<a class="dropdown-item" href="listfeedbacks.php">Sent</a>
							    </div>
			                </li>
			                
			                </li>
			                <li class="nav-item">
							    <a class="nav-link" href="listorders.php">ORDERS</a>
			                </li>
			               
			                
							<li class="nav-item">
			                    <a class="nav-link" href="cart.php">CART</a>
			                </li>



						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">LOGOUT</a>
						</li>







			        </div>
			    </nav> 

			</div>
		</div>

    </div>

	
      
        
	           
        	
        </div>
    </div>

	<div class="clearfix"></div>

	<!-- ABOUT -->
	
							
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</div>	

