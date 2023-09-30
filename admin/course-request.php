<?php
session_start();
include_once('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>
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
            <div class="courses">
                <div class="head-title">
                    <div class="left">
                        <h3>Course Request</h3>
                    </div>
                </div>


                <hr>
                <table class="table">
                    <colgroup>
                        <col width="5%">
                        <col width="10%">
                        <col width="19%">
                        <col width="17.5%">
                        <col width="22.5%">
                        <col width="26%">
                        <!-- <col width="11%"> -->
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>Student Username</th>
                            <th>Course</th>
                            <th>Tutor</th>
                            <th>Status</th>
                            <!-- <th>Request</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT * FROM course_request WHERE status = '0' AND delete_flag = '0' AND delete_courses = 0");
                        while ($row = $qry->fetch_assoc()):
                            $course_id = $row['course_id'];
                            $qry2 = $conn->query("SELECT * FROM course_list WHERE id = $course_id AND delete_flag = '0'");
                            while ($row2 = $qry2->fetch_assoc()) {
                                $tutor_id = $row2['tutor_id'];
                                $qry3 = $conn->query("SELECT * FROM tutor_list WHERE id = $tutor_id");
                                while ($row3 = $qry3->fetch_assoc()) {
                                    $row['name'] = $row3['lastname'] . ',' . $row3['firstname'] . ' ' . $row3['lastname'];
                                }
                            }
                            $studentUser = $row['student_userName'];
                            $qry4 = $conn->query("SELECT * FROM student WHERE username = '$studentUser'");
                            while ($row4 = $qry4->fetch_assoc()) {
                                $avtar = $row4['filename'];
                            }
                            ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php
                                    if ($avtar == "") {
                                        echo "<img src='../images/student/default.png'>";
                                    } else {
                                        echo "<img src='../images/student/" . $avtar . "'>";
                                    }
                                    ?>

                            </td>
                            <td>
                                <?php echo $row['student_userName']; ?>
                            </td>
                            <td>
                                <?php echo $row['course_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>

                            <td>

                                <?php if ($row['status'] == 0): ?>
                                <form method="POST">
                                    <input type="text" name="courseId" value="<?php echo $row['id'] ?>" hidden>
                                    <button class="accept" class="btn" title="Accept"
                                        data-id="<?php echo $row['id']; ?>" data-target=" #view" name="accept">
                                        Accept
                                    </button>
                                    <button class="cancel" class="btn" title="Cancel" id="view"
                                        data-id="<?php echo $row['id']; ?>" data-target=" #view" name="cancel">
                                        Cancel
                                    </button>
                                </form>
                                <?php endif; ?>

                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="../js/script.js"></script>
</body>

</html>
<?php
if (isset($_POST['accept'])) {
    $id = $_POST['courseId'];
    // echo "hello";
    $sql = "UPDATE course_request SET status = '1' WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
        echo "<script>
            swal({
                title: 'Success!',
                text: 'Request Accepted!',
                icon: 'success',
                button: 'Ok',
            }).then(function() {
                window.location = 'course-request.php';
            });
            </script>";
    } else {
        echo "<script>
            swal({
                title: 'Error!',
                text: 'Something went wrong!',
                icon: 'error',
                button: 'Ok',
            }).then(function() {
                window.location = 'course-request.php';
            });
            </script>";
    }
}
if(isset($_POST['cancel'])){
    $id = $_POST['courseId'];
    $sql = "UPDATE course_request SET delete_flag='1' WHERE id = $id";
    $result = $conn->query($sql);
    if($result){
        echo "<script>
            swal({
                title: 'Success!',
                text: 'Request Cancelled!',
                icon: 'success',
                button: 'Ok',
            }).then(function() {
                window.location = 'course-request.php';
            });
            </script>";

        }else{
        echo "<script>
            swal({
                title: 'Error!',
                text: 'Something went wrong!',
                icon: 'error',
                button: 'Ok',
            }).then(function() {
                window.location = 'course-request.php';
            });
            </script>";
    }
}
?>