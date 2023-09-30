<?php 
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "online_edu";

    $conn = new mysqli($servername,$user,$password,$dbname);
    if(!$conn){
        echo "Database connection error!";
    }
?>