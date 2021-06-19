
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
	
	if($cats = $dao->getAllData("tbl_category"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:50%;margin:0 auto;" >
				<tr>
					
					<th>Category Name</th>
					<th>update</th>
					
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					
					<tr>								
						<td><?php echo $cat["categoryname"]; ?></td>
						<td><a class="btn btn-warning" href="updatecategory.php?id=<?php echo $cat["cat_id"]; ?>">Update</a></td>
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