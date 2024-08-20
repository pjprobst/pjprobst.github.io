<?php
$errorMSG = "";

// Validate and sanitize input
$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

// Check if inputs are empty
if (empty($name)) {
    $errorMSG .= "Name is required. ";
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "Valid email is required. ";
}
if (empty($message)) {
    $errorMSG .= "Message is required. ";
}

$EmailTo = "pjprobst27@gmail.com";
$Subject = "New message from customer";

// Prepare email body text
$Body = "";
$Body .= "Name: " . $name . "\n";
$Body .= "Email: " . $email . "\n";
$Body .= "Message: " . $message . "\n";

// Send email
if ($errorMSG == "") {
    $headers = "From: " . $email;
    $success = mail($EmailTo, $Subject, $Body, $headers);

    if ($success) {
        echo "success";
    } else {
        echo "Something went wrong :(";
    }
} else {
    echo $errorMSG;
}
?>
