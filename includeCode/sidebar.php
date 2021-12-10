<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            

            <?php 
                $query = "SELECT * FROM categories";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $cat_id = $row['cat_id'];
                        $cat_name = $row['cat_name'];                                        
            ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#"><?php echo $cat_name;?></a></h4>
                </div>
            </div>

            <?php
                    }//end of while
                }
            ?>

            <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Households</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Interiors</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Clothing</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Bags</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Shoes</a></h4>
                </div>
            </div> -->

        </div><!--/category-products-->
    
        <!--brands_products-->
        <!-- <div class="brands_products">
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                </ul>
            </div>
        </div> -->
        <!--/brands_products-->
        
        <!--price-range-->
        <!-- <div class="price-range">
            <h2>Price Range</h2>
            <div class="well text-center">
                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                    <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div> -->
        <!--/price-range-->
        
        <!--shipping-->
        <!-- <div class="shipping text-center">
            <img src="images/home/shipping.jpg" alt="" />
        </div> -->
        <!--/shipping-->
    
    </div>
</div>