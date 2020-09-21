<?php
$error = 0;//testing purpose
$firstname = $lastname = $email = $username = $password = $confirm_psw = $gender = $street = $postcode = $town = $state = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include 'dbvariables.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["firstname"])) {
        $_SESSION['firstnameErr'] = "*First name is Required";
        $error++;
    } else {
        $firstname = test_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
            $_SESSION['firstnameErr'] = "*Only letters and white space allowed";
            $error++;
        }
    }
    
    if (empty($_POST["lastname"])) {
        $_SESSION['lastnameErr'] = "*Last name is Required";
        $error++;
    } else {
        $lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
            $_SESSION['lastnameErr'] = "*Only letters and white space allowed";
            $error++;
        }
    }
    
    if(empty($_POST["email"])) {
        $_SESSION['emailErr'] = "*Email is required";
        $error++;
    } else {
        $email = test_input($_POST["email"]);
        if  (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "*Invalid email format";
            $error++;
        } else {
            require 'dbconnect.php';
            $result = $conn->query("SELECT email FROM account WHERE email = '$email'");
            if($result->num_rows != 0) {
                $_SESSION['emailErr'] = "*This email already in use";
                $error++;
            }
            require 'dbdisconnect.php';
        }
    }
    
    if(empty($_POST["username"])) {
        $_SESSION['usernameErr'] = "*Username is required";
        $error++;
    } else {
        $username = test_input($_POST["username"]);
        if  (!preg_match("/^[A-Za-z\d_]{3,20}$/i",$username)) {
            $_SESSION['usernameErr'] = "*Letters, digits and '_' only (max. 20 characters)";
            $error++;
        } else {
            require 'dbconnect.php';
            $result = $conn->query("SELECT username FROM account WHERE username = '$username'");
            if($result->num_rows != 0) {
                $_SESSION['usernameErr'] = "*Username already taken";
                $error++;
            }
            require 'dbdisconnect.php';
        }
        
    }
    
    if (empty($_POST["psw"])) {
        $_SESSION['pswErr'] = "*Password is required";
        $error++;
    } else {
        $password = test_input($_POST["psw"]);
        if (!preg_match("/^[a-zA-Z\d!@#$%^&*()]{8,}$/",$password)) {
            $_SESSION['pswErr'] = "*Symbol [!@#$%^&*()_] only (min. 8 characters)";
            $error++;
        }
    }
    
    if (empty($_POST["confirm_psw"])) {
        $_SESSION['confirm_pswErr'] = "*Please confirm your password";
        $error++;
    } else {
        $confirm_psw = test_input($_POST["confirm_psw"]);
        if ($confirm_psw !== $password) {
            $_SESSION['confirm_pswErr'] = "*Password not match";
            $error++;
        } else {
            $hashed_psw = password_hash($password, PASSWORD_DEFAULT);
        }
    }
    
    if (empty($_POST["gender"])) {
        $_SESSION['genderErr'] = "*Gender is required";
        $error++;
    } else {
        $gender = test_input($_POST["gender"]);
    }
    
    if (empty($_POST["street"])) {
        $_SESSION['streetErr'] = "*Street is required";
        $error++;
    } else {
        $street = test_input($_POST["street"]);
    }
    
    if (empty($_POST["town"])) {
        $_SESSION['townErr'] = "*Town is required";
        $error++;
    } else {
        $town = test_input($_POST["town"]);
    }

    if (empty($_POST["postcode"])) {
        $_SESSION['postcodeErr'] = "*Postcode is required";
        $error++;
    } else {
        $postcode = test_input($_POST["postcode"]);
        if  (!is_numeric($postcode)) {
            $_SESSION['postcodeErr'] = "*Invalid postcode (Numbers Only)";
            $error++;
        }
    }
    
    if (empty($_POST["city"])) {
        $_SESSION['cityErr'] = "*City is required";
        $error++;
    } else {
        $city = test_input($_POST["city"]);
    }
   
    if (empty($_POST["state"])) {
        $_SESSION['stateErr'] = "*State is required";
        $error++;
    } else {
        $state = test_input($_POST["state"]);
    }
}
?>