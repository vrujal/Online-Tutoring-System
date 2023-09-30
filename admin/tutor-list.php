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
                        <h3>List of Tutors</h3>
                    </div>


                    <button type="button" class="btn" data-toggle="modal" data-target="#form">
                        <div class="right-plus" data-toggle="modal" data-target="#form">
                            <i class=" fa fa-plus"></i> Add New Tutor
                        </div>
                    </button>


                    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">New Course</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="addtutor.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">

                                        <label for="TutorName">Tutor Name</label>
                                        <div class="form-group" style="display:flex">
                                            <input type="text" style="width:33%" name="lastname" placeholder="last name"
                                                class="form-control" id="">,
                                            <input type="text" style="width:33%" name="firstname" class="form-control"
                                                placeholder="first name" id="">
                                            <input type="text" style="width:33%" name="middlename" class="form-control"
                                                placeholder="middle name" id="">

                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="">
                                        </div>

                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input type="number" name="contact" class="form-control" id="">
                                        </div>

                                        <div class="form-group">
                                            <label for="gender"> Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="" selected> Select option </option>
                                                <option value="1"> Male </option>
                                                <option value="2"> Female</option>
                                                <option value="3"> Prefer not to say </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="dob">Date of birth</label>
                                            <input type="date" name="dob" class="form-control" id="">
                                        </div>


                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="contact">Speciality</label>
                                            <input type="text" name="speciality" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="contact">Short Description</label>
                                            <input type="text" name="descrp" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="courseImg">Tutor's Avatar</label>
                                            <input type="file" name="tutor_image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" name="save_tutor" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <table class="table">
                    <colgroup>
                        <col width="5%">
                        <col width="17.5%">
                        <col width="10%">
                        <col width="22.5%">
                        <col width="19%">
                        <col width="15%">
                        <col width="11%">
                    </colgroup>


                    <thead>


                        <tr>
                            <th>#</th>
                            <th>Date Created<i class="fa fa-sort"></i></th>
                            <th>Avatar</th>
                            <th>Name<i class="fa fa-sort"></i></th>
                            <th>Email<i class="fa fa-sort"></i></th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        // $i = 1;
                        $qry = $conn->query("SELECT *, concat(firstname,' ', coalesce(concat(middlename,' '), '') , lastname) as `name` from `tutor_list` where delete_flag = 0 order by `id` asc ");
                        while ($row = $qry->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo date("Y-m-d ", strtotime($row['date_updated'])) ?>
                                </td>
                                <td>
                                    <img src="../images/avatars/<?php echo $row['avtar']; ?>" alt=""
                                        class="img-thumbnail rounded-circle tutor-avatar">
                                    <!-- <img src="../images/girl.jpeg" alt="" class="img-thumbnail rounded-circle tutor-avatar"> -->
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>

                                <td>
                                    <?php if ($row['status'] == 1): ?>
                                        <span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Verified</span>
                                    <?php elseif ($row['status'] == 0): ?>
                                        <span class="badge badge-secondary bg-gradient-secondary px-3 rounded-pill">Waiting for
                                            approval</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Blocked</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <div class="icons">
                                        <button class="view" class="btn" title="View" id="view" data-toggle="modal"
                                            type="button" data-id="<?php echo $row['id'] ?>"
                                            style="border:none; background-color:inherit">
                                            <a href="tutor_view.php?id=<?php
                                            // session_start(); 
                                            echo $row['id'];
                                            // $_SESSION['id'] = $row['id'];
                                            ?>">
                                                <i style=" padding: 0.100rem 0.10rem;" class="fa fa-eye"></i>
                                            </a>
                                        </button>

                                    </div>

                                    <div class="icons">
                                        <button class="edit" class="btn" title="edit" id="edit" data-toggle="modal"
                                            type="button" data-id="<?php echo $row['id'] ?>"
                                            style="border:none; background-color:inherit">
                                            <a href="tutor_edit.php?id=<?php
                                            // session_start(); 
                                            echo $row['id'];
                                            // $_SESSION['id'] = $row['id'];
                                            ?>">
                                                <i style=" padding: 0.100rem 0.10rem;" class="fa fa-edit"></i>
                                            </a>
                                        </button>
                                    </div>

                                    <div class="icons">
                                        <form method="POST">
                                            <input type="text" name="delete" value="<?php echo $row['id'] ?>" hidden>
                                            <button name="delete1" class="btn" title="Delete"
                                                data-id="<?php echo $row['id'] ?>"
                                                style="border:none; background-color:inherit">
                                                <i style=" padding: 0.100rem 0.10rem;" class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
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
                        <li class="page-item active"><a href="#" class="page-link">2</a></li>
                        <li class="page-item "><a href=" #" class="page-link">3</a></li>
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
<?php
if (isset($_POST['delete1'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM tutor_meta WHERE tutor_id='$id'";
    $result = $conn->query($sql);
    $sql1 = "UPDATE tutor_list SET delete_flag = '1' WHERE id='$id'";
    $result1 = $conn->query($sql1);
    $sql2 = "UPDATE course_list SET delete_flag = '1' WHERE tutor_id='$id'";
    $result2 = $conn->query($sql2);
    $sql3 = "UPDATE course_request SET delete_flag = '1' WHERE tutor_id='$id'";
    $result3 = $conn->query($sql3);
    if ($result && $result1 && $result2 && $result3) {
        echo "<script>
                swal({
                    title: 'Success!',
                    text: 'Tutor Deleted!',
                    icon: 'success',
                    button: 'Ok',
                }).then(function() {
                    window.location = 'tutor-list.php';
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
                    window.location = 'tutor-list.php';
                });
                </script>";
    }
    // $conn->query("UPDATE `tutor_list` set delete_flag = 1 where id = $id");
    // header("Location: tutor_list.php");
    // echo '<script>
    // console.log("'.$id.'");
    // </script>';
}
?>