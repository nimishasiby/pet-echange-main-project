<?php
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
							<a href="#"><i class="fa fa-facebook"></i></a> 
							<a href="#"><i class="fa fa-twitter"></i></a> 
							<a href="#"><i class="fa fa-instagram"></i></a> 
							<a href="#"><i class="fa fa-pinterest"></i></a> 
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
							Mon - Fri : 09:00 - 20:00
						</div>
					</div>
					<!-- INFO 2 -->
					<div class="box-icon-1">
						<div class="icon">
							<div class="fa fa-phone"></div>
						</div>
						<div class="body-content">
							<div class="heading">Call Today :</div>
							+62 7100 1234
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
							
							
							
							
			                <li class="nav-item">
			                    <a class="nav-link" href="about-us.html">ABOUT US</a>
			                </li>
			                <li class="nav-item dropdown dmenu">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          SERVICES
						        </a>
			                    <div class="dropdown-menu">
			                    	<a class="dropdown-item" href="services.html">Services</a>
	          						<a class="dropdown-item" href="services-single.html">Single Services</a>
							    </div>
			                </li>
			                <li class="nav-item dropdown dmenu">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          PAGES
						        </a>
			                    <div class="dropdown-menu">
			                    	<a class="dropdown-item" href="page-faq.html">Faqs</a>
	          						<a class="dropdown-item" href="page-our-staff.html">Our Staff</a>
	          						<a class="dropdown-item" href="page-single-staff.html">Single Staff</a>
	          						<a class="dropdown-item" href="page-appointment-form.html">Appointment Form</a>
	          						<a class="dropdown-item" href="page-pricing-tables.html">Pricing Tables</a>
	          						<a class="dropdown-item" href="page-404.html">404 Page</a>
							    </div>
			                </li>
			                <li class="nav-item">
			                    <a class="nav-link" href="gallery.html">GALLERY</a>
			                </li>
			                <li class="nav-item dropdown dmenu">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          BLOG
						        </a>
			                    <div class="dropdown-menu">
			                    	<a class="dropdown-item" href="blog.html">Blog List</a>
	          						<a class="dropdown-item" href="blog-single.html">Single Blog</a>
							    </div>
			                </li>
			                <li class="nav-item dropdown dmenu">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          SHOP
						        </a>
			                    <div class="dropdown-menu">
			                    	<a class="dropdown-item" href="shop.html">Shop</a>
			                    	<a class="dropdown-item" href="shop-list.html">Product List</a>
	          						<a class="dropdown-item" href="shop-single.html">Single Product</a>
							    </div>
			                </li>
			                <li class="nav-item">
			                    <a class="nav-link" href="contact.html">CONTACT</a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="reg/register/regs.php">REGISTER</a>
			                </li>



						</li>
						<li class="nav-item">
							<a class="nav-link" href="reg/register/login.php">LOGIN</a>
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

