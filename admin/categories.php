<?php require_once('includeCode/top.php');
if(isset($_GET['del']) and isset($_SESSION['email'])){
    $del_id = $_GET['del'];

    $del_query = "DELETE FROM `categories` WHERE `cat_id` = $del_id";
    if(mysqli_query($conn, $del_query)){
        $success = "Category has been Deleted"; 
    }
    else{
        $error = "Category has not been Deleted";
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
                    <h1><i class="fa fa-folder-open"></i> Categories <small>Different Categories</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-folder-open"></i> Categories</li>
                    </ol>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <form action="includeCode/process.php" method="POST">
                                <div class="form-group">
                                    <label for="category">Category Name:*</label>
                                    <?php 
                                        if(isset($_GET['error'])){
                                            echo "<span class='pull-right' style='color:red;'>".$_GET['error']."</span>";
                                        }
                                        else if(isset($_GET['success'])){
                                            echo "<span class='pull-right' style='color:green;'>".$_GET['success']."</span>";
                                        }
                                        else{
                                            echo "<span class='pull-right' style='color:black;'>All (*) fields are required</span>";
                                        }
                                    
                                    ?>
                                    <input type="text" placeholder="Category Name" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Add Category" name="add-category" class="btn btn-primary">
                            </form>

                            <br><br>
                            <?php
                            if(isset($_GET['edit'])){
                                $edit_id = $_GET['edit'];
                                $get_cat_id = "SELECT * FROM categories where cat_id = $edit_id";
                                $result_edit_id = mysqli_query($conn, $get_cat_id);
                                if(mysqli_num_rows($result_edit_id) > 0){

                                    $row_edit_id = mysqli_fetch_array($result_edit_id);
                            ?>
                            <form action="includeCode/process.php?update_category=<?php echo $edit_id;?>" method="POST">
                                <div class="form-group">
                                    <label for="category">Update Category Name:*</label>
                                    <?php 
                                        if(isset($_GET['uperror'])){
                                            echo "<span class='pull-right' style='color:red;'>".$_GET['uperror']."</span>";
                                        }
                                        else if(isset($_GET['upsuccess'])){
                                            echo "<span class='pull-right' style='color:green;'>".$_GET['upsuccess']."</span>";
                                        }
                                        else{
                                            echo "<span class='pull-right' style='color:black;'>All (*) fields are required</span>";
                                        }
                                    
                                    ?>
                                    <input type="text" placeholder="Update Category Name" class="form-control" name="upd-cat-name" value="<?php echo $row_edit_id['cat_name'];?>">
                                </div>
                                <input type="submit" value="Update Category" name="update-category" class="btn btn-primary">
                            </form>
                            <?php 
                                }
                            }
                        ?>
                        </div>
                        <div class="col-md-6">
                            <center>
                                <h2>Categories List</h2>
                                <?php 
                                    if(isset($error)){
                                        echo "<span style='color:red;'>$error</span>";
                                    }else if(isset($success)){
                                        echo "<span style='color:green;'>$success</span>";
                                    }else{
                                        echo "";
                                    }
                                    
                                ?>
                            </center>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $query = "SELECT * FROM categories ORDER BY cat_id desc";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $cat_id = $row['cat_id'];
                                            $cat_name = $row['cat_name'];

                                        
                                ?>
                                    <tr>
                                        <td><?php echo $cat_id;?></td>
                                        <td><?php echo ucwords($cat_name);?></td>
                                        <td><a href="categories.php?edit=<?php echo $cat_id;?>"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="categories.php?del=<?php echo $cat_id;?>"><i class="fa fa-times"></i></a></td>
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
            </div>
        </div>

        <?php require_once('includeCode/footer.php');?>
