<?php
session_start();
$currentUser = $_SESSION['username'];
include('./student-sidebar.php');
include_once('../php/database.php');
// $statusMsg = '';
$sql = "SELECT * from student where username='$currentUser'";

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$qualify = $_POST['qualify'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$fileName = $_FILES['file'];

// File upload path
$targetDir = "../images/student/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir.$fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('jpg','JPG', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = $conn->query("Update student set fullname = '$fullname',username='$username',email ='$email',qualify = '$qualify' ,dob='$dob'
            ,phonenumber='$phone', gender='$gender',filename ='$fileName' where username='$currentUser'");

            if ($insert) {
                header('location:manageprofile.php');
                // $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
            } else {
                // $statusMsg = "File upload failed, please try again.";
            }
        } else {
            // $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        // $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    // $statusMsg = 'Please select a file to upload.';
}

// Display status message
// echo $statusMsg;

?>