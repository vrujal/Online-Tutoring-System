<?php
session_start();
include_once('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin</title>



    <style>
        #course-logo {
            max-width: 100%;
            max-height: 15em;
            object-fit: scale-down;
            object-position: center center;
        }
    </style>
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
                        <h3>Courses Details</h3>
                    </div>

                    <hr>
                    <div class="container-fluid">
                        <!-- <form method="POST"> -->

                        <center>
                            <img src="../images/courses/<?php echo $row1['logo']; ?>" alt=" Course=logo"
                                class="img-thumbnail border border-dark bg-gradient-dark" id="course-logo">
                        </center>


                        <dl>
                            <dt class="text-muted">Tutor:</dt>
                            <dd class="pl-4">
                                <?php
                                echo $row2['lastname'] . ", " . $row2['firstname'] . ", " . $row2['middlename']; ?>
                            </dd>

                            <dt class="text-muted">Course:</dt>
                            <dd class="pl-4">
                                <?php
                                echo $row1['name']; ?>
                            </dd>

                            <dt class="text-muted">Description:</dt>
                            <dd class="pl-4">
                                <?php
                                echo $row1['description'];
                                ?>
                            </dd>
                            <dt class="text-muted">Your Experience for this Course:</dt>
                            <dd class="pl-4">
                                <?php echo $row1['experience']; ?>
                            </dd>

                            <dt class="text-muted">Status:</dt>
                            <dd class="pl-4">
                                <?php if ($row1['status'] == 0): ?>
                                    <span
                                        style=" background-color: red;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Inactive</span>
                                <?php else: ?>
                                    <span
                                        style=" background-color: green;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Active</span>
                                <?php endif; ?>
                            </dd>
                        </dl>

                        <div class="clear-fix my-3"></div>
                        <div class="text-right">
                            <a href="course-list.php">
                                <button class="btn btn-sm btn-dark bg-gradient-dark btn-flat" type="button"
                                    data-dismiss="modal"><i class="fa fa-times"></i>
                                    Close</button></a>
                        </div>

                    </div>


                </div>

            </div>

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../js/script.js">
    </script>
</body>

</html>