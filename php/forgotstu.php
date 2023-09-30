<?php
session_start();

include_once('./database.php');

if (isset($_POST['submit'])) {
    $_SESSION['email'] = $_POST['email'];
    $email = $_SESSION['email'];
    $_SESSION['username'] = $_POST['username'];
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM student WHERE email = '$email' AND username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $username && $row['email'] === $email) {
            // echo "done karo nee";
            header("location:newpassstu.php");
        }
    } else {
        // echo "Enter valid details";
        header("location:forgotstu.php?error=Enter valid details");
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
                <div class="field email">
                    <div class="input-area">
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="field password">
                    <div class="input-area">
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>
                </div>
                <input type="submit" name="submit" value="Forgot">


            </form>

        </div>
    </div>


</body>

</html>