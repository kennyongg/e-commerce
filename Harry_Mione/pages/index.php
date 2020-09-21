<!DOCTYPE html>
<html>
<head>
<title>Harry & Mione</title>
<meta charset="utf-8">
<link href="../header/header.css" rel="stylesheet">
<link href="../footer/footer.css" rel="stylesheet">
<link href="../css/product.css" rel="stylesheet">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<style>
    body {
      margin: 0;
      padding: 125px 0 0 0;
    }
</style>

</head>
<body>
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

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" z-index="0">
      <img class="d-block w-100" src="cover/cover1.jpg" alt="First slide" height="100%">
    </div>
    <div class="carousel-item" z-index="0">
      <img class="d-block w-100" src="cover/cover2.jpg" alt="Second slide" height="100%">
    </div>
    <div class="carousel-item" z-index="0">
      <img class="d-block w-100" src="cover/cover3.jpg" alt="Third slide" height="100%">
    </div>
    <div class="carousel-item" z-index="0">
      <img class="d-block w-100" src="cover/cover4.jpg" alt="Third slide" height="100%">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php include '../footer/footer.php';?>

</body>
</html>