<?php
include_once('../php/database.php');

if (isset($_POST['save'])) {
    // $id = $_POST['id'];
    $tutor_id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mname = $_POST['middlename'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $specialty = $_POST['specialty'];
    $description = $_POST['description'];
    $Updatedate = date("Y-m-d");


    $sql = $conn->query("Update tutor_list set firstname='$fname',middlename='$mname',lastname='$lname', email='$email',date_updated='$Updatedate' where id=$tutor_id");
    $insert = $conn->query("Update tutor_meta set dob = '$dob', gender='$gender',contact ='$contact', address ='$address',description='$description', speciality='$specialty' where tutor_id = $tutor_id");
    // $insert = $conn->query("Update tutor_meta set dob = '$dob', gender='$gender',contact ='$contact',description='$description', specialty='$specialty where tutor_id='$tutor_id'");

    // if ($conn->query($sql) === TRUE) {
    header('location:../admin/tutor-list.php');
    // }
}

?>