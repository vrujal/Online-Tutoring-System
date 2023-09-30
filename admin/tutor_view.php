<?php
session_start();
include_once('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $tutor_id = $_GET['id'];
    $sql1 = $conn->query("SELECT *, CONCAT(lastname,', ',firstname , COALESCE(concat(' ', middlename), '')) as `name` FROM `tutor_list`  WHERE id = '$tutor_id'");
    $row1 = $sql1->fetch_assoc();
    $sql2 = $conn->query("SELECT * FROM tutor_meta WHERE tutor_id = $tutor_id");
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
                        <h3>Tutors Profile</h3>
                    </div>
                </div>
                <hr>
                <br>

                <!-- <div class="content bg-gradient-primary py-5 px-4">
                    <h3 class="font-weight-bolder">Tutor's Profile</h3>
                </div> -->


                <div class="row mt-n5 justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                        <div class="card card-outline card-primary rounded-0 shadow">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="" class="control-label text-muted">Name</label>
                                        <div class="pl-4 font-weight-bolder">
                                            <?php echo $row1['name'] ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="dob" class="control-label text-muted">Birthday</label>
                                                <div class="pl-4 font-weight-bolder">
                                                    <?php echo $row2['dob'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="gender" class="control-label text-muted">Gender</label>
                                                <div class="pl-4 font-weight-bolder">
                                                    <?php echo $row2['gender'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="email" class="control-label text-muted">Email</label>
                                                <div class="pl-4 font-weight-bolder">
                                                    <?php echo $row1['email'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="contact" class="control-label text-muted">Contact #</label>
                                                <div class="pl-4 font-weight-bolder">
                                                    <?php echo $row2['contact'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="address" class="control-label text-muted">Address</label>
                                                <div class="pl-4 font-weight-bolder">
                                                    <?php echo $row2['address'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="specialty"
                                                    class="control-label text-muted">Specialty</label>
                                                <div class="pl-4 font-weight-bolder">
                                                    <?php echo $row2['speciality'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="description" class="control-label text-muted">Short
                                                    Description About Your
                                                    Self</label>
                                                <div class="pl-4">
                                                    <?php echo $row2['description'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="description" class="control-label text-muted">Status</label>
                                                <div class="pl-4">
                                                    <?php if ($row1['status'] == 0): ?>
                                                        <span
                                                            class="badge badge-light bg-gradient-light border px-3 rounded-pill">Waiting
                                                            For Approval</span>
                                                    <?php elseif ($row1['status'] == 1): ?>
                                                        <span
                                                            class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Verified</span>
                                                    <?php elseif ($row1['status'] == 2): ?>
                                                        <span
                                                            class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Blocked</span>
                                                    <?php else: ?>
                                                        <span
                                                            class="badge badge-secondary bg-gradient-secondary px-3 rounded-pill">Inactive</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-1 text-center">
                                <a class="btn btn-primary btn-flat bg-gradient-primary btn-sm"
                                    href="../admin/tutor_edit.php?id=<?php echo $tutor_id ?>"><i class="fa fa-edit"></i>
                                    Edit
                                    Profile</a>

                                <button id="update_status" class="btn btn-navy btn-flat bg-gradient-navy btn-sm"
                                    data-toggle="modal" type="button" data-target="#update" type="button"><i
                                        class="fa fa-check-square"></i> Update Status</button>

                                <a class="btn btn-light btn-flat bg-gradient-light border btn-sm"
                                    href="./tutor-list.php"><i class="fa fa-angle-left"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <!-- MAIN -->
    </section>

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <!-- <div class="modal-content"> -->
            <?php
            include("../controller/updateTutorStatus.php");
            ?>
        </div>
        <!-- </div> -->
    </div>

    <script src="../js/script.js"></script>
</body>

</html>