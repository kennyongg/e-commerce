<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../header/header.css" rel="stylesheet">
<link href="../css/userpage.css" rel="stylesheet">
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
<body>

<?php include '../header/header.php' ?>
<div id="mySidenav" class="sidenav">
	<a href="skincare.php">SKIN CARE</a>
   	<a href="makeup.php">MAKEUP</a>
	<a href="hair.php"  style="color: #f1f1f1;">HAIR</a>
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

<div class="account_info">
<?php
if (!empty($_SESSION["user"])) {
?>
    	<div class="account_info_container">
    		<img src="../icons/user.png" style="width:200px;height:200px;" class="zoom">
    		<h1>WELCOME</h1>
    		<hr>
    		<?php echo "<h2>".$userInfo['firstname']." ".$userInfo['lastname']."</h2><br>"; ?>
        	<p><strong>USERNAME: </strong></p>
        	<p><?php echo $userInfo['username']; ?></p>
        	<p><strong>EMAIL: </strong></p>
        	<p><?php echo $userInfo['email']; ?></p>
        	<p><strong>ADDRESS: </strong></p>
        	<p><?php echo $userInfo['address']; ?></p><br>
    		<a href="../include/signout.php" class="signout" style="text-decoration:none;">SIGN OUT</a>
    		<br><br>
    		<h6>NOTE* By signing out you will lose all the data during this login session including shopping bag informations</h6>
    	</div>
<?php
} else {
?>
		<div class="account_info_container">
    		<a href="login.php"><img src="../icons/user.png" style="width:200px;height:200px;" class="zoom"></a>
    		<h1>YOU ARE NOT LOGGED IN</h1>
    		<hr>
    		<h4>CLICK THE ICON TO LOGIN NOW</h4>
    	</div>
<?php
}
?>
</div>
					
<?php include '../footer/footer.php';?>

</body>
</html>