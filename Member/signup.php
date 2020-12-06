<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO  members(fname, lname, email, password) VALUES('$fname', '$lname', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Congratulations! Your Registration was successfull")</script>';
        header('refresh: 0.01; url = index.php');
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Library Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- FONT AWESOME STYLE  -->
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <!-- CUSTOM STYLE  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>

    <script type="text/javascript">
        function valid() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>

</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Member Sign up</h4>

                </div>

            </div>
            <div class="row">

                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            SIGN UP FORM
                        </div>
                        <div class="panel-body">
                            <form name="signup" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label>Enter First Name:</label>
                                    <input class="form-control" type="text" name="fname" autocomplete="off" required />

                                </div>


                                <div class="form-group">
                                    <label>Enter Last Name:</label>
                                    <input class="form-control" type="text" name="lname" autocomplete="off" required />
                                </div>

                                <div class="form-group">
                                    <label>Enter Email Address:</label>
                                    <input class="form-control" type="email" name="email" id="emailid" autocomplete="off" required />
                                    <span id="user-availability-status" style="font-size:12px;"></span>
                                </div>

                                <div class="form-group">
                                    <label>Enter Password:</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password </label>
                                    <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
                                </div>
                                <button type="submit" name="signup" class="btn btn-info" id="submit">Register Now </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>