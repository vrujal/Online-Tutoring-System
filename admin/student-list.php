<?php
session_start();
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}
include("../php/database.php");

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
                        <h3>Students Enrolled</h3>
                    </div>
                </div>

                <hr>



                <table class="table">
                    <colgroup>
                        <col width="5%">
                        <col width="17.5%">
                        <col width="10%">
                        <col width="15%">
                        <col width="25%">
                        <col width="20.5%">
                        <!-- <col width="10%"> -->
                    </colgroup>


                    <thead>


                        <tr>
                            <th>#</th>
                            <th>Name<i class="fa fa-sort"></i></th>
                            <th>Avatar<i class="fa fa-sort"></i></th>
                            <th>Usrename<i class="fa fa-sort"></i></th>
                            <th>Email<i class="fa fa-sort"></i></th>
                            <th>Course selected<i class="fa fa-sort"></i></th>
                            <!-- <th>Action</th> -->
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        // $i = 1;
                        $sql = $conn->query("SELECT * FROM student");
                        while ($row = $sql->fetch_assoc()):
                            ?>

                            <tr>
                                <td class="text-center">
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['fullname']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row['filename'] == "") {
                                        echo "<img src='../images/student/default.png'>";
                                    } else {
                                        echo "<img src='../images/student/" . $row['filename'] . "'>";
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php echo $row['username'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>

                                <td>
                                    <?php
                                    $student_id = $row['id'];

                                    $sql2 = $conn->query("SELECT * FROM course_request WHERE student_id = '$student_id' && status = '1' && delete_flag =0 && delete_courses =0");
                                    $result = mysqli_num_rows($sql2) > 0;
                                    // $row2 = $sql2->fetch_assoc();
                                    if ($result) {
                                        while ($row2 = $sql2->fetch_assoc()) {
                                            echo $row2['course_name'];
                                            echo "<br/>";
                                        }
                                    } else {
                                        echo "Not selected!";
                                    }


                                    ?>
                                </td>



                            </tr>

                        <?php endwhile; ?>

                    </tbody>

                </table>


                <!-- <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div> -->
            </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="../js/script.js"></script>
</body>

</html>