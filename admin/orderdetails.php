<?php 
require_once("header.php"); 
if(!isset($_GET["id"]))
{
    header("location:listorders.php");
}
$id=$_GET["id"];
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();
$order = $dao->getData("*","tbl_order","ord_id=$id");

?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
	<table class="table table bordered" style="width: 50%; margin: 0 auto;">
		<tr>
			<th colspan="2">Transaction Details</th>
		</tr>
		<tr>
			<th>Account No</th>
			<td><?php echo $order[0]["ord_trans_from"] ?></td>
		</tr>
		<tr>
			<th>Transaction ID</th>
			<td><?php echo $order[0]["ord_trans_no"] ?></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><?php echo $order[0]["ord_trans_name"] ?></td>
		</tr>
		<tr>
			<th>Amount</th>
			<td><?php echo $order[0]["ord_total"] ?></td>
		</tr>
		<tr>
			<th>Date time</th>
			<td><?php echo date("d/m/Y h:i:s a",$order[0]["ord_date"]); ?></td>
		</tr>
	</table>
	<?php
	if($items=$dao->getData("*","tbl_orderitem","ord_item_ord_id=$id"))
	{
		?>
		<table class="table table bordered" style="width: 60%; margin: 0 auto;">
			<tr>	
				<th>Name</th>
				<th>Type</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>	
	                		
			</tr>
		<?php
		foreach ($items as $item) 
		{
			
			if($item["ord_item_type"]=="subcat")
			{
				$itemid=$item["ord_item_item_id"];
				$cats = $dao->getData("*","tbl_subcategory","subcat_id=$itemid");
				$cat= $cats[0];
				
				?>
				<tr>								
					<td><?php echo $cat["subcat_name"]; ?></td>
					<td>Pets</td>
                    <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["subcat_image"]; ?>" /></td>
                   
                    <td><?php echo $item["ord_item_price"]; ?></td>
                    <td><?php echo $item["ord_item_quantity"]; ?></td>
                    <td><?php echo $item["ord_item_quantity"]*$item["ord_item_price"]; ?></td>
					
				</tr>
				<?php
			}
			else if($item["ord_item_type"]=="material")
			{
				$itemid=$item["ord_item_item_id"];
				$cats = $dao->getData("*","tbl_materials","material_id=$itemid");
				$cat= $cats[0];
				
				?>
				<tr>								
					<td><?php echo $cat["ma_name"]; ?></td>
					<td>Material</td>
                    <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["ma_image"]; ?>" /></td>
                   
                    <td><?php echo $item["ord_item_price"]; ?></td>
                    <td><?php echo $item["ord_item_quantity"]; ?></td>
                    <td><?php echo $item["ord_item_quantity"]*$item["ord_item_price"]; ?></td>
					
				</tr>
				<?php
			}
			else if($item["ord_item_type"]=="food")
			{
				$itemid=$item["ord_item_item_id"];
				$cats = $dao->getData("*","tbl_food","food_id=$itemid");
				$cat= $cats[0];
				
				?>
				<tr>								
					<td><?php echo $cat["fd_name"]; ?></td>
					<td>Food Item</td>
                    <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["fd_image"]; ?>" /></td>
                   
                    <td><?php echo $item["ord_item_price"]; ?></td>
                    <td><?php echo $item["ord_item_quantity"]; ?></td>
                    <td><?php echo $item["ord_item_quantity"]*$item["ord_item_price"]; ?></td>
					
				</tr>
				<?php
			}
			else if($item["ord_item_type"]=="supplement")
			{
				$itemid=$item["ord_item_item_id"];
				$cats = $dao->getData("*","tbl_supplements","supplement_id=$itemid");
				$cat= $cats[0];
				
				?>
				<tr>								
					<td><?php echo $cat["name"]; ?></td>
					<td>Supplement</td>
                    <td><img style="width:100px;height:100px;" src="../pics/subcatpics/<?php echo $cat["image"]; ?>" /></td>
                   
                    <td><?php echo $item["ord_item_price"]; ?></td>
                    <td><?php echo $item["ord_item_quantity"]; ?></td>
                    <td><?php echo $item["ord_item_quantity"]*$item["ord_item_price"]; ?></td>
					
				</tr>
				<?php
			}
			
		}
		?>
			<tr>
				<td colspan="4" ></td>
				<td>Total</td>
				<td><?php echo $order[0]["ord_total"]; ?></td>
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