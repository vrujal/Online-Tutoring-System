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
    <!-- My CSS -->
    <script src="../js/sweetalert.min.js"></script>
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
                        <h3>List of Courses</h3>
                    </div>

                    <!-- <button type="button" class="btn" data-toggle="modal" data-target="#form">
                        <div class="right-plus" data-toggle="modal" data-target="#form">
                            <i class=" fa fa-plus"></i> Create New
                        </div>
                    </button> -->


                    <hr>

                    <table class="table">
                        <colgroup>
                            <col width="5%">
                            <col width="17.5%">
                            <col width="10%">
                            <col width="25.5%">
                            <col width="19%">
                            <col width="15%">
                            <!-- <col width="11%"> -->
                        </colgroup>


                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Created<i class="fa fa-sort"></i></th>
                                <th>Image</th>
                                <th>Tutor<i class="fa fa-sort"></i></th>
                                <th>Name<i class="fa fa-sort"></i></th>
                                <th>Add<i class="fa fa-sort"></i></th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            $qry = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0 and t.status=1 and c.status = 1 and t.delete_flag =0  order by c.`id` asc");
                            while ($row = $qry->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo date("Y-m-d ", strtotime($row['date_created'])) ?>
                                    </td>
                                    <td>
                                        <img src="../images/courses/<?php echo $row['logo']; ?>">

                                    </td>
                                    <td>
                                        <?php echo $row['tutor'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['name'] ?>
                                    </td>

                                    <td>
                                        <a href="./add-pdf.php?id=<?php echo $row['id']; ?>">
                                            <button type="button" class="btn" data-toggle="modal" data-target="#form">
                                                <div class="right-plus" data-toggle="modal" data-target="#form">
                                                    <i class=" fa fa-plus"></i> Add File
                                                </div>
                                            </button>
                                        </a>
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
    <script src="../js/script.js">
    </script>
</body>

</html>