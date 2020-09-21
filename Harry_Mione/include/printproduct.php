<?php include '../include/cart_modification.php'; ?>

<!--Product super Container-->
<div class="col-lg-12 productContainer">
					
    <!--Products-->
	<div class="container-fluid">
		<div class="row">
							
        	<?php
                $product_array = $db_handle->runQuery($query);
                if (!empty($product_array)) { 
                    foreach($product_array as $key=>$value) {
            ?>
                        <div class="col-lg-3 col-sm-6">
    						<div class="container">
        						<div class="row product">
        							<div class="col-lg-12">					
        								<img class="img-fluid" style="height:250px" src="<?php echo "../productphoto/".$product_array[$key]["productID"]."_1.jpg"; ?>">
        								<h5 style="display:block;"><strong><?php echo $product_array[$key]["productBrand"]; ?></strong></h5>
        								<hr>
        								<span style="display:block;"><?php echo $product_array[$key]["productName"]; ?><br><b><?php echo "RM".$product_array[$key]["price"]; ?></b></span><br>
        								
        							</div>
                						<form class="col-lg-12 spaceRemover" method="post" action="cart.php?action=add&productID=<?php echo $product_array[$key]["productID"]; ?>">
                							<label style="margin-left:5px;">Quantity: </label>
                							<input type="text" style="text-align:center;margin-bottom:5px;" name="quantity" value="1" size="4" />            						
                    						<input type="Submit" class="addProductInput" value="Add to cart">
                    					</form>   								
        						</div> 	
    						</div>
						</div>	
			<?php
                    }
                }
            ?>
            
		</div>
	</div>					
</div>