<?php
require_once("classes/FormAssist.class.php");
$fields=array("email"=>"","paswd"=>"");
$form=new FormAssist($fields,$_POST);
?>
<html>

<body>


	   <title> Login  </title> 
	   
	   
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
<h3> LOGIN  </h3>
<form method="post" enctype="multipart/form-data">
<fieldset style="width:400px"; "height:400px";>
<table>

<tr>
<td>Email</td>
<td><?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email",)); ?></td>
</tr>


<tr>
<td> Password </td>
<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password","type"=>"password")); ?></td>
</tr>


<tr>
<td><input type="submit" name="reg" value="Submit" /></td>		
</tr>
 </table>
	</form>
	</body>

</html>