
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
	
	if($cats = $dao->getData("*","tbl_subcategory","status!='R'"))
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

					<th>update</th>
					
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					
					<tr>								
						<td><?php echo $cat["subcat_name"]; ?></td>
                        <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["subcat_image"]; ?>" /></td>
                        <td><?php echo $cat["age"]; ?></td>
                        <td><?php echo $cat["stock"]; ?></td>
                        <td><?php echo $cat["price"]; ?></td>

						<td><a class="btn btn-warning" href="updatesubcategory.php?id=<?php echo $cat["subcat_id"]; ?>">Update</a></td>
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
<button class="btn btn-success" id="print">Print</button>
<script>
document.getElementById("print").onclick=function(){
	window.print();
};
</script>


</div>
</div>
</div>
<?php require_once("footer.php"); ?>