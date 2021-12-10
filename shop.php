<?php 

//index.php

$connect = new PDO("mysql:host=localhost;dbname=wefinalproject", "root", "");
$message = '';

if(isset($_POST["add_to_cart"]))
{
	if(isset($_COOKIE["shopping_cart"]))
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);

		$cart_data = json_decode($cookie_data, true);
	}
	else
	{
		$cart_data = array();
	}

	$item_id_list = array_column($cart_data, 'item_id');

	if(in_array($_POST["hidden_id"], $item_id_list))
	{
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
			{
				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
			}
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_POST["hidden_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$cart_data[] = $item_array;
	}

	
	$item_data = json_encode($cart_data);
	setcookie('shopping_cart', $item_data, time() + (86400 * 30));
	header("location:cart.php?success=1");
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['item_id'] == $_GET["id"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				header("location:cart.php?remove=1");
			}
		}
	}
	if($_GET["action"] == "clear")
	{
		setcookie("shopping_cart", "", time() - 3600);
		header("location:cart.php?clearall=1");
	}
}

if(isset($_GET["success"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}

if(isset($_GET["remove"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if(isset($_GET["clearall"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Your Shopping Cart has been clear...
	</div>
	';
}


?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once("includeCode/top.php");?>

    <title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <?php require_once("includeCode/header.php");?>


    <!-- <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt="" />
        </div>
    </section> -->




    <section>
        <div class="container">
            <div class="row">
                <?php require_once("includeCode/sidebar.php");?>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">SHOP</h2>






                        <br />
                        <div class="container">

                            <?php
			$query = "SELECT * FROM products ORDER BY id ASC";
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			foreach($result as $row)
			{
			?>

                            <div class="col-md-3">

                                <form method="post" style="margin-bottom:10px;">
                                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;"
                                        align="center">
                                        <img src="images/<?php echo $row["imageAdmin"]; ?>"
                                            class="img-responsive" /><br />

                                        <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                                        <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

                                        <input type="text" name="quantity" value="1" class="form-control" />
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                                        <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
                                        <input type="submit" name="add_to_cart" style="margin-top:5px;"
                                            class="btn btn-success" value="Add to Cart" />
                                    </div>
                                </form>



                            </div>
                            <?php
			}
			?>


                        </div>
                        <!-- <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul> -->
                    </div>




    </section>



    <?php require_once("includeCode/footer.php");?>



    <br />

</body>

</html>