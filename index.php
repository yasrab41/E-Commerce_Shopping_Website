<?php require_once('includeCode/db.php');?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<!-- <link href="css/main.css" rel="stylesheet" type="text/css"> -->
	<link href="css/mainStyle.css" rel="stylesheet" type="text/css">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <link rel="stylesheet" href="css/styleForm.css" type="text/css">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
        <div class="col-sm-6">
						<h4 style="color:white; padding-top:5px;">
				
							<?php
							if(!isset($_SESSION['email'])){
								echo "Welcome Guest!";
							}else{
								echo "Welcome: " .$_SESSION['email'] . "";
							}
							?>

						</h4>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo2.png" alt="" width="165px"/></a>
						</div>
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav justify-content-end">
								
								<!-- <li class="nav-item"><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
								<li class="nav-item"><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li>
									<?php
									if(!isset($_SESSION['email'])){
										echo "<a href='login.php'><i class='fa fa-lock'></i> Login</a>";
									}
									else{
										echo "<a href='checkout.php'><i class='fa fa-crosshairs'></i> Checkout</a></li>";
										echo "<li><a href='logout.php'><i class='fa fa-power-off'></i> Logout</a>";
									}
								    ?>
								</li>
							</ul>

              

						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Products</a></li>
										<!-- <li><a href="product-details.php">Product Details</a></li>  -->
										<!-- <li><a href="checkout.php">Checkout</a></li>  -->
										<li><a href="cart.php">Cart</a></li> 
										<li><a href="login.php">Login</a></li> 
                                    </ul>
                                </li> 
								<!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>  -->
								<!-- <li><a href="404.html">404</a></li> -->
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->



<!-- <div class="container-fluid p-5 text-center">
  <h5>Welcome, have a great shopping!</h5>
  <div class="card bg-secondary text-white"style="margin-top: 10px;">
    <div class="card-body">“Cinderella is proof that a new pair of shoes can change your life.”</div>
  </div>
</div> -->



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100"  style="background-image: url('https://cdn.shopify.com/s/files/1/2290/7887/files/1920_x_750_Tees_W_8df2c679-d490-4d3e-99c0-00de53f16aa0.jpg?v=1615958742');height: 700px; " alt="">
<div class="carousel-caption d-none d-md-block">
    <h5>"Launched new Summer Collections, Shop now."</h5>
  </div>
</div>
    <div class="carousel-item">
         <img class="d-block w-100"  style="background-image: url('https://www.alkaramstudio.com/media/homepageslider/homepageslider/sliderrevised-26.jpg');height: 650px;  " alt="">

<div class="carousel-caption d-none d-md-block">
    <h5>"Launched new Summer Collections, Shop now."</h5>
  </div>
  </div>

    <div class="carousel-item">
         <img class="d-block w-100"  style="background-image: url('https://www.melon.pk/public/uploads/products/photos/oKjLUCmKFE2ZPe7BWlCXYY3ym6xM0nDJdBfrDDH6.jpeg');height: 650px; " alt="">
 <div class="carousel-caption d-none d-md-block">
    <h5>"Launched new Summer Collections, Shop now."</h5>
  </div>
  </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




<!-- <div class="container-fluid p-5 text-center">
  <h3>Important COVID-19 notice</h3>
  <div class="card bg-danger text-white"style="margin-top: 10px;">
    <div class="card-body">“Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to 
      more severe diseases such as Syndrome (MERS-CoV) and (SARS-CoV) Wear Masks and Stay Safe.”
      — Aaron Siskind</div>
  </div>
</div> -->




  <div class="container-fluid text-center">
  
    

    <br>
    <div class="card bg-dark text-white">
      <div class="card-body"><a href="shop.php">Women Pret Collection!</a></div>
    <div
      class="p-5 text-center bg-image"
      style="background-image: url('https://www.beechtree.pk/media/bannerslider/s/j/xsjabjkasbcjlabckjbcjd.jpg.pagespeed.ic.Q5_H6-4Seg.webp'); height: 700px;">
    </div>

    <br>
    <div class="card bg-dark text-white">
      <div class="card-body"><a href="shop.php">Summer Shirts and Tops Collection!</a></div>
    <div
      class="p-5 text-center bg-image"
      style="background-image: url('https://cdn.shopify.com/s/files/1/2290/7917/files/banner_1920_1080_copy_f892fd08-33b2-4730-8ed2-486df3828e4b.jpg?v=1616741897'); height: 700px;">
    
    </div>

    <br>
    <div class="card bg-dark text-white">
      <div class="card-body"><a href="shop.php">Summer Shirts and Tops Collection!</a></div>
    <div
      class="p-5 text-center bg-image"
      style="background-image: url('https://cdn.shopify.com/s/files/1/2290/7917/files/banner_1920_1080_copy_1278d301-fcc2-44fe-941d-611c3e2a7a36.jpg?v=1615531851'); height: 700px;">
    
    </div>


    <br>
    <div class="card bg-dark text-white">
      <div class="card-body"><a href="shop.php">Women Earing Collection!</a></div>
    <div
      class="p-5 text-center bg-image"
      style="background-image: url('https://merishop.pk/wp-content/uploads/2020/12/15651607982870606985.jpg'); height: 700px;">
    
    </div>
  
  <br>
    <div class="card bg-dark text-white">
      <div class="card-body"><a href="shop.php">Summer Maxi Dress Collection!</a></div>
    <div
      class="p-5 text-center bg-image"
      style="background-image: url('https://merishop.pk/wp-content/uploads/2021/03/1599546139ef87d45092460680add0c0f46690fedc.jpg'); height: 700px;"
    >
    </div>
  
  
  <br>
    <div class="card bg-dark text-white">
      <div class="card-body"><a href="shop.php">Summer Women Trouser Collection!</a></div>
    <div
      class="p-5 text-center bg-image"
      style="background-image: url('https://cdn.shopify.com/s/files/1/2290/7917/files/category-banner-copy.jpg?v=1597908567'); height: 700px;"
    >
    </div>
  
  
  
  </div>
  <?php require_once('includeCode/footer.php');?>


</body>
</html>
