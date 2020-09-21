<?php session_start(); error_reporting(0);?>
<!DOCTYPE html>
<HTML>
<HEAD>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../header/header.css" rel="stylesheet">
<link href="../css/search.css" rel="stylesheet">
<link href="../css/checkbox.css" rel="stylesheet">
<link href="../css/range_slider.css" rel="stylesheet">
<link href="../css/product.css" rel="stylesheet">
<link href="../css/radiobutton.css" rel="stylesheet">
<link href="../footer/footer.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</HEAD>
<BODY>
<?php include '../header/header.php'; ?>
    
    <div id="mySidenav" class="sidenav">
        <a href="skincare.php">SKIN CARE</a>
        <a href="makeup.php">MAKEUP</a>
        <a href="hair.php">HAIR</a>
        <a href="fragrance.php">FRAGRANCE</a>
        <a href="body.php">BODY</a>
        <br><br>
        <?php 
        if (!empty($_SESSION["user"])) {
            require '../include/dbvariables.php';
            require '../include/dbconnect.php';
            $login_name = $conn->query("SELECT * FROM account WHERE username='".$_SESSION["user"]."'");
            $userInfo = mysqli_fetch_assoc($login_name);
            echo '<a href="userpage.php"><span class="bottom">'.$userInfo['firstname']." ".$userInfo['lastname'].'</span></a>';
        } else {
            echo '<a href="login.php"><span class="bottom">LOGIN</span></a>';
            echo '<a href="signup.php"><span class="bottom">SIGNUP</span></a>';
        }
        ?>
        <a href="cart.php"><span class="bottom">MY SHOPPING BAG</span></a>
        <a href="search.php"><span class="bottom">SEARCH</span></a>
    </div>
<?php include '../include/search_handle.php'; ?>
<div class="search_form_container">
    <form method="post" action="">
       	<input class="searchbar" type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="Search Something...">
       	<button type="submit"><img style="width:50px;height:50px;" src="../icons/search.png"></button><br><br><br>
       	<h5 style="margin-left:60px;color: white;"><strong>Select a category:</strong></h5>
        <label class="filter">SKINCARE
        	<input type="radio" name="category" <?php if (isset($category) && $category=="skincare") echo "checked";?> value="skincare">
        	<span class="checkmark"></span>
        </label>
        <label class="filter">MAKEUP
        	<input type="radio" name="category" <?php if (isset($category) && $category=="makeup") echo "checked";?> value="makeup">
        	<span class="checkmark"></span>
        </label>
            <label class="filter">HAIR
        	<input type="radio" name="category" <?php if (isset($category) && $category=="hair") echo "checked";?> value="hair">
        	<span class="checkmark"></span>
        </label>
        <label class="filter">FRAGRANCE
        	<input type="radio" name="category" <?php if (isset($category) && $category=="fragrance") echo "checked";?> value="fragrance">
        	<span class="checkmark"></span>
        </label>
            <label class="filter">BODY
        	<input type="radio" name="category" <?php if (isset($category) && $category=="body") echo "checked";?> value="body">
        	<span class="checkmark"></span>
        </label><br>
		<h5 style="margin-left:60px;color: white;"><strong>Price Range: < RM<span id="demo"></span></strong></h5>
		<div class="slidecontainer">
  			<input type="range" name="range" min="0" max="1000" value="<?php echo $_SESSION['range'];?>" class="slider" id="myRange">
  			<p></p>
		</div>
		<script src="../javascript/range_slider.js"></script>
	</form>
</div>

<?php include '../include/cart_modification.php'; ?>

<!--Product super Container-->
<div class="col-lg-12 productContainer">
	<h1>Search Results:</h1>
					
    <!--Products-->
	<div class="container-fluid">
		<div class="row">
							
        	<?php
        	    $query = "SELECT * FROM Products WHERE ".$nameSearch." OR ".$brandSearch;
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
                } else {
                    echo "<h4>Unable to find product in our database. Please adjust the price range or try again.</h4>";
                }
            ?>   
		</div>
	</div>					
</div>
<?php include '../footer/footer.php'; ?>

</BODY>
</HTML>