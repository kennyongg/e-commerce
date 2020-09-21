<?php 
$userID = $password = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include 'dbvariables.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["userID"])) {
        $_SESSION['userIDErr'] = "Please input your username";
    } else {
        $userID = test_input($_POST["userID"]);
        include 'dbconnect.php'; // connect db
        $userID_result = $conn->query("SELECT username FROM account WHERE username = '$userID'");
        $sql_id = mysqli_fetch_assoc($userID_result); // success
        if ($userID !== $sql_id['username']) {
            $_SESSION['userIDErr'] = "Invalid username";
        }
    }
    
    if (empty($_POST["psw"])) {
        $_SESSION['passwordErr'] = "*Password is required";
    } else {
        $password = test_input($_POST["psw"]);
        $userPSW_result = $conn->query("SELECT password FROM account WHERE username = '$userID'");
        $sql_hashedpsw = mysqli_fetch_assoc($userPSW_result); // decryption
    }
    
    if (password_verify($password, $sql_hashedpsw['password'])) {
        $loginStatus = TRUE;
    } else {
        $_SESSION['passwordErr'] = "Invalid password";
    }
    include 'dbdisconnect.php';
}
?>