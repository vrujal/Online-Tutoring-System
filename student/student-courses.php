<?php
session_start();
include('./student-sidebar.php');
$currentUser = $_SESSION['username'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Courses</title>
    <link rel="stylesheet" href="../css/studentCourse.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    /* <<<<<<< HEAD */
    .launch {
        height: 40px;
    }

    .close {
        font-size: 21px;
        cursor: pointer;
    }


    .modal-body {
        height: 500px;
    }

    .form-control {
        border-bottom: 1px solid #eee !important;
        border: none;
        font-weight: 600;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #8bbafe;
        outline: 0;
        box-shadow: none;
    }

    .inputbox {
        position: relative;
        width: 100%;
    }

    .inputbox span {
        position: absolute;
        top: 7px;
        left: 11px;
        transition: 0.5s;
    }

    .inputbox i {
        position: absolute;
        top: 13px;
        right: 8px;
        transition: 0.5s;
        color: #3f51b5;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .inputbox input:focus~span {
        transform: translateX(-0px) translateY(-15px);
        font-size: 12px;
    }

    .inputbox input:valid~span {
        transform: translateX(-0px) translateY(-15px);
        font-size: 12px;
    }

    .pay button {
        height: 40px;
        border-radius: 37px;
    }
    </style>
</head>

<body>
    <!-- CONTENT -->
    <section id="content">
        <!-- MAIN -->
        <main>
            <!-- Modal HTML -->
            <div class="head-title">
                <div class="left">
                    <h1>Courses</h1>
                </div>
            </div>
            <hr>
            <div class="container" py-4>
                <div class="row" mt-3>
                    <?php
                    require '../php/database.php';
                    $qry = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0 and t.status=1   && c.status = 1 order by c.`id` asc");
                    while ($row = $qry->fetch_assoc()) {
                        $sql1 = $row['tutor_id'];
                        $_SESSION['course_id'] = $row['id'];
                        $currentUser = $_SESSION['username'];
                        $_SESSION['course_name'] = $row['name'];
                        $query1 = "SELECT * FROM tutor_list WHERE id = '$sql1'";
                        $query_run1 = mysqli_query($conn, $query1);
                        $row1 = mysqli_fetch_array($query_run1);
                        $course_id = $row['id'];
                        $sql2 = "SELECT * FROM course_request WHERE course_id ='$course_id' && student_userName = '$currentUser' ";
                        $query = mysqli_query($conn, $sql2);
                        $result = mysqli_fetch_assoc($query);
                        ?>
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <img src="../images/courses/<?php echo $row['logo']; ?>" class=" card-img-top" width="200px"
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
                                <?php
                                    $sql2 = "SELECT * FROM course_request WHERE course_id ='$course_id' && student_userName = '$currentUser'  && delete_flag = 0 && delete_courses = 0 "; 
                                    $query = mysqli_query($conn, $sql2);
                                    $result = mysqli_fetch_assoc($query);
                                    if (mysqli_num_rows($query) != 0) {
                                        if ($result['status'] === '1') {
                                            ?>
                                <button onclick="done()" class="enrolled" name="enrolled">
                                    Enrolled
                                </button>

                                <?php
                                        } else if ($result['status'] === '0') {
                                            ?>
                                <button onclick="done()" class="requested" name="requested">
                                    Requested
                                </button>

                                <?php
                                        }
                                    } else {
                                        ?>
                                <a href="./pay.php?id=<?php echo $row["id"] ?>">
                                    <button type="button" style="height:35px" class="enrollNow" data-toggle="modal"
                                        data-target="#staticBackdrop"> <i class="fa fa-rocket"></i>
                                        Enroll Now
                                    </button>
                                </a>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
    </section>
    <script src="../js/script.js"></script>

    <script src="../js/sweetalert.min.js"></script>
    <script type="text/javascript">
    $(".remove").click(function() {
        var id = $(this).parents("tr").attr("id");

        if (confirm('Are you sure to remove this record ?')) {
            $.ajax({
                url: '/enrollCourse.php',
                type: 'POST',
                data: {
                    id: id
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    // $("#"+id).remove();
                    alert("Record removed successfully");
                }
            });
        }
    });
    </script>

</body>

</html>