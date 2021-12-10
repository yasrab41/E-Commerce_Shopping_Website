<?php 
require_once('includeCode/top.php');

if(isset($_GET['del']) and isset($_SESSION['email'])){
    $del_id = $_GET['del'];

    $del_query = "DELETE FROM `customer_registration` WHERE `cust_id` = $del_id";
    if(mysqli_query($conn, $del_query)){
        $success = "User has been Deleted"; 
    }
    else{
        $error = "User has not been Deleted";
    }
}



?>

  </head>
  <body>
    <div id="wrapper">
    <?php require_once('includeCode/header.php');?>


        <div class="container-fluid body-section">
            <div class="row">
            <?php require_once('includeCode/sidebar.php');?>

                <div class="col-md-9">
                    <h1><i class="fa fa-users"></i> Users <small>View All Users</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-users"></i> Users</li>
                    </ol>
                    
                    <div class="row">
                        <div class="col-sm-8">
                            <form action="">
                                <div class="row">
                                    <!-- <div class="col-xs-4">
                                        <div class="form-group">
                                            <select name="" id="" class="form-control">
                                                <option value="delete">Delete</option>
                                                <option value="author">Change to Author</option>
                                                <option value="admin">Change to Admin</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-xs-4">
                                        <!-- <input type="submit" class="btn btn-success" value="Apply"> -->
                                        <!-- <a href="#" class="btn btn-primary">Add New</a> -->
                                        <h3>Delete User</h3>
                                    </div>
                                    <div class="col-xs-4">
                                    <?php 
                                    if(isset($error)){
                                        echo "<span style='color:red;'>$error</span>";
                                    }else if(isset($success)){
                                        echo "<span class='alert alert-success'>$success</span>";
                                    }else{
                                        echo "";
                                    }
                                    
                                ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                               <!-- <th><input type="checkbox"></th> -->
                                <th>Sr #</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Date and Time</th>
                                <!-- <th>Image</th> -->
                                <!-- <th>Role</th> -->
                                <!-- <th>Posts</th> -->
                                <!-- <th>Edit</th> -->
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $query = "SELECT * FROM customer_registration ORDER BY cust_id desc";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    $cust_id = $row['cust_id'];
                                    $cust_name = $row['cust_name'];
                                    $cust_pass = $row['cust_password'];                                                                    
                                    $cust_email = $row['cust_email'];                                  
                                    $cust_reg_date = $row['cust_register_date'];                                  
                        ?>
                            <tr>
                               <!-- <td><input type="checkbox"></td> -->
                                <td><?php echo $cust_id?></td>
                                <td><?php echo $cust_name?></td>
                                <td><?php echo $cust_pass?></td>
                                <td><?php echo $cust_email?></td>
                                <td><?php echo $cust_reg_date?></td>
                            
                                <!-- <td><a href="#"><i class="fa fa-pencil"></i></a></td> -->
                                <!-- <td><a href="#"><i class="fa fa-times"></i></a></td> -->
                                <td><a href="users.php?del=<?php echo $cust_id;?>"><i class="fa fa-times"></i></a></td>

                            </tr>

                            <?php
                                        }//end of while
                                 }else{
                                    echo "No Category Found";
                                }
                                ?>


                                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php require_once('includeCode/footer.php');?>
