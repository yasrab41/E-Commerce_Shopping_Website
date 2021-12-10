



<?php require_once("includeCode/top.php");?>
<!-- <script>
$(document).ready(function(){
$("#success").click(function (e) {
  e.preventDefault()
  $("#message").html("Hiii");
//   $('#message').html("<div class='alert alert-success fade in'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button>Congratulations! Your Order has been placed successfully!</div>");
  console.log('working');
});

});
</script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head><!--/head-->

<body>
<?php require_once("includeCode/header.php");?>


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

        <?php
		if(!isset($_SESSION['email'])){
			include('login.php');
		}else{
		?>
	

		<div class="table-responsive">
				
				<div align="Center">
					<div class="p-3 mb-2 bg-primary text-white">Your Cart is Ready!</div>
			</div>
				<table class="table  table-condensed table-bordered">
					<tr>
						<th width="30%">Item Name</th>
						<th width="25%">Quantity</th>
						<th width="25%">Price</th>
						<th width="30%">Total</th>
			
					</tr>
				<?php
				if(isset($_COOKIE["shopping_cart"]))
				{
					$total = 0;
					$cookie_data = stripslashes($_COOKIE['shopping_cart']);
					$cart_data = json_decode($cookie_data, true);
					foreach($cart_data as $keys => $values)
					{
				?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
				</tr>
				<?php	
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
				?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
				<?php
				}
				else
				{
					echo '
					<tr>
						<td colspan="5" align="center">No Item in Cart</td>
					</tr>
					';
				}
				?>
				</table>
				






				<div class="shopper-informations">
					<div class="row">
						
						<div class="col-sm-5 clearfix">
							<div class="bill-to">
								<p>Bill To</p>
								<div class="form-one">
									<form>
										<input type="text" placeholder="Company Name">
										<input type="text" placeholder="Email*">
										<input type="text" placeholder="Title">
										<input type="text" placeholder="First Name *">
										<input type="text" placeholder="Middle Name">
										<input type="text" placeholder="Last Name *">
										<input type="text" placeholder="Address 1 *">
									</form>
								</div>
								<div class="form-two">
									<form>
										<input type="text" placeholder="Zip / Postal Code *">
										<select>
											<option>-- Country --</option>
											<option>United States</option>
											<option>Bangladesh</option>
											<option>UK</option>
											<option>India</option>
											<option>Pakistan</option>
											<option>Ucrane</option>
											<option>Canada</option>
											<option>Dubai</option>
										</select>
										<select>
											<option>-- State / Province / Region --</option>
											<option>United States</option>
											<option>Bangladesh</option>
											<option>UK</option>
											<option>India</option>
											<option>Pakistan</option>
											<option>Ucrane</option>
											<option>Canada</option>
											<option>Dubai</option>
										</select>
										
										<input type="text" placeholder="Phone *">
										<input type="text" placeholder="Mobile Phone">
										<input type="text" placeholder="Fax">
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="order-message">
								<p>Shipping Order</p>
								<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
								<label><input type="checkbox"> Shipping to bill address</label>
							</div>	
						</div>					
					</div>
				</div>
				<div class="reconsider">
					<h4>Place Your Order By Clicking Submit button</h4>
				</div>

				
				
				<p>
					<form method="post">
						<button type="button" class="btn btn-success" id="success">Submit</button>

					</form>
     		    </p>
               <div id="message"></div>
			
			
			
		</div>
	
	     <?php 
		}
		 ?>
	</section>
	
	<!--/#cart_items-->

	

	<?php require_once("includeCode/footer.php");?>

</body>
</html>