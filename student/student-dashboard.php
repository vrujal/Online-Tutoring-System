<?php
session_start();
include('./student-sidebar.php');
$currentUser = $_SESSION['username'];
// $student_id = $_SESSION['id'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Student</title>
</head>

<body>
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
                            $inquiry = $conn->query("SELECT * FROM course_request where delete_flag = 0 and `status` = 1 and student_userName = '$currentUser'");

                            if ($inquiry->num_rows > 0) {
                                while ($row = $inquiry->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>
                        </h3>
                        <p>Enrolled Courses</p>
                    </span>
                </li>

                <li>
                    <i class='fa fa-list'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $count = 0;
                            $inquiry = $conn->query("SELECT * FROM course_request where delete_flag = 0 and delete_courses = 0 and `status` = 0  and student_userName = '$currentUser'");
                            if ($inquiry->num_rows > 0) {
                                while ($row = $inquiry->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }
                            echo $count;
                            ?>

                        </h3>
                        <p>Requested Courses</p>
                    </span>
                </li>
            </ul>
            <hr>
            <!-- <hr> -->
            <div class="enrolledCourses">

                <div class="head-title">
                    <div class="left">
                        <h1>My courses</h1>
                    </div>
                </div>
                <hr>
                <div class="container" py-4>
                    <div class="row" mt-3>
                        <?php
                        require '../php/database.php';
                        $currentUser = $_SESSION['username'];
                        $query = "SELECT * FROM course_request WHERE   status = '1' AND delete_flag = '0' AND student_userName = '$currentUser'";
                        $query_run = mysqli_query($conn, $query);
                        $check_course = mysqli_num_rows($query_run) > 0;
                        if ($check_course) {
                            while ($row = mysqli_fetch_array($query_run)) {
                                $course_id = $row['course_id'];
                                $query3 = "SELECT * FROM course_list WHERE id = '$course_id'";
                                $query_run3 = mysqli_query($conn, $query3);
                                $row3 = mysqli_fetch_array($query_run3);
                                $descip = $row3['description'];
                                $sql1 = $row['tutor_id'];
                                $_SESSION['course_id'] = $row['id'];
                                // $_SESSION['course_name'] = $row['name'];
                                $query1 = "SELECT * FROM tutor_list WHERE id = '$sql1'";
                                $query_run1 = mysqli_query($conn, $query1);
                                $row1 = mysqli_fetch_array($query_run1);
                                $course_id = $row['id'];


                                // $sql2 = "SELECT * FROM course_request WHERE course_id ='$course_id' && student_userName = '$currentUser' ";
                                // $query = mysqli_query($conn, $sql2);
                                // $result = mysqli_fetch_assoc($query);
                                ?>
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <img src="../images/courses/<?php echo $row3['logo']; ?>" class="card-img-top"
                                    width="200px" height="240px" alt="Course images">
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <?php echo $row['course_name']; ?>
                                    </h2>
                                    <h7 class="card-title">
                                        <?php echo $descip ?>
                                    </h7>
                                    <hr>
                                    <h6 style="color: rgba(0, 0, 0, 0.350);">
                                        <?php echo $row1['lastname'] . ", " . $row1['firstname'] . " " . $row1['middlename'] ?>
                                    </h6>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <p class="card-text"><b>₹449</b></p>

                                    <a href="./enrolled-course.php?id=<?php echo $row3['id']; ?>">
                                        <button class="enrollNow" value="" class="btn" title="View" id="view"
                                            data-id="<?php echo $row['id']; ?>" name="enrollNow">
                                            View Details
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            echo "No courses found";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>

    <!-- CONTENT -->


    <script src="../js/script.js"></script>
</body>

</html>