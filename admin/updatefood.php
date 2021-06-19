<?php
if(!isset($_GET["id"]))
{
	header("location:viewfood.php");
}
//var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$dao=new DataAccess();

$id=$_GET["id"];

$rules=array("fd_name"=>array("required"=>""),"fd_stock"=>array("required"=>""),"fd_price"=>array("required"=>""),"fd_description"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);
$dao=new DataAccess();
if(isset($_POST["petcategory"]))
{
	//var_dump($_POST);
    if($validator->validate($_POST))
    {
		var_dump($_FILES);
        if($_FILES["fd_image"]["error"]==0)
        { 
            require_once("OOP/classes/FileUpload.class.php");
            $upload= new FileUpload();
            $types=["image/jpg","image/png","image/jpeg"];
            if($file_name=$upload->doUploadCustom($_FILES["fd_image"],$types,500,10,"../pics/subcatpics",$_POST["fd_name"]))
            {
                $data=array("cat_id"=>$_POST["categoryname"],"fd_name"=>$_POST["fd_name"],"fd_image"=>$file_name,"fd_stock"=>$_POST["fd_stock"],"fd_price"=>$_POST["fd_price"],"fd_description"=>$_POST["fd_description"]);
                if($dao->update($data,"tbl_food","food_id=$id"))
				{
					$msg="Success";
				}
				else
				{
					$msg="Insertion failed";
				}
            }
            else
            {
            	$msg_file=$upload->errors();
            }
				  
        }
		else
		{
			$data=array("cat_id"=>$_POST["categoryname"],"fd_name"=>$_POST["fd_name"],"fd_image"=>$file_name,"fd_stock"=>$_POST["fd_stock"],"fd_price"=>$_POST["fd_price"],"fd_description"=>$_POST["fd_description"]);
			if($dao->update($data,"tbl_food","food_id=$id"))
			{
				$msg="Success";
			}
			else
			{
				$msg="Insertion failed";
			}

		}	
    } 
    else
    {

	}
}
if(!$data = $dao->getData("*","tbl_food","food_id=$id"))
{
	header("location:viewfood.php");
}
$details = $data[0];
$fields=array("fd_name"=>$details["fd_name"],"fd_image"=>"","categoryname"=>$details["cat_id"],"fd_stock"=>$details["fd_stock"],"fd_price"=>$details["fd_price"],"fd_description"=>$details["fd_description"]);
$form=new FormAssist($fields,$_POST);	
?>

<?php require_once("header.php"); ?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
        
        <center>

        <form method="post" name="subcategory" enctype="multipart/form-data" style="width:200px">
		   

		<br>

<div class="form-group mb-3">
<?php
$cats=$dao->createOptions("categoryname","cat_id","tbl_category");
echo $form->dropDownList("categoryname",array("class"=>"form-input"),$cats,"Select Category");
?>
</div>


		<div class="form-group mb-3">
			   <label class="label" for="name"> Food Name</label>
			   <?php echo $form->textBox("fd_name",array("placeholder"=>"Material Name","class"=>"form-control", "name"=>"fd_name"));?>
			   <?php echo $validator->error("fd_name");
			    ?>
			   
			</div>


			<div class="form-group mb-3">
			   <label class="label" for="name">Stock</label>
			   <?php echo $form->textBox("fd_stock",array("placeholder"=>"Stock","class"=>"form-control", "name"=>"fd_stock"));?>
			   <?php echo $validator->error("fd_stock"); ?>
			   </div>


			<div class="form-group mb-3">
			   <label class="label" for="name">Price</label>
			   <?php echo $form->textBox("fd_price",array("placeholder"=>"Price","class"=>"form-control", "name"=>"fd_price"));?>
			   <?php echo $validator->error("fd_price"); ?>
			   </div>
			   <div class="form-group mb-3">
			   <label class="label" for="name">Description</label>
			   <?php echo $form->textBox("fd_description",array("placeholder"=>"Description","class"=>"form-control", "name"=>"fd_description"));?>
			   <?php echo $validator->error("fd_description"); ?>
			   </div>

			  

			<div class="form-group mb-3">
			<label class="label" for="name">Photo</label>
			<input type="file" name="fd_image" id="file"  />
			<div id="submit" class="row">
			<?php echo isset($msg_file)?$msg_file:""; 
			
			?>
			</div>




           



			



<h1><?php echo isset($msg)?$msg:""; ?></h1>
<input type="submit" name="petcategory" class="form-control btn btn-primary rounded submit px-3"value="ADD">
</form>						  
</center>				

		
</div>
</div>
</div>
<?php require_once("footer.php"); ?>