<?php
require '../php/database.php';
extract($_POST);
$sql = "INSERT into contactus (name,email,message,created_date) VALUES('" . $name . "','" . $email . "','" . $message . "','" . date('Y-m-d') . "')";
$success = $conn->query($sql);
if (!$success) {
    die("Couldn't enter data: " . $conn->error);
}
header("location:contact.php?error=Thank You for Contacting Us. We will get back to you soon.");
$conn->close();


?>