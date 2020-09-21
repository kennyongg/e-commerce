<?php
session_start(); error_reporting(0);
echo '
    <script src="../javascript/header.js"></script>
    <div id="header">
    <img src="../icons/menu.png" id="menubutton" onclick="openNav()"></img>
    <div class="logo"><a href="index.php" style="text-decoration:none;color:black">Harry <br>& Mione</a></div>
    <div class="head-container brackets">
    
    <a href="skincare.php"><span class="a">SKIN CARE</span></a>
    <a href="makeup.php"><span class="b">MAKEUP</span></a>
    <a href="hair.php"><span class="c">HAIR</span></a>
    <a href="fragrance.php"><span class="d">FRAGRANCE</span></a>
    <a href="body.php"><span class="e">BODY</span></a>
    
    </div>
    <div class="rightmenu" id="rightmenu">
';

/* Check login status */
if (!empty($_SESSION["user"])) {
    require '../include/dbvariables.php';
    require '../include/dbconnect.php';
    $login_name = $conn->query("SELECT firstname FROM account WHERE username='".$_SESSION["user"]."'");
    $userInfo = mysqli_fetch_assoc($login_name);
    echo '<a href="userpage.php" style="text:decoration:none;color:black;"><strong>Hi, '.$userInfo['firstname'].'</strong></a>';
} else {
    echo '<a href="login.php"><img class="zoom" src="../icons/user.png"></a>';
}

echo '
    <img src="../icons/stroke.png" style="width: 20px;">
    <a href="cart.php"><img class="zoom" src="../icons/paperbag.png"></a>
    <img src="../icons/stroke.png" style="width: 20px;">
    <a onclick="openSearchBox()"><img class="zoom" src="../icons/search.png"></a>
    <div id="searchbox">
    <img onclick="closeSearchBox()" src="../icons/cross.png">
    <form action="../include/quicksearch.php" method="post">
    <input type="text" name="keyword">
    </form>
    </div>
    </div>
    </div>
';
?>