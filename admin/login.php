<!-- INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, 'yasrab', 'admin@wefinalproject.com', '$2y$10$addtwentytwowordencryejciodJaxJP1/STqKNqhTFgtHb05dfu2'); -->

<?php 
require_once('includeCode/db.php');

if(isset($_POST['login'])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  //Restrictions for hackers
  $email = htmlentities($email);
  $password = htmlentities($password);

  $check_query = "SELECT * FROM users WHERE email = '$email'";
  $check_result = mysqli_query($conn, $check_query);

  if(mysqli_num_rows($check_result) > 0){
    $row = mysqli_fetch_array($check_result);
    $db_email = $row['email'];
    $db_password = $row['password'];

    $new_password = crypt($password, $db_password);

    if($email == $db_email && $new_password == $db_password){
      session_start();
      $_SESSION['email'] = $db_email;
      header('location: index.php');
    }else{
      $error = "Incorrect Email and Password";
    }
  }
  else{
    $error = "Incorrect Email and Password";
  }
  //echo $error;
}


$salt = '$2y$10$addtwentytwowordencryt';
$my_pass = "17sw2941101";
$password = crypt($my_pass,$salt);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Login | Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin animated shake" method="POST">
        <h2 class="form-signin-heading">Admin Login</h2>
        <center>
          <?php 
            if(isset($error)){
              echo "<span style='color:red;'>$error</span>";
            }
          ?>
          <br>
        </center>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
