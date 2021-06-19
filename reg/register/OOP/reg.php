<?php
require_once("classes/FormAssist.class.php");
$fields=array("name"=>"","email"=>"","gender"=>"","addr"=>"","num"=>"","paswd"=>"");
$form=new FormAssist($fields,$_POST);
?>
<html>

<body>


	   <title> Register </title> 



</a>




	   <style>
			#Lmail
			{
			  position :absolute;
			  right : 900px;

			}body{

        background-image: url("cat5.png");
        background-size: cover;
      }

      div {
  background-color: white;
  width: 400px;
  padding: 25px;    <div>
  opacity:0.6;
}
		</style>




    </head>

    <body background="cat5.png" onload = "firstfocus();">
 <center> <br> <br>
   
<font color="#900C3F">

<center> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<h3> REGISTRATION FORM </h3>
<form method="post" enctype="multipart/form-data">
<fieldset style="width:400px"; "height:400px";>
<table>
<tr>
<td>Name</td>
<td><?php echo $form->textBox("name",array("placeholder"=>"Full Name")); ?></td>
</tr>

<tr>
<td>Email</td>
<td><?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email",)); ?></td>
</tr>



<tr  >
<td>Gender</td>
<td><?php $gender=array("Male"=>"m","Female"=>"f");
echo $form->radioGroup("gender",array("class"=>"class1"),$gender);?></td>
</tr>



<tr>
<td>Address</td>
<td><?php echo $form->textArea("addr",array("placeholder"=>"Address")); ?></td>
</tr>


<tr>
<td>Phone Number</td>
<td><?php echo $form->textBox("num",array("placeholder"=>"Number")); ?></td>
</tr>
			
<tr>
<td> Password </td>
<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password","type"=>"password")); ?></td>
</tr>

<tr>
<td>  Confirm Password </td>
<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"confirm password","type"=>"password")); ?></td>
</tr>




			
<tr>
<td><input type="submit" name="reg" value="Submit" /></td>		
</tr>
			
		


 </table>
	</form>
	</body>

</html>