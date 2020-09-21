<?php
session_start();
if(!empty($_POST['keyword'])) {
    $_SESSION['keyword'] = $_POST['keyword'];
} else {
    $_SESSION['keyword'] = ' ';
}

$_SESSION['keyword'] = htmlspecialchars($_SESSION['keyword']);
// changes characters used in html to their equivalents, for example: < to &gt;

$_SESSION['nameSearch'] = "(`productName` LIKE '%".$_SESSION['keyword']."%')";
$_SESSION['brandSearch'] = "(`productBrand` LIKE '%".$_SESSION['keyword']."%')";

echo '<script>window.location="../pages/quicksearch_result.php"</script>';
?>