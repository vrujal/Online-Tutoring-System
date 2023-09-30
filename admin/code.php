<html>
    <head>
        <script src="../js/sweetalert.min.js"></script>
    </head>
    <body>
    </body>
</html>
<?php
include_once('../php/database.php');
if (isset($_POST['save_course'])) {
    $tutor_id = $_POST['tutorname'];
    $coursename = $_POST['course_name'];
    $description = $_POST['descrp'];
    $exp = $_POST['experience'];

    // echo $tutor_id;
    $targetDir = "../images/courses/";
    $fileName = basename($_FILES["course_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    // $images = $_FILES["faculty_image"]['name'];

    $CreatedDate = date("Y-m-d");
    $UpdateDate = date("Y-m-d");
    // $target = "upload/".basename($images);
    // $sql = "INSERT INTO course_list("

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if($tutor_id != '#'){
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["course_image"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO course_list(tutor_id,name,logo,description,experience,status,delete_flag,date_created,date_updated) VALUES('$tutor_id','$coursename','$fileName','$description','$exp','0','0','$CreatedDate','$UpdateDate')"; {
                    $resul = $conn->query($sql);
                    if ($resul) {
                        // header('Location:course-list.php');
                        // echo '<script>alert("Couses added")</script>';
                       
                            echo "<script>
                            swal({
                                title: 'Success!',
                                text: 'Course Added',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = 'course-list.php';
                            });
                            </script>";
                            // header("location:course-list.php");
                            // echo "done";
                        
                    } else {
                        // header('Location:course-list.php');
                        echo "<script>
                        swal({
                            title: 'Error!',
                            text: 'Inquiry Not Sent',
                            icon: 'error',
                            button: 'Ok',
                        }).then(function() {
                            window.location = 'course-list.php';
                        });
                        
                        </script>";
                        // echo '<script>alert("Couser not added")</script>';
                    }
                }
            }
        }
    } else {
      
        echo "<script>
        swal({
            title: 'Error!',
            text: 'Inquiry Not Sent',
            icon: 'error',
            button: 'Ok',
        }).then(function() {
            window.location = 'course-list.php';
        });
        
        </script>";
        // header("location:course-list.php");

    }
    
}
?>
