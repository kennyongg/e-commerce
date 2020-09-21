<?php session_start(); error_reporting(0);?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/custom_radiobutton_blue.css">
<link rel="stylesheet" href="../css/password_requirements_messagebox.css">
<link rel="stylesheet" href="../css/submit_button.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Cormorant+Unicase|Raleway');

.error {color:#FF0000;}

body {
    background-color: #DDFEFF;
}

/* Style the container for inputs */
.form_container {
    background-color: white;
    border: 2px solid #000000;
    border-radius: 4px;
    padding: 2em;
    margin-left: 20%;
    margin-right: 20%;
    margin-top: 5%;
    margin-bottom: 5%;
}

.hnm_container h1 {
    font-size: 40px;
}

.center {
    text-align: center;
}

.center a {
    text-decoration: none;
    margin-left: 8px;
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
}

</style>
</head>
<body>
<?php include '../include/signup_validation.php';?>
<div class="form_container">
  <h1 style="text-align:center;font-family:'Cormorant Unicase', serif;"><a href="index.php" style="text-decoration:none;color:black;">Harry & Mione</a></h1>
  <hr>
  <h3 style="text-align:center;">Sign up to show now!</h3>
  <form method="post" action="">
  	<label for="full_name">First Name</label>
    <input type="text" name="firstname" value="<?php echo $firstname;?>" placeholder="First Name">
    <span class="error"><?php echo $_SESSION['firstnameErr'];?></span>
    <br><br>
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" value="<?php echo $lastname;?>" placeholder="Last Name">
    <span class="error"><?php echo $_SESSION['lastnameErr'];?></span>
    <br><br>
    <label for="email">Email Address</label>
    <input type="text" name="email" value="<?php echo $email;?>" placeholder="Email">
    <span class="error"><?php echo $_SESSION['emailErr'];?></span>
    <br><br>
    <label for="username">Username</label>
    <input type="text" name="username" value="<?php echo $username;?>" placeholder="Username">
    <span class="error"><?php echo $_SESSION['usernameErr'];?></span>
    <br><br>
    <label for="psw">Password</label>
    <input type="password" id="psw" name="psw" value="<?php echo $password;?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required>
    <div id="message">
      <h4>Password must contain the following:</h4>
      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
      <p id="number" class="invalid">A <b>number</b></p>
      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
    <br><br>
    <label for="confirm_psw">Confirm Password</label>
    <input type="password" name="confirm_psw" value="<?php echo $confirm_psw;?>" placeholder="Confirm Password">
    <span class="error"><?php echo $_SESSION['confirm_pswErr'];?></span>
    <br><br>
    <label>Gender:</label><br><br>
    <label class="button">Male
    	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="M">
    	<span class="checkmark"></span>
    </label>
    <label class="button">Female
    	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="F">
    	<span class="checkmark"></span>
    </label>
    <span class="error"><?php echo $_SESSION['genderErr'];?></span>
    <h2 style="text-align:center;">Address</h2>
    <hr>
    <input type="text" name="street" value="<?php echo $street;?>" placeholder="Street">
    <span class="error"><?php echo $_SESSION['streetErr'];?></span>
    <input type="text" name="town" value="<?php echo $town;?>" placeholder="Town">
    <span class="error"><?php echo $_SESSION['townErr'];?></span>
    <input type="text" name="postcode" value="<?php echo $postcode;?>" placeholder="Postcode">
    <span class="error"><?php echo $_SESSION['postcodeErr'];?></span>
    <input type="text" name="city" value="<?php echo $city;?>" placeholder="City">
    <span class="error"><?php echo $_SESSION['cityErr'];?></span>
    <input type="text" name="state" value="<?php echo $state;?>" placeholder="State">
    <span class="error"><?php echo $_SESSION['stateErr'];?></span>
    <button class="submit" type="submit"><span>Sign Up</span></button>
   </form>
   	<div class="center">
		<p>Already have an account?<a href="login.php">Log In</a></p>
	</div>
</div>

<?php
include 'unset_signup_session.php';
if ($firstname !== "" && $lastname !== "" && $email !== "" && $password !== "" && $confirm_psw !== "" &&
    $gender !== "" && $street !== "" && $town !== "" && $postcode !== "" && $city !== "" && $state !== "") {
        //IF value is collected, store into database
        require '../include/dbconnect.php';
        include '../include/signup_query.php';
        require '../include/dbdisconnect.php';
        
        if ($signup_result === TRUE) {
            echo '<script>window.location="login.php"</script>';
        }
}
?>
<script src="../javascript/password_requirements.js"></script>
</body>
</html>
