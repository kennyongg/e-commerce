<?php
$conn = new mysqli($servername,$db_username,$db_password,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
} else {
    $dbstatus = "Database connected";
}
?>