<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();


if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $id = $_SESSION['memberID']; ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Library Management System | Books Borroed</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Books Borrowed</h4>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Books Borrowed
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Book ID</th>
                                                    <th>Book Title</th>
                                                    <th>Issued Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT *FROM borrowedBooks WHERE member_id = $id";
                                                $result = mysqli_query($conn, $sql);
                                                $cnt = 1;
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {               ?>
                                                        <tr class="odd gradeX">
                                                            <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                            <td class="center"><?php echo htmlentities($row['book_id']); ?></td>
                                                            <td class="center"><?php echo htmlentities($row['title']); ?></td>
                                                            <td class="center"><?php echo htmlentities($row['issued_date']); ?></td>

                                                        </tr>
                                                <?php $cnt++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php'); ?>

    </body>

    </html>
<?php } ?>