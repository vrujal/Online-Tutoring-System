<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular courses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/vcandfac.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="../images/E-logo.png" alt="">
            <div class="line"></div>
            <p>OnlineEdu</p>
        </div>
        <!-- <div class="logo-space">
        </div> -->
    </header>
    <!-- <br> -->
    <div class="container-main">

    <div class="main-container">
        <center>
            <h1>Popular Courses<h1>
        </center>
        <hr>
    </div>
    <section>
        <main>
            <div class="container" py-4>
                <div class="row" mt-3>
                    <?php
                    require '../php/database.php';
                    session_start();
                    $query = "SELECT * FROM course_list WHERE status = '1' AND delete_flag = '0'";
                    $query_run = mysqli_query($conn, $query);
                    $check_course = mysqli_num_rows($query_run) > 0;
                    if ($check_course) {
                        while ($row = mysqli_fetch_array($query_run)) {
                            $sql1 = $row['tutor_id'];
                            $_SESSION['course_id'] = $row['id'];
                            // $currentUser = $_SESSION['username'];
                            $_SESSION['course_name'] = $row['name'];
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
                                    <img src="../images/courses/<?php echo $row['logo']; ?>" class="card-img-top" width="200px"
                                        height="240px" alt="Course images">
                                    <div class="card-body">
                                        <h2 class="card-title">
                                            <?php echo $row['name']; ?>
                                        </h2>
                                        <h7 class="card-title">
                                            <?php echo $row['description']; ?>
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

                                        <a href="../php/loginstu.php">
                                            <button class="enrollNow" value="" class="btn" title="View" id="view"
                                                data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-target=" #view"
                                                name="enrollNow">
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
        </main>
    </section>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>