<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "test123";
    $dbname = "TravelOpedia";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['firstName'])) {
        $firstName = $_POST['firstName'];
    }
    if (isset($_POST['lastName'])) {
        $lastName = $_POST['lastName'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['phoneNumber'])) {
        $phoneNumber = $_POST['phoneNumber'];
    }
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
    }

    $sql = "insert into users (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$message')";

    $toEmail = "admin@travelOpedia.com";
	$mailHeaders = "From: " . $lastName . "<". $email .">\r\n";
	if(mail($toEmail, 'Contact Us', $message, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	}
    $conn->close();
?>