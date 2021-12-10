<?php
 session_start();
 require_once('includeCode/db.php');

      $message = "";

      if(isset($_POST['login'])){
          //$c_name = $_POST['name'];
          $c_email_id = $_POST['email'];
          $c_password = $_POST['password'];
          $queryAll =  "SELECT * FROM customer_registration where cust_email = '$c_email_id'";
          $result_check = mysqli_query($conn, $queryAll);
		  $email_check = mysqli_num_rows($result_check);

		  if($email_check>0){	
			$_SESSION['username'] = $c_name;
			$_SESSION['email'] = $c_email_id;	
            header('location: index.php');
		  }else{
			//$query = "INSERT INTO customer_registration VALUES ('','$c_name','$c_email_id','$c_password',CURRENT_TIME())";
			$query = "INSERT INTO `customer_registration` (`cust_id`, `cust_name`, `cust_email`, `cust_password`, `cust_register_date`) VALUES ('', '$c_name', '$c_email_id', '$c_password', current_timestamp())";
			$result = mysqli_query($conn, $query);
			if($result){
				$_SESSION['username'] = $c_name;
				$_SESSION['email'] = $c_email_id;
				$message .= "<div class='alert alert-success'>Thank You For Registration.. <span> Please Check You Email</span></div>";
				//                // echo $message;
				header('Refresh: 5');
				//header('location: login.php');
			}else{
				$_SESSION['username'] = $c_name;
				$_SESSION['email'] = $c_email_id;
				?>
					<script>alert("No Connection");</script>
				<?php

			}
		
			}


		  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Sign up Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/signupform.css">

</head>
<body>

<div class="container w-50 mt-5 mb-3"><?php echo $message?></div>
<div class="signup-form mt-5">
    <form method="post">
		<h2>Login</h2>
		<hr>
      
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div>
	
		<div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-lg"><i class="fa fa-sign-in"></i> Login</button>
        </div>
    </form>
	<div class="text-center">Create an account? <a href="signup.php">Sign Up here</a></div>
</div>
</body>
</html>