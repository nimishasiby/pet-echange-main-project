<?php
require_once("classes/FormAssist.class.php");

$fields=array("name"=>"","address"=>"","gender"=>"","email"=>"","phonenumber"=>"","username"=>"","password"=>"","confpass"=>"");
$form=new FormAssist($fields,$_POST);

?>
<html>
	<head>
		
	</head>
	<body>
		<h3>Registration</h3>
		<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name</td>
				<td><?php echo $form->textBox("name",array("placeholder"=>"Full Name")); ?></td>
				<td></td>
			</tr>
			
			<tr>
				<td>Address</td>
				<td><?php echo $form->textArea("addr",array("placeholder"=>"address")); ?></td>
				<td></td>
			</tr>
			
			
			
			<tr>
				<td>Gender</td>
				<td><?php
					$gender=array("Male"=>"m","Female"=>"f");
					echo $form->radioGroup("gender",array("class"=>"class1"),$gender);
				?></td>
				<td></td>
			</tr>
			
			
			<tr>
				<td>Email</td>
				<td><?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email",)); ?></td>
				<td></td>
			</tr>
			
			
			
			
			
			
	<tr>
				<td>Phone Number</td>
				<td><?php echo $form->textBox("number",array("placeholder"=>"number","type"=>"number",)); ?></td>
				<td></td>
			</tr>		
			
			
			
			
			
			
			
			<tr>
				<td>Password</td>
				<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password","type"=>"password")); ?></td>
				<td></td>
			</tr>
			
			
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="reg" value="Register" /></td>
				<td>&nbsp;</td>			
			</tr>
		</table>
	</form>
	</body>

</html>