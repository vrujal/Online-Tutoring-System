<?php
include_once('../php/database.php');

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $tutor_id = $_POST['tutor_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $exp = $_POST['experience'];
    $status = $_POST['status'];

    $targetDir = "../images/courses/";
    $fileName = basename($_FILES["course_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // $CreatedDate = date("Y-m-d");
    $UpdateDate = date("Y-m-d");

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'jfif');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["course_image"]["tmp_name"], $targetFilePath)) {
            $insert = $conn->query("Update course_list set name = '$name', status='$status',logo ='" . $fileName . "',description='$description', experience='$exp',date_updated='$UpdateDate' where id='$id'");

            if ($insert) {
                header('location:../admin/course-list.php');
                // $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
            } else {
                // $statusMsg = "File upload failed, please try again.";
            }
        }
    }
}

?>