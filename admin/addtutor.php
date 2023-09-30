<?php
include_once('../php/database.php');
if (isset($_POST['save_tutor'])) {
    // $tutor_id = $_POST['tutor'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $speciality = $_POST['speciality'];
    $description = $_POST['descrp'];
    $dob = $_POST['dob'];

    $targetDir = "../images/avatars/";
    $fileName = basename($_FILES["tutor_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    $CreatedDate = date("Y-m-d");
    $UpdatedDate = date("Y-m-d");

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["tutor_image"]["tmp_name"], $targetFilePath)) {

            $sql = "INSERT INTO tutor_list(firstname,middlename,lastname,email,avtar,status,delete_flag,date_created,date_updated)
             VALUES('$firstname','$middlename','$lastname','$email','$fileName','0','0','$CreatedDate','$UpdatedDate')";

            $result = $conn->query($sql);
            $id = $conn->insert_id;
            // echo $id;

            $sql2 = "INSERT INTO tutor_meta(tutor_id,dob,gender,contact,address,speciality,description) 
            values('$id','$dob','$gender','$contact','$address','$speciality','$description')";

            if ($conn->query($sql2) === TRUE) {
                echo "<script>
                swal({
                    title: 'Success!',
                    text: 'Tutor Added',
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
                            text: 'Tutor Not Added',
                            icon: 'error',
                            button: 'Ok',
                        }).then(function() {
                            window.location = 'tutor-list.php';
                        });
                        
                        </script>";
            }

        }
    }

}else{
    echo "<script>
    swal({
        title: 'Error!',
        text: 'Tutor Not Added',
        icon: 'error',
        button: 'Ok',
    }).then(function() {
        window.location = 'tutor-list.php';
    });
    
    </script>";
}

?>