<?php
session_start();
include('./student-sidebar.php');
$currentUser = $_SESSION['username'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Courses</title>
    <link rel="stylesheet" href="../css/studentCourse.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<body>
    <!-- CONTENT -->
    <section id="content">
        <!-- MAIN -->
        <main>
            <!-- Modal HTML -->
            <div class="head-title">
                <div class="left">
                    <h1>Courses</h1>
                    <?php
                    $id = $_GET['id'];
                    // echo "$id";
                    ?>
                </div>
            </div>
            <hr>
            <div class="container mt-5 px-5">
                <div class="row">
                    <div class="col-md-8">
                        <form method="POST" action="enrollCourse.php?id=<?php echo $id ?>">
                            <div class="card p-3">
                                <h6 style="font-size: 900!important;" class="text-uppercase">Payment details</h6>
                                <div class="inputbox mt-3"> <input type="text" name="cardname" class="form-control"
                                        required>
                                    <span>Name on card</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="inputbox mt-3 mr-2"> <input type="text" name="cardnumber"
                                                class="form-control" required> <i class="fa fa-credit-card"></i>
                                            <span>Card
                                                Number</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="d-flex flex-row">
                                            <div class="inputbox mt-3 mr-2"> <input type="date" name="expiry"
                                                    class="form-control" required> <span>Expiry</span> </div>
                                            <!-- <div class="inputbox mt-3 mr-2"> <input type="text" name="cvv"
                                                class="form-control" required> <span>CVV</span> </div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex flex-row">
                                            <div class="inputbox mt-3 mr-2"> <input type="text" name="cvv"
                                                    class="form-control" required> <span>CVV</span> </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="mt-4 mb-4">
                                    <h6 class="text-uppercase">Billing Address</h6>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="inputbox mt-3 mr-2"> <input type="text" name="add"
                                                    class="form-control" required> <span>Street
                                                    Address</span> </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="inputbox mt-3 mr-2"> <input type="text" name="city"
                                                    class="form-control" required> <span>City</span> </div>
                                        </div>




                                    </div>


                                    <div class="row mt-2">

                                        <div class="col-md-6">
                                            <div class="inputbox mt-3 mr-2"> <input type="text" name="state"
                                                    class="form-control" required>
                                                <span>State/Province</span>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="inputbox mt-3 mr-2"> <input type="text" name="pin"
                                                    class="form-control" required> <span>Pin code</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="mt-4 mb-4 d-flex justify-content-between">
                                <a href="student-courses.php"> <span>Previous step</span></a>
                                <a href="enrollCourse.php?id=<?php echo $id ?>">
                                    <button class="btn btn-success px-3" name="enrolled">Pay ₹449</button>
                                </a>
                            </div>
                        </form>

                    </div>

                </div>

            </div>


            </div>


        </main>
    </section>
    <script src="../js/script.js"></script>


</body>

</html>