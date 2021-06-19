<?php


require_once("header.php"); 
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="main">
<?php
	
	if($orders = $dao->getData("*","tbl_order","1 order by ord_id desc"))
	{
		// var_dump($students);
		?>
			<table class="table table-bordered" style="width:90%;margin:0 auto;" >
				<tr>
					
					<th> User</th>
					<th> Email</th>
					<th> Date</th>
                    <th>Total</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Items</th>
            
					
				</tr>
				<?php
				foreach($orders as $order)
				{
					$regid=$order["ord_user_id"];
					$userdetails = $dao->getData("*","tbl_registration","reg_id=$regid");
					?>
					
					<tr>
						<td><?php echo $userdetails[0]["firstname"]." ".$userdetails[0]["lastname"]; ?></td>
						<td><?php echo $userdetails[0]["email"]; ?></td>

						<td><?php echo date("d/m/Y h:i a",$order["ord_date"]); ?></td>
						<td><?php echo $order["ord_total"]; ?></td>
						<td><?php echo $order["ord_address"]; ?></td>
						<td><?php echo $order["ord_contact"]; ?></td>
						<td><a class="btn btn-success" href="orderdetails.php?id=<?php echo $order["ord_id"]; ?>"> ITEMS</a></td>
						
					</tr>
					

					<?php
				}

				?>

			</table>
			<hr>


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