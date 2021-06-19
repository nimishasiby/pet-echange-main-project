<?php
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
require_once("OOP/classes/FormAssist.class.php");

$fields=array("fname"=>"","lname"=>"","address"=>"","email"=>"","phone"=>"","password"=>"","confirm_password"=>"");
$rules= array("fname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaonly"=>""),
                "lname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaonly"=>""),
				"email"=>array("required"=>"","email"=>"","unique"=>["table"=>"tbl_login","field"=>"email"]),
                "phone"=>array("required"=>""),  
				"address"=>array("required"=>""),
				"password"=>array("required"=>"","regexp"=>'/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{6,30}$/',"compare"=>array("compareto"=>"email","operator"=>"!=")),
				"confirm_password"=>array("required"=>"","compare"=>array("compareto"=>"password","operator"=>"=")));
$labels=array("email"=>"Email","password"=>"Password","confirm_password"=>"Confirm Password",);
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["reg"]))
{
	if($validator->validate($_POST))
	{
		 //var_dump($_POST);
		$ldata =array("email"=>$_POST["email"],"password"=>$_POST["password"],"status"=>"1","role"=>"user");
		 if($dao->insert($ldata,"tbl_login"))
		 {
			$lid=$dao->max("login_id","tbl_login");
			$data = array("login_id"=>$lid,"firstname"=>$_POST["fname"],"lastname"=>$_POST["lname"],"address"=>$_POST["address"],"email"=>$_POST["email"],"phone"=>$_POST["phone"],"status"=>"1");
			if($dao->insert($data,"tbl_registration"))
			{
				$msg="Success";
			}
			else
			{ 
				//var_dump($dao->getErrors());
				$msg="Failed ,please try again";
			}
			 //some msg
 
		 }
		 else
		 {  
			// var_dump($dao->getErrors());
			   $msg="Failed ,please try again";
		 }
   }
   else
   {
		 $msg="Failed ,please try again";
 //var_dump($dao->getQuery());
 
   }
 }
 else
 {
	 $error=true;
 }
 
 ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
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
					<h2 class="heading-section">REGISTRATION</h2>
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
			      			<h3 class="mb-4">Sign UP</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										
									</p>
								</div>
			      	</div>
							<form action="#" method="POST" class="signin-form" name="reg">
			      		<div class="form-group mb-3">
			      			  <label class="label" for="name">First Name</label>
							  <?php echo $form->textBox("fname",array("placeholder"=>"First Name","class"=>"form-control", "name"=>"fname"));?>
							  <?php echo $validator->error("fname"); ?>
						</div>
						
						<div class="form-group mb-3">
			      			<label class="label" for="name">Last Name</label>
							  <?php echo $form->textBox("lname",array("placeholder"=>"Last Name","class"=>"form-control", "name"=>"lname"));?>
							  <?php echo $validator->error("lname"); ?> 
			      			
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="name">Address</label>
						<?php echo $form->textarea("address",array("placeholder"=>"Address","class"=>"form-control", "name"=>"address"));?>
							  <?php echo $validator->error("address"); ?> 
		
		            </div>
					
					
					<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
							  <?php echo $form->textBox("email",array("placeholder"=>"Email","class"=>"form-control","type"=>"email","name"=>"email"));?>
							  <?php echo $validator->error("email"); ?> 
			      			
			      		</div>
					
					<div class="form-group mb-3">
			      			<label class="label" for="name">Phone Number</label>
							  <?php echo $form->textBox("phone",array("placeholder"=>"Phone Number","class"=>"form-control", "name"=>"phone"));?>
							  <?php echo $validator->error("phone"); ?> 
			      			
			      		</div>
					<div class="form-group mb-3">
			      			<label class="label" for="name">Password</label>
							  
							  <?php echo $form->passwordBox("password",array("placeholder"=>"Password","class"=>"form-control", "name"=>"password"));?>
							  <?php echo $validator->error("password"); ?> 
			      			
			      		</div>
					<div class="form-group mb-3">
			      			<label class="label" for="name">Confirm Password</label>
							  <?php echo $form->passwordBox("confirm_password",array("placeholder"=>"Confirm Password","class"=>"form-control", "name"=>"confirm_password"));?>
							  <?php echo $validator->error("confirm_password"); ?> 
			      			
			      		</div>
					
		            <div class="form-group">
		            	<input type="submit" name="reg" class="form-control btn btn-primary rounded submit px-3"value="Signup">
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										
									</div>
		            </div>
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

