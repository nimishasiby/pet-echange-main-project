
<?php
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$fields=array("categoryname"=>"");
$labels=array("categoryname"=>"Category");
$rules=array("categoryname"=>["required"=>"","unique"=>["field"=>"categoryname","table"=>"tbl_category"]]);
$form=new FormAssist($fields,$_POST);
$validator = new FormValidator($rules,$labels);
$dao=new DataAccess();
if(isset($_POST["petcategory"]))
{
	 //var_dump($_POST);
	if($validator->validate($_POST))
	{
		$ldata =array("categoryname"=>$_POST["categoryname"]);
		if($dao->insert($ldata,"tbl_category"))
		{
			$msg="Success";
		}
		else
		{ 
			//var_dump($dao->getErrors());
			$msg="Failed ,please try again";
		}
	}
	
		//some msg
 
}
?>

<?php require_once("header.php"); ?>
<div class="main_bg" style="min-height: 500px;">
	<div class="wrap">
		<div class="main">    
	        <center>
		        <form action="#" method="post" name="petcategory" style="width:200px">

					<label class="label" for="name"><B>Category Name</label>
					  <?php echo $form->textBox("categoryname",array("placeholder"=>"Category Name","class"=>"text", "name"=>"categoryname"));?>
					  <?php echo $validator->error("categoryname"); ?>
					<input type="submit" name="petcategory" class="form-control btn btn-primary rounded submit px-3"value="ADD">
					<a class="dropdown-item" href="viewcategory.php">View Category</a>
				</form>						  
			</center>				

		</div>
	</div>
</div>
<?php require_once("footer.php"); ?>