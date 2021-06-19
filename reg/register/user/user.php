<!DOCTYPE html>
<?php
session_start();
$user_id=$_SESSION["firstname"];
?>
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
						<p class="mb-0">Welcome  <?php echo strtoupper($user_id)?></p>
						
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
			            	<li class="nav-item dropdown dmenu">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          HOME
						        </a>
			                    <div class="dropdown-menu">
			                    	<a class="dropdown-item" href="index.html">Pets Care</a>
	          						<a class="dropdown-item" href="pets-shop.html">Pets Shop</a>
							    </div>
								
			                </li>
							
							
							
							
							
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







			            </ul>
			            <a href="#" class="btn btn-secondary btn-nav btn-rect ml-auto">GET AN APPOINTMENT</a>
			        </div>
			    </nav> <!-- -->

			</div>
		</div>

    </div>

	<!-- BANNER -->
	<div id="oc-fullslider" class="banner owl-carousel">
        <div class="owl-slide">
        	<div class="item">
	            <img src="images/home01.jpg" alt="Slider">
	            <div class="container d-flex align-items-center">
	            	<div class="wrap-caption">
		                <h1 class="caption-heading">We Provide The Best<br>Care For Your Pets</h1>
		                <p class="">The best pets clinic at melbourne, more than 20.000+ customers happy.</p>
		                <a href="#" class="btn btn-primary">More About Us</a>
		            </div>  
	            </div>
        	</div>
        </div>
        <div class="owl-slide">
        	<div class="item">
	            <img src="images/home02.jpg" alt="Slider">
	            <div class="container d-flex align-items-center">
	            	<div class="wrap-caption">
		                <h1 class="caption-heading">We Provide The Best<br>Care For Your Pets</h1>
		                <p class="">The best pets clinic at melbourne, more than 20.000+ customers happy.</p>
		                <a href="#" class="btn btn-primary">More About Us</a>
		            </div>  
	            </div>
        	</div>  
        </div>
        <div class="owl-slide">
        	<div class="item">
	            <img src="images/home03.jpg" alt="Slider">
	            <div class="container d-flex align-items-center">
	            	<div class="wrap-caption">
		                <h1 class="caption-heading text-primary">We Provide The Best<br>Care For Your Pets</h1>
		                <p class="text-black">The best pets clinic at melbourne, more than 20.000+ customers happy.</p>
		                <a href="#" class="btn btn-primary">More About Us</a>
		            </div>  
	            </div>
        	</div>  
        </div>
    </div>

	<div class="clearfix"></div>

	<!-- ABOUT -->
	<div class="section bgi-left bgi-hide-xs" data-background="images/about.jpg">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-8 offset-md-4">

						<h2 class="section-heading text-primary no-after mb-4">
							Welcome to Pets Care
						</h2>
						<p class="subheading mb-4">Your pet's health and well-being are our top priority.</p>

						<p>Quisque ut dolor gravida, placerat libero vel, euismod. Ut enim ad minim veniam, quis nostrud exercitation. Quam temere in vitiis, legem sancimus haerentia. Pellentesque habitant morbi tristique senectus et netus.</p> 

						
						<div class="row mt-5">
							<!-- Item 1 -->
							<div class="col-sm-6 col-md-6">
								<div class="rs-icon-info-3 mb-5">
									<div class="info-icon">
										<i class="fa fa-scissors"></i>
									</div>
									<div class="info-text">
										<h3 class="text-secondary">Pet Grooming</h3>
										Dolor sit amet, dolor gravida, placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod.
									</div>
								</div>
							</div>
							<!-- Item 2 -->
							<div class="col-sm-6 col-md-6">
								<div class="rs-icon-info-3 mb-5">
									<div class="info-icon">
										<i class="fa fa-home"></i>
									</div>
									<div class="info-text">
										<h3 class="text-secondary">Pet Hotel</h3>
										Dolor sit amet, dolor gravida, placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod.
									</div>
								</div>
							</div>
							<!-- Item 3 -->
							<div class="col-sm-6 col-md-6">
								<div class="rs-icon-info-3 mb-5">
									<div class="info-icon">
										<i class="fa fa-shield"></i>
									</div>
									<div class="info-text">
										<h3 class="text-secondary">Vaccination</h3>
										Dolor sit amet, dolor gravida, placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod.
									</div>
								</div>
							</div>
							<!-- Item 4 -->
							<div class="col-sm-6 col-md-6">
								<div class="rs-icon-info-3 mb-5">
									<div class="info-icon">
										<i class="fa fa-medkit"></i>
									</div>
									<div class="info-text">
										<h3 class="text-secondary">Pet Care</h3>
										Dolor sit amet, dolor gravida, placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod.
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</div>	

	

	<!-- FOOTER SECTION -->
	<div class="footer bg-overlay-secondary" data-background="images/statistic_bg.jpg">
		<div class="content-wrap">
			<div class="container">
				
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="footer-item">
							<img src="images/logo_w.png" alt="logo bottom" class="logo-bottom">
							<div class="spacer-20"></div>
							<p>We are pets center at vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
							<div class="spacer-20"></div>
							<img src="images/payment.png" alt="">
						</div>
					</div>

					<div class="col-sm-6 col-md-4">
						<div class="footer-item">
							<div class="footer-title">
								Opening Hours
							</div>
							<p>Our support available to help you 24 hours a day. We provide our best.</p>
							<ul class="list">
								<li>
									Mon - Fri : 08.00 am - 20.00 pm
								</li>
								<li>
									Saturday : 09.00 am - 20.00 pm
								</li>
								<li>
									Sunday :  We Are Closed
								</li>
							</ul>

						</div>
					</div>
					
					<div class="col-sm-6 col-md-4">
						<div class="footer-item">
							<div class="footer-title">
								Contact Info
							</div>
							<p>Lit sed The Best in dolor sit amet consectetur</p>
							<ul class="list-info">
								<li>
									<div class="info-icon text-primary">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="info-text">99 S.t Jomblo Park Pekanbaru 28292. Indonesia</div> 
								</li>
								<li>
									<div class="info-icon text-primary">
										<span class="fa fa-phone"></span>
									</div>
									<div class="info-text">(0761) 654-123987</div>
								</li>
								<li>
									<div class="info-icon text-primary">
										<span class="fa fa-envelope"></span>
									</div>
									<div class="info-text">mail@hellopets.com</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="fcopy">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<p class="ftex">&copy; 2019 Your Company. All Rights Reserved. Designed By <span class="text-primary">Rometheme</span></p> 
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="sosmed-icon d-inline-flex float-right">
							<a href="#"><i class="fa fa-facebook"></i></a> 
							<a href="#"><i class="fa fa-twitter"></i></a> 
							<a href="#"><i class="fa fa-instagram"></i></a> 
							<a href="#"><i class="fa fa-pinterest"></i></a> 
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	<!-- JS VENDOR -->
	<script src="js/vendor/jquery.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/vendor/owl.carousel.js"></script>
	<script src="js/vendor/jquery.magnific-popup.min.js"></script>

	<!-- SENDMAIL -->
	<script src="js/vendor/validator.min.js"></script>
	<script src="js/vendor/form-scripts.js"></script>

	<script src="js/script.js"></script>

</body>
</html>