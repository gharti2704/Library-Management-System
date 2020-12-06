<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

$id = $_SESSION['memberID'];

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $sql = "UPDATE members SET fname = '$fname', lname = '$lname' WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo '<script>alert("Sorry we are unable to update this time.")</script>';
        } else {
            echo '<script>alert("Your profile has been updated")</script>';
        }
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Library Management System | My Profile</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet">
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">My Profile</h4>

                    </div>

                </div>
                <div class="row">

                    <div class="col-md-9 col-md-offset-1">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                My Profile
                            </div>
                            <div class="panel-body">
                                <form name="signup" method="post">
                                    <?php
                
                                    $sql = "SELECT *FROM members WHERE id = '$id' ";
                                    $result = mysqli_query($conn, $sql);

                        
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) { ?>

                                            <div class="form-group">
                                                <label>MEMBER ID: </label>
                                                <?php echo htmlentities($row['id']) ?>
                                            </div>

                                            <div class="form-group">
                                                <label>First Name: </label>
                                                <?php echo htmlentities($row['fname']); ?>
                                            </div>

                                            <div class="form-group">
                                                <label>Last Name: </label>
                                                <?php echo htmlentities($row['lname']); ?>
                                            </div>

                                            <div class="form-group">
                                                <label>Email Address: </label>
                                                <?php echo htmlentities($row['email']); ?>
                                            </div>
                                           
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9 col-md-offset-1">
                        <span class="text-info">*Update your information below.</span>
                        <div class="form-group">
                            <label>Enter First Name:</label>
                            <input class="form-control" type="text" name="fname" value="<?php echo htmlentities($row['fname']); ?>" autocomplete="off" required />
                        </div>


                        <div class="form-group">
                            <label>Enter Last Name:</label>
                            <input class="form-control" type="text" name="lname" maxlength="10" value="<?php echo htmlentities($row['lname']); ?>" autocomplete="off" required />
                        </div>

                        <div class="form-group">
                            <label>Enter Email Address</label>
                            <input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($row['email']); ?>" autocomplete="off" required />
                        </div>
                <?php }
                                    } ?>

                <button type="submit" name="update" class="btn btn-info" id="submit">Update</button>
                <span>|<a href="member-forgot-password.php">Change Password</a></span>
                </form>
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
<?php } ?>