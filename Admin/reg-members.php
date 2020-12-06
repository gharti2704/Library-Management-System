<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();


if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    //code to remove members
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $status = 1;
        $sql = "DELETE FROM members WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location:reg-members.php');
        }
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Management System | Manage Registered Members</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet">
        <!-- DATATABLE STYLE  -->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- GOOGLE FONT -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->

    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Manage Registered Members</h4>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Registered Members
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Member ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT *FROM members";
                                            $result = mysqli_query($conn, $sql);
                                            $cnt = 1;
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['id']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['fname']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['lname']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['email']); ?></td>
                                                        <td class="center"><?php if ($row['status'] == "") { ?>
                                                        <button class="btn-block btn-success"> <?php echo htmlentities("Active");}?> </button>
                                                        </td>
                                                        <td class="center">
                                                            <a href="reg-members.php?id=<?php echo htmlentities($row['id']); ?>" onclick="return confirm('Are you sure you want to delete this member?');"><button class="btn btn-danger">Remove</button></a>
                                                        </td>
                                                    </tr>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php'); ?>
        <!-- FOOTER SECTION END-->
        
        <!-- CORE JQUERY  -->
        <script src="assets/js/jquery-1.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- DATATABLE SCRIPTS  -->
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>