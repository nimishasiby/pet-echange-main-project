<?php
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
require_once("OOP/classes/Authentication.class.php");
$fields=array("email"=>"","password"=>"");
$rules= array("email"=>array("required"=>""),                
				"password"=>array("required"=>""));
$labels=array();
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
$auth = new Authentication();
if(isset($_POST["reg"]))
{
	if($validator->validate($_POST))
	{
		if($auth->authenticate($_POST["email"],$_POST["password"]))
      	{
			session_start();
			$type = $auth->utype;
			if($type=="admin")
			{
				$_SESSION["admin"]=$_POST["email"];
				header("location:../../admin/home.php");
				$msg=$type;
			}
			else
			{
				$_SESSION["user"]=$_POST["email"];
				$data=$dao->getData("*","tbl_registration","email='".$_POST["email"]."'");
				$_SESSION["reg_id"]=$data[0]["reg_id"];
				$_SESSION["firstname"]=$data[0]["firstname"];
				$_SESSION['email']=$_POST['email'];
				header("location:../../user/home.php");
				$msg=$auth->error;
			}
		}
	    else
		{
			$msg="invalid user";
			var_dump($dao->getErrors());
		}
	}
		
else
	{
			// $msg="Failed ,please try again1";
			// var_dump($validator->errors());
			$error=true;
			

	}

}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">LOGIN</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
					<div class="img" style=background-image:url("images/cat.jpeg");>
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign IN</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										
									</p>
								</div>
			      
					
			      		</div>				
						  <form action="#" method="post" class="signin-form" name="reg">
						  <div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
							  <?php echo $form->textBox("email",array("placeholder"=>"Email","class"=>"form-control","type"=>"email","name"=>"email"));?>
							  <?php echo $validator->error("email"); ?> 
			      			
			      		</div>
					<div class="form-group mb-3">
			      			<label class="label" for="name">Password</label>
							  
							  <?php echo $form->passwordBox("password",array("placeholder"=>"Password","class"=>"form-control", "name"=>"password"));?>
							  <?php echo $validator->error("password"); ?> 
			      			
			      		</div>
					
					
		            <div class="form-group">
		            	<input type="submit" name="reg" class="form-control btn btn-primary rounded submit px-3">
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									
		            </div>
					<h2><?php echo isset($msg)?$msg:""; ?></h2>
		          </form>
		          
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

