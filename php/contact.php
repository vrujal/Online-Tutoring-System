<!DOCTYPE html>
<html>

<head>
    <title>contact us form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/contactsty.css">
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
            <div class="title">Contact Us</div>
            <div class="content">

                <form action="conaction.php" method="POST">

                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-box">
                            <label>Message:</label>
                            <textarea class="form-control" name="message" required> </textarea>


                        </div>

                    </div>
                 
                    <div class="button">
                        <input type="submit"></button>
                    </div>

                    <?php if (isset($_GET['error'])) { ?>
                    <div class="error">
                        <div class="sub-error">
                            <h4>
                                <?php echo $_GET['error']; ?>
                            </h4>
                        </div>
                    </div>
                <?php } ?>
                </form>

            </div>
        </div>
        <!-- </div> -->
        </main>
        </section>
    </div>

</body>

</html>