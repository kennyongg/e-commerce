<!DOCTYPE HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../header/header.css" rel="stylesheet">
<link href="../css/cart.css" rel="stylesheet" />
<link href="../css/product.css" rel="stylesheet">
<link href="../footer/footer.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style>
    body {
      margin: 0;
      padding: 125px 0 0 0;
    }
</style>
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
<?php include '../include/cart_modification.php'; ?>
<div id="shopping-cart">
<div class="txt-heading">My Shopping Bag<a id="btnEmpty" href="cart.php?action=empty"><img class="zoom" style="width: 30px;height:30px;" src="../icons/bin.png"></a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Brand</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["productID"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["productName"]; ?></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["productBrand"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "RM".$item["price"]*$item["quantity"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;background-color:#D60202;"><a href="cart.php?action=remove&productID=<?php echo $item["productID"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "RM".$item_total; ?></td>
<td style="text-align:center;border-bottom:#F0F0F0 1px solid;background-color:#05B928;"><a href="checkout.php" class="btnCheckOutAction">Check Out</a></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>
<?php 
include '../footer/footer.php';
?>
</BODY>
</HTML>