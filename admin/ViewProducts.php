<?php 
$conn=new mysqli('localhost','root','','wefinalproject');
$message="";
if(isset($_GET['action']) && $_GET['action']=='delete' && isset($_GET['id']) && !empty($_GET['id'])){
    $query="DELETE FROM products WHERE id='".$_GET['id']."'";
    $conn->query($query);
   // header("Refresh:1");
    
}
if(isset($_GET['action']) && $_GET['action']=='active' && isset($_GET['id']) && !empty($_GET['id'])){
    $query="UPDATE products SET status = 0 WHERE id = ".$_GET['id']."";
    $conn->query($query);
  //  header("Refresh:1");
    
}
if(isset($_GET['action']) && $_GET['action']=='deactive' && isset($_GET['id']) && !empty($_GET['id'])){
    $query="UPDATE products SET status = 1 WHERE id = ".$_GET['id']."";
    $conn->query($query);
 //   header("Refresh:1");
    
}


if(isset($_POST['submit']) && isset($_POST['id'])){
    $name=$_POST['pName'];
    $qty=$_POST['qty'];
   $price =$_POST['Price'];
   $tax =$_POST['tax'];
   $query="UPDATE products SET name = '".$name."',qty = '".$qty."',
   price = '".$price."',tax = '".$tax."' WHERE ID = '".$_POST['id']."'";
   $query=$conn->query($query);
   if($query){
       $message="<div class='alert alert-success'>Updated Successfully!!</div>";
       header("Refresh:1");
   }else{
    $message="<div class='alert alert-success'>Updated Failed!!</div>";

   }

}

require_once("includeCode/top.php");?>

<style>
.add {
    display: none;
}
</style>

</head>
<!--/head-->

<body>
    <?php require_once("includeCode/header.php");?>

    <section id="cart_items">
        <div class="container">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="container mt-5">
                <h6><?php echo $message;?></h6>
                <div class="row">
                    <table class="table table-striped  table-condensed table-responsive table-hover text-center mt-1">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Id</td>
                                <th>Name</th>
                                <th>Quantity</th>
                                <!-- <th>GST</th> -->
                                <th>Price</th>

                                <th>Tax</th>

                                <th class="text-center">Action</th>
                                <th colspan="3">Status</th>

                            </tr>
                        </thead>
                        <?php
                $query="SELECT * FROM products";
                $result=$conn->query($query);
            if($result->num_rows>0){
                while($row= $result->fetch_assoc()){
                    $id=$row['id'];

                    $name=$row['name'];
                    $qty=$row['qty'];
                    $tax=$row['tax'];
                    $price=$row['price'];
                    $image=$row['imageAdmin'];
                    // $gst=$row['gst'];

                
                
                
                
                ?>
                        <tbody>
                            <tr>
                                <form method="post" class="text-white" enctype="multipart/form-data">
                                    <td>

                                        <img src="<?php echo $image ?>" style="width:100px;"
                                            class="form-control form-control-sm">
                                    </td>
                                    <td>

                                        <input type="text" name="id" class="form-control form-control-sm" disabled
                                            value="<?php echo $id ?>">
                                    </td>
                                    <td>

                                        <input type="text" name="pName" class="form-control form-control-sm"
                                            value="<?php echo $name ?>" disabled>
                                    </td>
                                    <td>

                                        <input type="text" name="qty" class="form-control form-control-sm"
                                            value="<?php echo $qty ?>" disabled>
                                    </td>

                                    <!-- 
                                    <td>

                                        <input type="text" name="gst" class="form-control form-control-sm" value="<?php echo $gst
                             ?>"> -->
                                    </td>
                                    <td>
                                        <input type="text" name="Price" class="form-control form-control-sm"
                                            value="<?php echo $price ?>" disabled>
                                    </td>




                                    <td>


                                        <input type="text" name="tax" class="form-control form-control-sm"
                                            value="<?php echo $tax ?>" disabled>
                                    </td>


                                    <td>
                                        <div class="btn-group">

                                            <button type="submit" name="submit" class="add" title="save"
                                                data-toggle="tooltip" style="background-color:#003153
                        "><a href="id=<?php echo $id; ?>"><i class="fa fa-save"></i></a></button>

                                </form>


                                <a class="edit" title="Edit" data-toggle="tooltip">
                                    <i class=" text-warning fa fa-edit"></i>
                                </a>
                                <a href="?action=delete&id=<?php echo $id; ?>" title="Delete" data-toggle="tooltip"
                                    onclick="return confirm('Are you sure you want to delete this data')">
                                    <i class="text-danger  fa fa-trash"></i></a>


                </div>
                </td>
                <?php  if($row['status']==0){?>
                    <td><a href="?action=deactive&id=<?php echo $id;?>"
                    class="text-danger" title="Click to Active" 
                    data-toggle="tooltip"><i class='fa'>&#xf0ab;</i></a></td>
                    <?php }else{?>
                        <td><a href="?action=active&id=<?php echo $id;?>"
                    class="text-success" title="Click to deactivate" 
                    data-toggle="tooltip"><i class='fa'>&#xf0aa;</i></a></td> 
                    <?php }?>
                    
                </tr>

                </tbody>
                <?php }} ?>
                </table>
            </div>
        </div>
    </section>


    <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $(document).on("click", ".edit", function() {
            var input = $(this).parents("tr").find(
                "input[type='text']");
            input.each(function() {
                $(this).removeAttr('disabled');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
        });



    });
    </script>
    <!--/#cart_items-->
    <?php require_once("includeCode/footer.php");?>