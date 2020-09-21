<?php session_start(); error_reporting(0);?>
<html>
<head>

<link href="../css/submit_button.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@import url('https://fonts.googleapis.com/css?family=Cormorant+Unicase|Raleway');

.error {color:#FF0000;}

body {
    background-color: #DDFEFF;
}

/* Style the container for inputs */
.hnm_container {
    background-color: white;
    border: 1px solid grey;
    border-radius: 8px;
    padding: 2em;
    margin-left: 30%;
    margin-right: 30%;
    margin-top: 5%;
    margin-bottom: 5%;
}

.hnm_container a {
    font-size: 40px;
    text-align:center;
    text-decoration:none;
    color:black;
    font-family:'Cormorant Unicase', serif;
}

.hnm_container a:hover {
    font-size: 42px;
}

.center {
    text-align: center;
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #000000;
    margin-bottom: 25px;
}

/* Style all input fields */
input {
    width: 100%;
    padding: 12px;
    border: none;
    border-bottom: 2px solid #4A4A4A;
    box-sizing: border-box;
    margin-top: 8px;
    margin-bottom: 10px;
    background-color: white;
}

.footer {
     background-color: #000;
     text-align: center;
}
</style>
</head>
<body>
<?php
/* Log In Page */
include '../include/login_validation.php';
?>
<div class="hnm_container">
  	<a href="index.php">Harry & Mione</a>
  	<hr>
	<form method="post" action="">
    	<label for="userID">Username</label>
    	<input type="text" name="userID" value="<?php echo $userID;?>" placeholder="Username or Email" required>
    	<span class="error"><?php echo $_SESSION['userIDErr'];?></span>
    	<br><br>
    	<label for="psw">Password</label>
    	<input type="password" name="psw" value="<?php echo $password;?>" placeholder="Password" required>
    	<span class="error"><?php echo $_SESSION['passwordErr'];?></span>
    	<br><br>
    	<button class="submit" type="submit"><span>Log In</span></button>
	</form>
	<div class="center">
		<p>Don't have an account?<a href="signup.php" style="text-decoration: none;margin-left: 8px;">Sign Up</a></p>
	</div>
</div>



<?php 
unset($_SESSION['userIDErr']);
unset($_SESSION['passwordErr']);

if ($loginStatus === TRUE) {
    $_SESSION['user'] = $userID;
    echo '<script>window.location="index.php"</script>';
}
?>
</body>
</html>