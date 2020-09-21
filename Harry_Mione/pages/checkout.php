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
<div class="txt-heading">Checkout Confirmation</div>
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
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "RM".$item_total; ?></td>
</tr>
<tr>
        <?php 
        if (!empty($_SESSION["user"])) {
            echo '<td colspan="5" align=left>
                  <h3 class="txt-heading"><strong>Account Information</strong></h3>
                  <strong>User: </strong><br>'.$userInfo['firstname'].' '.$userInfo['lastname'].'<br>
                  <strong>Email: </strong><br>'.$userInfo['email'].'<br>
                  <strong>Shipping Address: </strong><br>'.$userInfo['address'].'<br>
                  </td>';
            echo '</tr><tr>';
            echo '
                  <td colspan="5" align=center style="background-color:#1B80D6;">
                  <strong><a href="mailto:order@hmmdb.com?&subject=Product%20Order&body=".$_SESSION["cart_item"]." style="text-decoration:none;color:white;">Confirm Purchase</a></strong></td></tr>
                 ';
        } else {
            echo '<td colspan="5" align=center style="background-color:#05B928;">
                  <strong><a href="login.php" style="text-decoration:none;color:white;">Login to checkout</a></strong></td>';
            echo '</tr>';
        }
        ?>

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