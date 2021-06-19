<?php 
require_once("header.php"); 
if(isset($_GET["item"]))
{
	$itid=$_GET["id"];
	$item=$_GET["item"];
	if(isset($_SESSION["cart"][$item][$itid]))
	{
		unset($_SESSION["cart"][$item][$itid]);
		if(empty($_SESSION["cart"][$item]))
		{
			unset($_SESSION["cart"][$item]);

		}
	}
}

?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
	<?php
	if(isset($_SESSION["cart"]))
	{
		$total=0;
		if(isset($_SESSION["cart"]["subcat"]))
		{
			?>
			<table class="table table bordered" style="width: 60%; margin: 0 auto;">
			<tr>	
				<th>SubCategory Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>	
                <th>Remove</th>				
			</tr>
			<?php
			foreach ($_SESSION["cart"]["subcat"] as $id => $quantity) 
			{
				$cats = $dao->getData("*","tbl_subcategory","subcat_id=$id");
				$cat= $cats[0];
				$total+=$quantity*$cat["price"];
				?>
				<tr>								
					<td><?php echo $cat["subcat_name"]; ?></td>
                    <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["subcat_image"]; ?>" /></td>
                   
                    <td><?php echo $cat["price"]; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $quantity*$cat["price"]; ?></td>
					<td><a class="btn btn-danger" href="cart.php?item=subcat&id=<?= $id ?>">REMOVE</a></td>
				</tr>

				<?php
				
			}
			?>
			</table>
			<?php
		}
		if(isset($_SESSION["cart"]["material"]))
		{
			?>
			<table class="table table bordered" style="width: 60%; margin: 0 auto;">
			<tr>	
				<th>Material Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>
                <th>Remove</th>				
			</tr>
			<?php
			foreach ($_SESSION["cart"]["material"] as $id => $quantity) 
			{
				$cats =  $dao->getData("*","tbl_materials","material_id=$id");
				$cat= $cats[0];
				$total+=$quantity*$cat["ma_price"];

				?>
				<tr>								
					<td><?php echo $cat["ma_name"]; ?></td>
                    <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["ma_image"]; ?>" /></td>
                   
                    <td><?php echo $cat["ma_price"]; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $quantity*$cat["ma_price"]; ?></td>
					<td><a class="btn btn-danger" href="cart.php?item=material&id=<?= $id ?>">REMOVE</a></td>
				</tr>

				<?php
				
			}
			?>
			</table>
			<?php
		}
		if(isset($_SESSION["cart"]["food"]))
		{
			?>
			<table class="table table bordered" style="width: 60%; margin: 0 auto;">
			<tr>	
				<th>Food Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>
                <th>Remove</th>					
			</tr>
			<?php
			foreach ($_SESSION["cart"]["food"] as $id => $quantity) 
			{
				$cats =  $dao->getData("*","tbl_food","food_id=$id");
				$cat= $cats[0];
				$total+=$quantity*$cat["fd_price"];

				?>
				<tr>								
					<td><?php echo $cat["fd_name"]; ?></td>
                    <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["fd_image"]; ?>" /></td>
                   
                    <td><?php echo $cat["fd_price"]; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $quantity*$cat["fd_price"]; ?></td>
					<td><a class="btn btn-danger" href="cart.php?item=food&id=<?= $id ?>">REMOVE</a></td>	
				</tr>

				<?php
				
			}
			?>
			</table>
			<?php
		}
		if(isset($_SESSION["cart"]["supliment"]))
		{
			?>
			<table class="table table bordered" style="width: 60%; margin: 0 auto;">
			<tr>	
				<th>supplement Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>					
                <th>Remove</th>					
			</tr>
			<?php
			foreach ($_SESSION["cart"]["supliment"] as $id => $quantity) 
			{
				$cats =  $dao->getData("*","tbl_supplements","supplement_id=$id");
				$cat= $cats[0];
				$total+=$quantity*$cat["price"];

				?>
				<tr>								
					<td><?php echo $cat["name"]; ?></td>
                    <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["image"]; ?>" /></td>
                   
                    <td><?php echo $cat["price"]; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $quantity*$cat["price"]; ?></td>
                    <td><a class="btn btn-danger" href="cart.php?item=supliment&id=<?= $id ?>">REMOVE</a></td>
						
				</tr>

				<?php
				
			}
			?>
			</table>
			
			<?php
		}
		?>
		<table class="table table bordered" style="width: 60%; margin: 0 auto;">
				<tr>	
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
	                <th><h3>Grand Total</h3></th>
	                <th><h4><?= $total ?></h4></th>					
				</tr>
				<tr>	
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
	                <th><h3><a class="btn btn-success" href="order.php?amount=<?= $total ?>">Place Order</a></h3></th>
	                <th></th>					
				</tr>
				
			</table>
		<?php
	}
	else
	{
		?>
		<h1>Cart is Empty</h1>
		<?php
	}

	?>


	
</div>
</div>
</div>
<?php require_once("footer.php"); ?>