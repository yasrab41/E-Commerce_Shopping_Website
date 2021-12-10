<?php
require_once('db.php');
session_start();

if(!isset($_SESSION['email'])){
  header('location: ../login.php');
}

//////////////////ADD CATEGORIES///////////////
if(isset($_POST['add-category'])){
    $cat_name = $_POST['cat-name'];

    if(empty($cat_name)){
        header('location: ../categories.php?error=Category Name Required');
    }
    else{
        $query = "INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name');";
        
        if(mysqli_query($conn, $query)){
            header('location: ../categories.php?success=Category Has Been Added');
        }
        else{
            header('location: ../categories.php?error=This-Category Already Exist');
        }
    }
}

//////////////////UPDATE CATEGORIES///////////////
if(isset($_POST['update-category'])){
    $edit_id = $_GET['update_category'];
    $upd_cat_name = $_POST['upd-cat-name'];

    if(empty($upd_cat_name)){
        header("location: ../categories.php?uperror=Category Name Required&edit=$edit_id");
    }
    else{
        $query = "UPDATE `categories` SET `cat_name` = '$upd_cat_name' WHERE `cat_id` = $edit_id";
        
        if(mysqli_query($conn, $query)){
            header("location: ../categories.php?upsuccess=Category Has Been Updated&edit=$edit_id");
        }
        else{
            header("location: ../categories.php?uperror=This-Category Already Exist&edit=$edit_id");
        }
    }
}
?>