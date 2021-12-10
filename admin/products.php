<?php require_once('includeCode/top.php');?>
<?php
$conn=new mysqli('localhost','root','','wefinalproject');
$error="";
if(isset($_POST['submit'])){
    $p_qty=$_POST['pQty'];
    $p_price=$_POST['pPrice'];
    $p_Name=$_POST['pName'];
    $p_Tax=$_POST['pTax'];
    $uploadFile=$_FILES['uploadFile']['name'];
    $tmpname=$_FILES['uploadFile']['tmp_name'];
    $folderMove="../images/shop/".$uploadFile;
    $folderSaveClient="images/shop/".$uploadFile;
    $folderSaveAdmin="../images/shop/".$uploadFile;


    move_uploaded_file($tmpname,$folderMove);
    if($p_qty!="" && $p_price!="" && $p_Tax!="" && $p_Name!="" && $folderMove!=""){
      $q="INSERT INTO products VALUES('', 
      '$p_qty','$p_price','$p_Tax','$p_Name',
      '$folderSaveClient','$folderSaveAdmin',1)";
      $conn->query($q);
      $error.="<div class=' alert alert-success'>Data Insert!!</div>";
    }else{
        $error.="<div class=' alert alert-danger'>All fields are required!!</div>";
 
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

                    <h1><span class="text-danger"><?php echo $error;?></span></h1>
                    
                    <form method="post" class="text-white" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label>Product Name</label>
                                <input type="text" name="pName" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Product Price</label>
                                <input type="text" name="pPrice" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row">


                            <div class="form-group col-md-5">
                                <label>Product Quantity</label>
                                <input type="text" name="pQty" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Product Tax</label>
                                <input type="text" name="pTax" class="form-control form-control-sm">


                            </div>
                        </div>
                        <div class="row">
                            <div class="custom-file mb-3 col-md-5 ">

                                <label>Product Image</label>

                                <input type="file" name="uploadFile" id="customFile" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose File</label>
                            </div>
                        </div>
                        <div class="row m-5">
                            <button type="submit" name="submit" class="btn btn-primary  shadow">Add Item </button>

                        </div>




                    </form>


                
</div>
            
            <script>
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            </script>


            <?php require_once('includeCode/footer.php');?>