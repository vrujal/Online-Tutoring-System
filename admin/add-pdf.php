<?php
session_start();
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}
include("../php/database.php");
$course_id = $_GET['id'];
$sql = $conn->query("SELECT * FROM course_list WHERE id = '$course_id'");
$row = $sql->fetch_assoc();
$tutor_id = $row['tutor_id'];
$sql2 = $conn->query("SELECT * FROM tutor_list WHERE id = '$tutor_id'");
$row2 = $sql2->fetch_assoc();

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
                        <h3>Add attachment</h3>
                    </div>
                </div>

                <hr>
                <div id="form" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 class="modal-title" id="exampleModalLabel">New attachment</h5>
                                <a href="./course-attachment.php">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </a>
                            </div>

                            <form method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- COURSSE NAME -->
                                    <!-- CHAPTER NAME, -->
                                    <!-- DESCRIPTION,  -->
                                    <!-- PDF / VIDEO -->
                                    <div class="form-group">
                                        <input type="text" name="course_id" value="<?php echo "$course_id"; ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="CourseName">Course Name</label>
                                        <input type="text" value="<?php echo $row['name']; ?>" name="course_name"
                                            class="form-control" id="courseName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Chapter Name</label>
                                        <input type="text" name="ch-name" class="form-control" id="desc">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Chapter Description</label>
                                        <input type="text" name="ch-description" class="form-control" id="desc">
                                    </div>



                                    <input type="radio" id="chkYes" name="chk" />
                                    <label for="chkYes">Video Link</label>

                                    <input type="radio" id="chkNo" name="chk" />
                                    <label for="chkNo">PDF</label>
                                    <!-- </div> -->
                                    <div id="dvtext">
                                        <label for="desc">Video Link</label>
                                        <input type="text" name="video_link" class="form-control" id="desc">
                                        <!-- <input type="text" id="txtBox" /> -->
                                    </div>
                                    <div id="dvtext2">
                                        <label for="courseImg">PDF</label>
                                        <input type="file" name="file" id="file" class="form-control">
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" name="save_course" class="btn btn-success">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <?php


            if (isset($_POST['save_course'])) {
                $course_id = $_POST['course_id'];
                // $sql = "SELECT * FROM course_list WHERE id='$course_id'";
                // $result = mysqli_query($conn,$sql);
                // $row = mysqli_fetch_array($result);
                $tutor_id = $row['tutor_id'];
                $course_name = $_POST['course_name'];
                $ch_name = $_POST['ch-name'];
                $ch_description = $_POST['ch-description'];
                // $course_pdf = $_POST['course_pdf'];
                $fileName = $_FILES['file'];
                $link = $_POST["video_link"];

                // File upload path
                $targetDir = "../course-pdf/";
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Check if image file is a actual image or fake image
                // Allow certain file formats
                $allowTypes = array('pdf');
                if (in_array($fileType, $allowTypes)) {
                    // echo "Done karo nee1, ";
                    // Upload file to server
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                        // echo "Done karo nee2, ";
                        $sql3 = "INSERT into course_attachment(course_id,course_name,ch_name,ch_description,filename,tutor_id,status,store) VALUES('$course_id','$course_name','$ch_name','$ch_description','$fileName','$tutor_id','1',0)";
                        $success2 = $conn->query($sql3);
                        if ($success2) {
                            // echo "Done karo nee3, ";
                            echo "<script>
                                swal({
                                    title: 'Success!',
                                    text: 'PDF Added!',
                                    icon: 'success',
                                    button: 'Ok',
                                }).then(function() {
                                    window.location = 'course-attachment.php';
                                });
                                </script>";
                            // header('location:course-attachment.php');
                            //         // $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                        } else {
                            $statusMsg = "File upload failed, please try again.";
                        }
                    } else {

                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                } else {


                    $sql4 = "INSERT into course_attachment(course_id,course_name,ch_name,ch_description,link,tutor_id,status,store) VALUES('$course_id','$course_name','$ch_name','$ch_description','$link','$tutor_id','1',1)";
                    $success3 = $conn->query($sql4);
                    if ($success3) {
                        echo "<script>
                                swal({
                                    title: 'Success!',
                                    text: 'Video Added!',
                                    icon: 'success',
                                    button: 'Ok',
                                }).then(function() {
                                    window.location = 'course-attachment.php';
                                });
                                </script>";
                    }
                }
            }

            ?>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="../js/script.js"></script>
</body>

</html>