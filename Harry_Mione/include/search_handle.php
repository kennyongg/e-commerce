<?php 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
 
if(!empty($_POST['keyword'])) {
    $_SESSION['keyword'] = $_POST['keyword'];
} else {
    $_SESSION['keyword'] = ' ';
}

if(isset($_POST['range'])) {
    $_SESSION['range'] = $_POST['range'];
} else {
    $_SESSION['range'] = 2500; //Higher than max(price) so all products will be included
}

$_SESSION['keyword'] = htmlspecialchars($_SESSION['keyword']);
// changes characters used in html to their equivalents, for example: < to &gt;
            
$nameSearch = "(`productName` LIKE '%".$_SESSION['keyword']."%' AND `price` < ".$_SESSION['range']." ";
$brandSearch = "(`productBrand` LIKE '%".$_SESSION['keyword']."%' AND `price` < ".$_SESSION['range']." ";

if (empty($_POST["category"])) {
    $nameSearch = $nameSearch.")";
    $brandSearch = $brandSearch.")";
} else {
    $category = test_input($_POST["category"]);
    $nameSearch = $nameSearch."AND category = '".$category."')";
    $brandSearch = $brandSearch."AND category = '".$category."')";
}

?>

