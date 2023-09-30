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
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Update Course Details</h5>
                    </div>
                </div>


                <hr>
                <br>


                <div class="row mt-n5 justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                        <div class="card card-outline card-primary rounded-0 shadow">
                            <div class="card-body">

                                <div class="container-fluid">
                                    <form action="../controller/updateCourse.php" method="post"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
                                        <input type="hidden" name="tutor_id" value="<?php echo $row1['tutor_id'] ?>">

                                        <div class="form-group">
                                            <label for="" class="control-label">Name </label>
                                            <div class="input-group input-group-sm align-items-end">
                                                <input type="text"
                                                    class="form-control form-control-sm form-control-border rounded-0"
                                                    id="name" name="name" value="<?php echo $row1['name'] ?>"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label">Description</label>
                                            <textarea type="text" name="description" id="description"
                                                class="form-control form-control-sm rounded-0"
                                                required><?php echo $row1['description'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="experience" class="control-label">Experience <em>(1 Year , 2
                                                    Years , 3 Years , 4 Years , 5 Years , More than 5 Years
                                                    )</em></label>

                                            <input type="text" name="experience" id="experience"
                                                class="form-control form-control-sm rounded-0"
                                                value="<?php echo $row1['experience'] ?>" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="control-label">Status</label>
                                            <select name="status" id="status"
                                                class="form-control form-control-sm rounded-0" required>
                                                <option value="1" <?php echo $row1['status'] == 1 ? 'selected' : '' ?>>
                                                    Active
                                                </option>
                                                <option value="1" <?php echo $row1['status'] == 0 ? 'selected' : '' ?>>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="courseImg">Course's Logo</label>
                                            <input type="file" name="course_image" id="course_image"
                                                class="form-control" required>
                                        </div>

                                        <div class="card-footer py-1 text-center">
                                            <button name="save"
                                                class="btn btn-primary btn-flat btn-sm bg-gradient-primary">
                                                <i class="fa fa-save"> </i>
                                                Save
                                            </button>

                                            <a class="btn btn-light btn-flat bg-gradient-light border btn-sm"
                                                href="../admin/course-list.php?"><i class="fa fa-times"></i>
                                                Cancel</a>
                                        </div>
                                    </form>
                                </div>

                            </div>
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