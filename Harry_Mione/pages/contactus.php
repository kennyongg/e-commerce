<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../header/header.css" rel="stylesheet">
<link href="../css/contactus.css" rel="stylesheet">
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
</head>

<?php include '../header/header.php' ?>
<div id="mySidenav" class="sidenav">
	<a href="skincare.php">SKIN CARE</a>
   	<a href="makeup.php">MAKEUP</a>
	<a href="hair.php">HAIR</a>
	<a href="fragrance.php" style="color: #f1f1f1;">FRAGRANCE</a>
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

<!--Cover Image Container-->
<div class="col-lg-12 coverImgContainer">
	<img class="coverImg" src="cover/contactus.jpg">
</div>
<div class="contactInfo">
	<p class="hq"><strong>Harry & Mione Headquater</strong></p>
	<p class="address">916 Pine Rd. Fairburn, Pochinki, Mordovia.</p>
   	<p class="tel">+603 - 5628 3293</p>
   	<h6><strong>Drop us a message:</strong></h6>
   	<a href="mailto:contactus@hnmdb.com" style="text-decoration:none;color:black;">
   	<img class="zoom" src="../icons/mail.png" style="width:30px;height:30px"> contactus@hnmdb.com</a>
</div>

<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d37341.9388346457!2d45.8412199!3d54.200065!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41438e260442a4a5%3A0x459f233cb9aa9e76!2sPochinki%2C+Mordovia%2C+Russia%2C+431756!5e0!3m2!1sen!2smy!4v1530724555066" height="300" frameborder="0" style="border:2px solid grey" allowfullscreen></iframe>
 
<?php
include '../footer/footer.php';
?>
</html>

