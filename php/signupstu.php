<?php
session_start();
include_once('./database.php');


if (isset($_POST['submit'])) {

    $username2 = $_SESSION['username'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $gender = $_POST['gender'];
    $sql = "SELECT * FROM student WHERE email='$email'";
    $sql2 = "SELECT * FROM student WHERE username='$username'";
    $result2 = mysqli_query($conn, $sql2);
    $result = mysqli_query($conn, $sql);
    if ($pass !== $cpass) {
        header("location:signupstu.php?error=The confirmation password does not match!");
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username || $row['email'] === $email) {
                header("location:signupstu.php?error=User already exists");
            }
        } elseif (mysqli_num_rows($result2) > 0) {
            $row = mysqli_fetch_assoc($result2);
            if ($row['username'] === $username || $row['email'] === $email) {
                header("location:signupstu.php?error=User already exists");
            }
        } else {
            $sql2 = "INSERT INTO student(fullname,username,email,phonenumber,pass,gender) VALUES('$fullname','$username','$email','$phonenumber','$pass','$gender')";
            if ($conn->query($sql2) === TRUE) {
                header("location:loginstu.php?error2=Register successfully");
            } else {
                header("location:signupstu.php?error=User can not register");
            }
        }
        // $conn->close();   
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up form</title>
    <link rel="stylesheet" href="../css/signupstud.css">
</head>

<body>

    <header class="header">
        <div class="logo">
            <img src="../images/E-logo.png" alt="">
            <div class="line"></div>
            <p>OnlineEdu</p>
        </div>
        <div class="logo-space">
        </div>
    </header>
    <div class="main">
        <div class="container">
            <div class="title">Student Registration</div>
            <?php if (isset($_GET['error'])) { ?>
                <div class="error">
                    <div class="sub-error">
                        <h4>
                            <?php echo $_GET['error']; ?>
                        </h4>
                    </div>
                </div>
            <?php } ?>
            <div class="content">
                <form method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="fullname" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" name="phonenumber" placeholder="Enter your number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="pass" placeholder="Enter your password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" name="cpass" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="gender-details">
                        <input type="radio" name="gender" value="Male" id="dot-1" required>
                        <input type="radio" name="gender" value="Female" id="dot-2" required>
                        <input type="radio" name="gender" id="dot-3">
                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" name="submit" value="Sign up">
                    </div>
                    <p>Go to Home page.<a href="../index.php">Click here </a></p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>