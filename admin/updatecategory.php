<?php

if(!isset($_GET["id"]))
{
	header("location:viewsubcategory.php");
}
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$dao=new DataAccess();

$id=$_GET["id"];
$fields=array("categoryname"=>"");
$rules=array("categoryname"=>array("required"=>""));

$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);
$dao=new DataAccess();
if(isset($_POST["petcategory"]))
{
		 //var_dump($_POST);
	$data =array("categoryname"=>$_POST["categoryname"]);
	if($dao->update($data,"tbl_category","cat_id=$id"))
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
    $data=array("categoryname"=>$_POST["categoryname"]);
    if($dao->update($data,"tbl_category","cat_id=$id"))
    {
        $msg="Success";
    }
    else
    {
        $msg="Insertion failed";
    }
}
if(!$data = $dao->getData("*","tbl_category","cat_id=$id"))
{
    header("location:viewcategory.php");
}
$details = $data[0];
$fields=array("categoryname"=>$details["categoryname"]);
$form=new FormAssist($fields,$_POST);
?>


<?php require_once("header.php"); ?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
		
        
        <center>

        <form action="#" method="POST" name="petcategory" style="width:200px">

      
			 <label class="label" for="name"><B>Category Name</label>
			  <?php echo $form->textBox("categoryname",array("placeholder"=>"Category Name","class"=>"text", "name"=>"categoryname"));?>
              <?php echo $validator->error("categoryname");
              ?>
<input type="submit" name="petcategory" class="form-control btn btn-primary rounded submit px-3"value="ADD">
</form>						  
</center>				

</div>
</div>
</div>
<?php require_once("footer.php"); ?>