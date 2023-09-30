<?php
include_once('../php/database.php');
if (isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $sql = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0  order by c.`name` asc ");
    // while ($row = $qry->fetch_assoc()) {


    $update = mysqli_query($conn, "UPDATE course_list SET status = 1 where id='$course_id'");
    $sql = $conn->query("Update course_request set delete_flag ='0' where course_id=$course_id");

    // $update2 = mysqli_query($conn, "UPDATE course_request SET delete_flag = 0 where course_id='$course_id'");

}
header('location:../admin/course-list.php');


?>