<?php
session_start();
include_once('../php/database.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['pass'] === $pass && $row['email'] === $email) {
            $adminuser = $row['username'];
            $_SESSION['adminuser'] = $adminuser;
            header("location:admin-dashboard.php");
        } elseif ($row['email'] === $email && $row['pass'] !== $pass) {
            header("location:index.php?error=Enter correct password");
        }
    } else {
        header("location:index.php?error=You are not registered");
    }
    // $conn->close();   
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/login.css">
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

    <div class="wrapper">
        <div class="container">
            <form action="index.php" method="POST">
                <header>Admin Login</header>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="error">
                        <div class="sub-error">
                            <h4>
                                <?php echo $_GET['error']; ?>
                            </h4>
                        </div>
                    </div>
                <?php } ?>
                <div class="field email">
                    <div class="input-area">
                        <input type="text" name="email" placeholder="Email Address" required>
                    </div>
                </div>
                <div class="field password">
                    <div class="input-area">
                        <input type="password" name="pass" placeholder="Password" required>
                    </div>
                </div>
                <div class="pass-txt"><a href="#">Forgot password?</a></div>
                <input type="submit" name="submit" value="Login">

            </form>
        </div>
    </div>

</html>