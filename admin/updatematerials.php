<?php
if(!isset($_GET["id"]))
{
	header("location:viewmaterials.php");
}
//var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$dao=new DataAccess();

$id=$_GET["id"];

$rules=array("ma_name"=>array("required"=>""),"categoryname"=>array("required"=>""),"ma_stock"=>array("required"=>""),"ma_price"=>array("required"=>""),"ma_description"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);
$dao=new DataAccess();
if(isset($_POST["petcategory"]))
{
		//var_dump($_POST);
    if($validator->validate($_POST))
    {
		var_dump($_FILES);
        if($_FILES["ma_image"]["error"]==0)
        { 
            require_once("OOP/classes/FileUpload.class.php");
            $upload= new FileUpload();
            $types=["image/jpg","image/png","image/jpeg"];
            if($file_name=$upload->doUploadCustom($_FILES["ma_image"],$types,500,10,"../pics/subcatpics",$_POST["ma_name"]))
            {
                $data=array("cat_id"=>$_POST["categoryname"],"ma_name"=>$_POST["ma_name"],"ma_image"=>$file_name,"ma_stock"=>$_POST["ma_stock"],"ma_price"=>$_POST["ma_price"],"ma_description"=>$_POST["ma_description"],"status"=>$_POST["status"]);
                if($dao->update($data,"tbl_materials","material_id=$id"))
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
			$data=array("cat_id"=>$_POST["categoryname"],"ma_name"=>$_POST["ma_name"],"ma_image"=>$file_name,"ma_stock"=>$_POST["ma_stock"],"ma_price"=>$_POST["ma_price"],"ma_description"=>$_POST["ma_description"],"status"=>$_POST["status"]);
			if($dao->update($data,"tbl_materials","material_id=$id"))
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
if(!$data = $dao->getData("*","tbl_materials","material_id=$id"))
{
	header("location:viewmaterials.php");
}
$details = $data[0];
$fields=array("ma_name"=>$details["ma_name"],"ma_image"=>"","categoryname"=>$details["cat_id"],"ma_stock"=>$details["ma_stock"],"ma_price"=>$details["ma_price"],"ma_description"=>$details["ma_description"],"status"=>$details["status"]);
$form=new FormAssist($fields,$_POST);
?>

<?php 
require_once("header.php"); 


?>
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
				  <label class="label" for="name"> Material Name</label>
				  <?php echo $form->textBox("ma_name",array("placeholder"=>"Material Name","class"=>"form-control", "name"=>"ma_name"));?>
				  <?php echo $validator->error("ma_name");
				   ?>
				  
			   </div>
   
   
			   <div class="form-group mb-3">
				  <label class="label" for="name">Stock</label>
				  <?php echo $form->textBox("ma_stock",array("placeholder"=>"Stock","class"=>"form-control", "name"=>"ma_stock"));?>
				  <?php echo $validator->error("ma_stock"); ?>
				  </div>
   
   
			   <div class="form-group mb-3">
				  <label class="label" for="name">Price</label>
				  <?php echo $form->textBox("ma_price",array("placeholder"=>"Price","class"=>"form-control", "name"=>"ma_price"));?>
				  <?php echo $validator->error("ma_price"); ?>
				  </div>
				  <div class="form-group mb-3">
				  <label class="label" for="name">Description</label>
				  <?php echo $form->textBox("ma_description",array("placeholder"=>"Description","class"=>"form-control", "name"=>"ma_description"));?>
				  <?php echo $validator->error("ma_description"); ?>
				  </div>
   
				 
   
			   <div class="form-group mb-3">
			   <label class="label" for="name">Photo</label>
			   <input type="file" name="ma_image" id="file"  />
			   <div id="submit" class="row">
			   <?php echo isset($msg_file)?$msg_file:""; 
			   
			   ?>
			   </div>
   
   
   
   
			  
   <br>
   
   <div class="form-group mb-3">
   <?php
   $cats=$dao->createOptions("categoryname","cat_id","tbl_category");
   echo $form->dropDownList("categoryname",array("class"=>"form-input"),$cats,"Select Category");
   ?>
   </div>
   
   
   
   <div class="form-group mb-3">
<?php
$status=["Active"=>"A","Blocked"=>"B","Removed"=>"R"];
echo $form->dropDownList("status",array("class"=>"form-input"),$status,"Select");
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