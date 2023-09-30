<?php
session_start();

include('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php")
    ;
}
if (isset($_POST['id']) && $_POST['id'] > 0) {
    $id = $_POST['id'];
    $sql1 = $conn->query("SELECT * FROM course_list WHERE id = '$id'");
    $row1 = $sql1->fetch_assoc();
    $tutor_id = $row1['tutor_id'];
    $sql2 = $conn->query("SELECT * FROM tutor_list WHERE id = '$tutor_id'");
    $row2 = $sql2->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin</title>
</head>

<body>

    <?php
    include('./header.php');
    ?>

    <!-- CONTENT -->
    <section id="content">

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>

            </div>
            <hr>
            <ul class="box-info">
                <li>
                    <i class='fa fa-list'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $course = $conn->query("SELECT * FROM course_list where delete_flag = 0 and `status` = 1");
                            if ($course->num_rows > 0) {
                                while ($row = $course->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <!-- php code number will be shown dynamically -->
                        <p>Active Courses</p>

                    </span>
                </li>
                <li>
                    <i class='fa fa-list'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $course = $conn->query("SELECT * FROM course_list where delete_flag = 0 and `status` = 0");
                            if ($course->num_rows > 0) {
                                while ($row = $course->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <p>Inactive Courses</p>
                    </span>
                </li>

                <li>
                    <i class='fa fa-users'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $tutor = $conn->query("SELECT * FROM tutor_list where delete_flag = 0 and `status` = 1");
                            if ($tutor->num_rows > 0) {
                                while ($row = $tutor->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <p>Verified Tutors</p>
                    </span>
                </li>

                <li>
                    <i class='fa fa-users'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $tutor = $conn->query("SELECT * FROM tutor_list where delete_flag = 0 and `status` = 0");
                            if ($tutor->num_rows > 0) {
                                while ($row = $tutor->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <p>Waiting for approval</p>
                    </span>
                </li>

                <li>
                    <i class='fa fa-users'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $tutor = $conn->query("SELECT * FROM tutor_list where delete_flag = 0 and `status` = 2");
                            if ($tutor->num_rows > 0) {
                                while ($row = $tutor->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <p>Blocked Tutors</p>
                    </span>
                </li>
                <li>
                    <i class='fa fa-user'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $student = $conn->query("SELECT * FROM student");
                            if ($student->num_rows > 0) {
                                while ($row = $student->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <p>Students</p>
                    </span>
                </li>
                <li>
                    <i class='fa fa-info-circle'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $inquiry = $conn->query("SELECT * FROM inquiries where delete_flag = 0 and `status` = 1");
                            if ($inquiry->num_rows > 0) {
                                while ($row = $inquiry->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <p>Read Inquiries</p>
                    </span>
                </li>
                <li>
                    <i class='fa fa-info-circle'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $inquiry = $conn->query("SELECT * FROM inquiries where delete_flag = 0 and `status` = 0");
                            if ($inquiry->num_rows > 0) {
                                while ($row = $inquiry->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <p>Unread Inquiries</p>
                    </span>
                </li>

            </ul>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../js/script.js"></script>
</body>

</html>