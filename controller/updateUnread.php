<?php
include_once('../php/database.php');
if (isset($_GET['id'])) {
    $inquiry_id = $_GET['id'];
    $sql = $conn->query("SELECT*FROM inquiries WHERE delete_flag = 0 ");
    $update = mysqli_query($conn, "UPDATE inquiries SET status = 1 where id='$inquiry_id'");
}
header('location:../admin/inquiries.php');


?>