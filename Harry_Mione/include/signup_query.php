<?php
$address = $street." ".$town." ".$postcode." ".$city." ".$state;
$insert = "INSERT INTO account (firstname, lastname, email, username, password, gender, address)
                VALUES ('$firstname', '$lastname', '$email', '$username', '$hashed_psw', '$gender', '$address')";

if ($conn->query($insert) === TRUE) {
    $sql_status = "Input successful!";
    $signup_result = TRUE;
} else {
    $sql_status = "Error: " . $insert . "<br>" . $conn->error;
    $signup_result = FALSE;
}
?>
