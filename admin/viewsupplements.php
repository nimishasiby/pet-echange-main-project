
<?php
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

?>
<?php 
require_once("header.php"); 


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
	
	
	<?php
	
	if($cats = $dao->getAllData("tbl_supplements"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:50%;margin:0 auto;" >
				<tr>
					
					<th> Supplement Name</th>
                    <th> image</th>
                    <th> Stock</th>
                    <th> Price</th>
                    <th> Description</th>
					<th>update</th>
					
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					
					<tr>								
						<td><?php echo $cat["name"]; ?></td>
						<td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["image"]; ?>" /></td>
                        <td><?php echo $cat["stock"]; ?></td>
                        <td><?php echo $cat["price"]; ?></td>
                        <td><?php echo $cat["description"]; ?></td>
						<td><a class="btn btn-warning" href="updatesupplements.php?id=<?php echo $cat["supplement_id"]; ?>">Update</a></td>
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