<?php
// session_start();

include('../php/database.php');

$currentUser = $_SESSION['username'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}
$sql = "SELECT * from student where username='$currentUser' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
$row = mysqli_fetch_array($query);
?>
<!-- SIDEBAR -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <section id="sidebar">
        <div class="brand">
            <div class="logo">
                <img src="../images/E-logo.png" alt="">
                <div class="line"></div>
                OnlineEdu
            </div>
        </div>
        <ul class="side-menu top">
            <li>
                <a href="student-dashboard.php">
                    <i class='fa fa-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./student-courses.php">
                    <i class='fa fa-list'></i>
                    <span class="text">Courses</span>
                </a>
            </li>
            <li>
                <a href="./inquiries.php">
                    <i class='fa fa-info-circle'></i>
                    <span class="text">Inquiries</span>
                </a>
            </li>
            <li>
                <a href="./manageprofile.php">
                    <i class='fa fa-user'></i>
                    <span class="text">Manage Profile</span>
                </a>
            </li>
        </ul>


        <ul class="side-menu">
            <li>
                <a href="./logout.php" class="logout">
                    <i class='fa fa-sign-out'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">

        <!-- NAVBAR -->
        <nav>

            <i class='fa fa-bars'></i>
            <form action="#">
                <div class="form-input">
                    Online Tutorial Portal
                </div>
            </form>

            <!-- <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label> -->

            <?php echo $result['username']; ?>

            <a href="#" class="profile">
                <!-- <img src="img/people.png"> -->
                <?php
                if ($result['filename'] == "") {
                    ?>
                    <img src="../images/student/default.png">
                    <?php
                } else {
                    ?>
                    <?php
                    //  echo $result['filename'];
                    ?>
                    <img src='../images/student/<?php echo $result['filename']; ?>'>



                    <?php
                }
                ?>

            </a>
        </nav>

    </section>
</body>

</html>