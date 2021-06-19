

<?php
if(!isset($_GET["id"]))
{
    header("location:home.php");
}
$id=$_GET["id"];


require_once("header.php"); 
if(isset($_POST["add"]))
{
	$itemid=$_POST["id"];
	$item=$_POST["item"];
	$q=$_POST["quantity"];
	$_SESSION["cart"][$item][$itemid]=$q;
	
	
}

?>
<body background="1.jpg">

<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
<?php
	
	if($cats = $dao->getData("*","tbl_subcategory","subcat_id=$id"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:80%;margin:0 auto;" >
			
			<col width="170">
            <col width="80">
			<col width="80">
			<col width="80">
                <col width="300">
				<tr>
					
					<th> SubCategory Name</th>
                    <th>  Image</th>
                    <th> Age</th>
                    <th> Stock</th>
                    <th> Price</th>

					<th>Cart</th>
	
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					<form method="post">
						<input type="hidden" name="item" value="subcat">
						<input type="hidden" name="id" value="<?php echo $cat["subcat_id"]; ?>">
					<tr>								
						<td><?php echo $cat["subcat_name"]; ?></td>
                        <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["subcat_image"]; ?>" /></td>
                        <td><?php echo $cat["age"]; ?></td>
                        <td><?php echo $cat["stock"]; ?></td>
                        <td><?php echo $cat["price"]; ?></td>
						<td>
							<?php
							if($cat["stock"]>0)
							{

							?>
							<input type="submit" class="btn btn-success" name="add" value="ADD To CART" />
							<select name="quantity" class="form-control" style="width: 50%;">
								<?php
								for($i=1;$i<=$cat["stock"];$i++)
								{
									?>
									<option value="<?= $i ?>"><?= $i ?></option>
									<?php
								}
								?>
							</select>
							<?php 
							}
							else
							{
								?>
								<h4 class="text-danger">Out of Stock</h4>
								<?php
							}
							?>
						</td>
					</tr>
					</form>

					<?php
				}

				?>

			</table>
			<hr>


		<?php
	}
	else
	{
		echo "<h3>No Items Found </h3>";
	}


?>

<?php
	
	if($cats = $dao->getData("*","tbl_materials","cat_id=$id"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:80%;margin:0 auto;" >
			
			<col width="170">
            <col width="80">
			<col width="80">
			<col width="80">
                <col width="300">

			<tr>
					
					<th> Material Name</th>
                    <th> image</th>
                    <th> Stock</th>
                    <th> Price</th>
                    <th> Description</th>
					<th> Cart</th>
					
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					<form method="post">
						<input type="hidden" name="item" value="material">
						<input type="hidden" name="id" value="<?php echo $cat["material_id"]; ?>">
					<tr>								
						<td><?php echo $cat["ma_name"]; ?></td>
						<td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["ma_image"]; ?>" /></td>
                        <td><?php echo $cat["ma_stock"]; ?></td>
                        <td><?php echo $cat["ma_price"]; ?></td>
                        <td><?php echo $cat["ma_description"]; ?></td>
						<td>
							<?php
							if($cat["ma_stock"]>0)
							{

							?>
							<input type="submit" class="btn btn-success" name="add" value="ADD To CART" />
							<select name="quantity" class="form-control" style="width: 50%;">
								<?php
								for($i=1;$i<=$cat["ma_stock"];$i++)
								{
									?>
									<option value="<?= $i ?>"><?= $i ?></option>
									<?php
								}
								?>
							</select>
							<?php 
							}
							else
							{
								?>
								<h4 class="text-danger">Out of Stock</h4>
								<?php
							}
							?>
						</td>
					</tr>
				</form>

					<?php
				}

				?>

			</table>
			<hr>


		<?php
	}
	else
	{
		echo "<h3>No Materials found For this item </h3>";
	}


?>


<?php
	
	if($cats = $dao->getData("*","tbl_food","cat_id=$id"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:80%;margin:0 auto;" >
			<col width="170">
            <col width="80">
			<col width="80">
			<col width="80">
                <col width="300">
			<tr>
					
					<th> Food Name</th>
                    <th> image</th>
                    <th> Stock</th>
                    <th> Price</th>
                    <th> Description</th>
					<th>Cart</th>
					
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					<form method="post">
						<input type="hidden" name="item" value="food">
						<input type="hidden" name="id" value="<?php echo $cat["food_id"]; ?>">
					<tr>								
						<td><?php echo $cat["fd_name"]; ?></td>
						<td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["fd_image"]; ?>" /></td>
                        <td><?php echo $cat["fd_stock"]; ?></td>
                        <td><?php echo $cat["fd_price"]; ?></td>
                        <td><?php echo $cat["fd_description"]; ?></td>
						<td>
							<?php
							if($cat["fd_stock"]>0)
							{

							?>
							<input type="submit" class="btn btn-success" name="add" value="ADD To CART" />
							<select name="quantity" class="form-control" style="width: 50%;">
								<?php
								for($i=1;$i<=$cat["fd_stock"];$i++)
								{
									?>
									<option value="<?= $i ?>"><?= $i ?></option>
									<?php
								}
								?>
							</select>
							<?php 
							}
							else
							{
								?>
								<h4 class="text-danger">Out of Stock</h4>
								<?php
							}
							?>
						</td>
					</tr>
					</form>

					<?php
				}

				?>

			</table>
			<hr>

		<?php
	}
	else
	{
		echo "<h3>No Food Item found For this item </h3>";
		
	}


?>


<?php
	
	if($cats = $dao->getData("*","tbl_supplements","cat_id=$id"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:80%;margin:0 auto;" >
			<col width="170">
            <col width="80">
			<col width="80">
			<col width="80">
                <col width="300">
			<tr>
					
					<th> Supplement Name</th>
                    <th> image</th>
                    <th> Stock</th>
                    <th> Price</th>
                    <th> Description</th>
					<th> Cart</th>
					
				</tr>
				<?php
				foreach($cats as $cat)
				{
					?>
					<form method="post">
						<input type="hidden" name="item" value="supliment">
						<input type="hidden" name="id" value="<?php echo $cat["supplement_id"]; ?>">
					<tr>								
						<td><?php echo $cat["name"]; ?></td>
						<td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["image"]; ?>" /></td>
                        <td><?php echo $cat["stock"]; ?></td>
                        <td><?php echo $cat["price"]; ?></td>
                        <td><?php echo $cat["description"]; ?></td>
						<td>
							<?php
							if($cat["stock"]>0)
							{

							?>
							<input type="submit" class="btn btn-success" name="add" value="ADD To CART" />
							<select name="quantity" class="form-control" style="width: 50%;">
								<?php
								for($i=1;$i<=$cat["stock"];$i++)
								{
									?>
									<option value="<?= $i ?>"><?= $i ?></option>
									<?php
								}
								?>
							</select>
							<?php 
							}
							else
							{
								?>
								<h4 class="text-danger">Out of Stock</h4>
								<?php
							}
							?>
						</td>
					</tr>

					<?php
				}

				?>

			</table>


		<?php
	}
	else
	{
		echo "<h3>No Suppliments found For this item </h3>";

		
	}


?>






</div>
</div>
</div>
<?php require_once("footer.php"); ?>