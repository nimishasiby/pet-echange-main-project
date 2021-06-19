<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<?php
    date_default_timezone_set("asia/calcutta");

$id=$_GET["id"];
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

if($details = $dao->getData("*","tbl_orderitem","ord_item_id=$id"))
{

	?>
	<table class="table table-striped " style="width:60%; margin: 0 auto;">
		<tr>
			<th>Item</th>
			<td><?php echo $details["0"]["ord_item_type"] ?></td>
		</tr>
		<tr>
			<th>Price ID</th>
			<td><?php echo $details["0"]["ord_item_price"] ?></td>
		</tr>
		<tr>
			<th>quantityr</th>
			<td><?php echo $details["0"]["ord_item_quantity"] ?></td>
		</tr>
		
			<th></th>
			<td><button class="btn btn-primary" id="print">Print</button></td>
		</tr>
	</table>
	<?php

}


?>
</body>
<script type="text/javascript">
	document.getElementById("print").onclick=function(){
		window.print();
	};
</script>
</html>
