<?php
if(!isset($_GET["id"]))
{
    header("location:home.php");
}
$id=$_GET["id"];
require_once("header.php"); 


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
<?php
	
	if($cats = $dao->getData("*","tbl_subcategory","subcat_id=$id"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:50%;margin:0 auto;" >
				<tr>
					
					<th> SubCategory Name</th>
                    <th>  Image</th>
                    <th> Age</th>
                    <th> Stock</th>
                    <th> Price</th>

					
					
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					<
					<tr>								
						<td><?php echo $cat["subcat_name"]; ?></td>
                        <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["subcat_image"]; ?>" /></td>
                        <td><?php echo $cat["age"]; ?></td>
                        <td><?php echo $cat["stock"]; ?></td>
                        <td><?php echo $cat["price"]; ?></td>

					</tr>

					<?php
				}

				?>

			</table>


		<?php
	}
	else
	{
		echo "<h3>No categoriid found :: </h3>";
	}


?>

<?php
	
	if($cats = $dao->getData("*","tbl_materials","material_id=$id"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:50%;margin:0 auto;" >
				<tr>
					
					<th> Material Name</th>
                    <th> image</th>
                    <th> Stock</th>
                    <th> Price</th>
                    <th> Description</th>
					
					
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					<
					<tr>								
						<td><?php echo $cat["ma_name"]; ?></td>
                        <td><?php echo $cat["ma_image"]; ?></td>
                        <td><?php echo $cat["ma_stock"]; ?></td>
                        <td><?php echo $cat["ma_price"]; ?></td>
                        <td><?php echo $cat["ma_description"]; ?></td>
						
					</tr>

					<?php
				}

				?>

			</table>


		<?php
	}
	else
	{
		echo "<h3>No categoriid found :: </h3>";
	}


?>
</div>
</div>
</div>
<?php require_once("footer.php"); ?>