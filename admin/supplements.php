
<?php
 //var_dump($_FILES["subcat_image"]);
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$fields=array("name"=>"","image"=>"","categoryname"=>"","stock"=>"","price"=>"","description"=>"");
$rules=array("name"=>array("required"=>""),"categoryname"=>array("required"=>""),"stock"=>array("required"=>""),"price"=>array("required"=>""),"description"=>array("required"=>""));
$labels=array("subcategoryname"=>"SUB CATEGORY NAME");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["petcategory"]))
{
		//var_dump($_POST);
    if($validator->validate($_POST))
    {
        if(isset($_FILES["image"]))
        { 
            require_once("OOP/classes/FileUpload.class.php");
			$upload= new FileUpload();
            $types=["image/jpg","image/png","image/jpeg"];
            if($file_name=$upload->doUploadCustom($_FILES["image"],$types,500,10,"../pics/subcatpics",$_POST["name"]))
            {
                $data=array("cat_id"=>$_POST["categoryname"],"name"=>$_POST["name"],"image"=>$file_name,"stock"=>$_POST["stock"],"price"=>$_POST["price"],"description"=>$_POST["description"]);
                if($dao->insert($data,"tbl_supplements"))
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
    } 
    else
    {
		var_dump($_POST);

        //die("dfsdfsd");
    }
}
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
			   <label class="label" for="name">Name</label>
			   <?php echo $form->textBox("name",array("placeholder"=>"Sub Category","class"=>"form-control", "name"=>"name"));?>
			   <?php echo $validator->error("name");
			    ?>
			   
			</div>


			<div class="form-group mb-3">
			   <label class="label" for="name">Stock</label>
			   <?php echo $form->textBox("stock",array("placeholder"=>"Stock","class"=>"form-control", "name"=>"stock"));?>
			   <?php echo $validator->error("stock"); ?>
			   </div>


			<div class="form-group mb-3">
			   <label class="label" for="name">Price</label>
			   <?php echo $form->textBox("price",array("placeholder"=>"Price","class"=>"form-control", "name"=>"price"));?>
			   <?php echo $validator->error("price"); ?>
			   </div>
			   <div class="form-group mb-3">
			   <label class="label" for="name">Description</label>
			   <?php echo $form->textBox("description",array("placeholder"=>"Description","class"=>"form-control", "name"=>"description"));?>
			   <?php echo $validator->error("description"); ?>
			   </div>

			  

			<div class="form-group mb-3">
			<label class="label" for="name">Photo</label>
			<input type="file" name="image" id="file"  />
			<div id="submit" class="row">
			<?php echo isset($msg_file)?$msg_file:""; 
			
			?>
			</div>




           





			



<h1><?php echo isset($msg)?$msg:""; ?></h1>
<input type="submit" name="petcategory" class="form-control btn btn-primary rounded submit px-3"value="ADD">
<a class="dropdown-item" href="viewsupplements.php">View Supplements</a>
</form>						  
</center>				

</div>
</div>
</div>
<?php require_once("footer.php"); ?>