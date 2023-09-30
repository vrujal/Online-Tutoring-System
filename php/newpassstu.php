<?php
include_once('./database.php');
session_start();

if (isset($_POST['submit'])) {

    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    // echo "$email, $username";
    if ($pass !== $cpass) {
        header("location:newpassstu.php?error=Enter same password");
    } else {
        // header("location:newpassstu.php?error2=done karo neeee");
        $sql = "UPDATE student SET pass = '$pass' WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            header("location:loginstu.php?error2=Password reset successfully");
        } else {
            header("location:newpassstu.php?error=Error");
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            <form action="#" method="POST">
                <header>Forgot Password</header>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="error">
                        <div class="sub-error">
                            <h4>
                                <?php echo $_GET['error']; ?>
                            </h4>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['error2'])) { ?>
                    <div class="error2">
                        <div class="sub-error2">
                            <h4>
                                <?php echo $_GET['error2']; ?>
                            </h4>
                        </div>
                    </div>
                <?php } ?>
                <div class="field email">
                    <div class="input-area">
                        <input type="text" name="pass" placeholder="Enter new password" required>
                    </div>
                </div>
                <div class="field password">
                    <div class="input-area">
                        <input type="text" name="cpass" placeholder="Enter confirm password" required>
                    </div>
                </div>
                <input type="submit" name="submit" value="Forgot">
            </form>

        </div>
    </div>


</body>

</html>