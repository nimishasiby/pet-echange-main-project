
<?php
require_once("header.php");
require_once("payment.php");
 

//var_dump($_SESSION);

require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
$fields=array("address"=>"","phone"=>"","cardno"=>"","cvv"=>"","expiry"=>"","name"=>"");
$rules=array("address"=>array("required"=>""),
			"phone"=>array("required"=>""),
			"cardno"=>array("required"=>""),
			"cvv"=>array("required"=>""),
			"name"=>array("required"=>""),
			"expiry"=>array("required"=>""),
		);
$labels=array();
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["send"]))
{
	//var_dump($_POST);
    if($validator->validate($_POST))
    {
    	$pay_details = pay($_POST["cardno"],$_POST["cvv"],$_POST["expiry"],$_GET["amount"]);
    	//var_dump($pay_details);
    	if($pay_details["status"])
    	{
	        $reg_id=$_SESSION["reg_id"];

	        $data=array("ord_user_id"=>$reg_id,"ord_contact"=>$_POST["phone"],"ord_address"=>$_POST["address"],"ord_date"=>time(),"ord_trans_from"=>$_POST["cardno"],"ord_trans_no"=>$pay_details["trans_no"],"ord_trans_name"=>$_POST["name"],"ord_status"=>'p');
	        if($dao->insert($data,"tbl_order"))
	        {
	            //$msg="Success";
	            $ordid= $dao->max("ord_id","tbl_order","ord_user_id=$reg_id");
	            if(isset($_SESSION["cart"]))
				{
					$total=0;
					// adding subcategories to order
					if(isset($_SESSION["cart"]["subcat"]))
					{
						foreach($_SESSION["cart"]["subcat"] as $id => $quantity) 
						{
							$details = $dao->getData("*","tbl_subcategory","subcat_id=$id");
							$total+=$quantity*$details[0]["price"];

							$data = array("ord_item_ord_id"=>$ordid,"ord_item_type"=>"subcat","ord_item_item_id"=>$id,"ord_item_quantity"=>$quantity,"ord_item_price"=>$details[0]["price"],"ord_item_status"=>'p');
							$dao->insert($data,"tbl_orderitem");
							
							$stock=$details[0]["stock"]-$quantity;
							$dao->update(["stock"=>$stock],"tbl_subcategory","subcat_id=$id");
						}	
					}
					// adding material to order
					if(isset($_SESSION["cart"]["material"]))
					{
						foreach($_SESSION["cart"]["material"] as $id => $quantity) 
						{
							$details = $dao->getData("*","tbl_materials","material_id=$id");
							$total+=$quantity*$details[0]["ma_price"];

							$data = array("ord_item_ord_id"=>$ordid,"ord_item_type"=>"material","ord_item_item_id"=>$id,"ord_item_quantity"=>$quantity,"ord_item_price"=>$details[0]["ma_price"],"ord_item_status"=>'p');
							$dao->insert($data,"tbl_orderitem");
							$stock=$details[0]["ma_stock"]-$quantity;
							$dao->update(["ma_stock"=>$stock],"tbl_materials","material_id=$id");
						}	
					}
					// adding Food to order
					if(isset($_SESSION["cart"]["food"]))
					{
						foreach($_SESSION["cart"]["food"] as $id => $quantity) 
						{
							$details = $dao->getData("*","tbl_food","food_id=$id");
							$total+=$quantity*$details[0]["fd_price"];

							$data = array("ord_item_ord_id"=>$ordid,"ord_item_type"=>"food","ord_item_item_id"=>$id,"ord_item_quantity"=>$quantity,"ord_item_price"=>$details[0]["fd_price"],"ord_item_status"=>'p');
							$dao->insert($data,"tbl_orderitem");
							$stock=$details[0]["fd_stock"]-$quantity;
							$dao->update(["fd_stock"=>$stock],"tbl_food","food_id=$id");
						}	
					}
					// adding supplements to order
					if(isset($_SESSION["cart"]["supliment"]))
					{
						foreach($_SESSION["cart"]["supliment"] as $id => $quantity) 
						{
							$details = $dao->getData("*","tbl_supplements","supplement_id=$id");
							$total+=$quantity*$details[0]["price"];

							$data = array("ord_item_ord_id"=>$ordid,"ord_item_type"=>"supplement","ord_item_item_id"=>$id,"ord_item_quantity"=>$quantity,"ord_item_price"=>$details[0]["price"],"ord_item_status"=>'p');
							$dao->insert($data,"tbl_orderitem");
							$stock=$details[0]["stock"]-$quantity;
							$dao->update(["fstock"=>$stock],"tbl_supplements","supplement_id=$id");
						}	
					}
					$dao->update(["ord_total"=>$total],"tbl_order","ord_id=$ordid");
					unset($_SESSION["cart"]);
					$msg="Order placed Successfully";

				}
	        }
	        else
	    	{
	            $msg="Failed, please Try Again";
	        }   
    	}
    	else
    	{
    		$msg=$pay_details["message"];
    	}
    } 
    else
    {
		//var_dump($_POST);

        //die("dfsdfsd");
    }
}
 


?>
<div class="main_bg" style="min-height: 500px;margin:0 auto;">
<div class="wrap">
<div class="main" >
	<center>
	 <form method="post" name="subcategory"  style="width:200px">
		   
			<h3>Payment Info</h3>
			<div class="form-group mb-3">
			   <label class="label" for="">Name</label>
			   <?php echo $form->textBox("name",array("placeholder"=>"Name on Card","class"=>"form-control"));?>
			   <?php echo $validator->error("name");
			    ?>
			   
			</div>
			<div class="form-group mb-3">
			   <label class="label" for="">Card No</label>
			   <?php echo $form->textBox("cardno",array("placeholder"=>"Card Number","class"=>"form-control"));?>
			   <?php echo $validator->error("cardno");
			    ?>
			   
			</div>

			<div class="form-group mb-3">
			   <label class="label" for="">CVV</label>
			   <?php echo $form->textBox("cvv",array("placeholder"=>"3 dgit CVV","class"=>"form-control"));?>
			   <?php echo $validator->error("cvv");
			    ?>
			   
			</div>

			<div class="form-group mb-3">
			   <label class="label" for="">Expiry</label>
			   <?php echo $form->textBox("expiry",array("placeholder"=>"mm/yy","class"=>"form-control"));?>
			   <?php echo $validator->error("expiry");
			    ?>
			   
			</div>


			<div class="form-group mb-3">
			   <label class="label" for="name">Phone Number</label>
			   <?php echo $form->textBox("phone",array("placeholder"=>"Contact","class"=>"form-control"));?>
			   <?php echo $validator->error("phone");
			    ?>
			   
			</div>

			<div class="form-group mb-6">
			   <label class="label" for="name">Address</label>
			   <?php echo $form->textArea("address",array("placeholder"=>"Address","class"=>"form-control"));?>
			   <?php echo $validator->error("address"); ?>
			 </div>

			 <div class="form-group mb-6">
			   <label class="label" for="name"></label>
			   <input type="submit" name="send" value="Place Order" class="btn btn-success"/>
		
			 </div>
			

			<div class="form-group mb-6">
				<h5><?php echo isset($msg)?$msg:""; ?></h5>
			</div>
		</form>
	</center>
	
</div>
</div>
</div>
<?php require_once("footer.php"); ?>