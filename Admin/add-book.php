<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $author_fname = $_POST['author_fname'];
        $author_lname = $_POST['author_lname'];
        $released_year = $_POST['released_year'];
        $stock_quantity = $_POST['stock_quantity'];

        $sql = "INSERT INTO  books (isbn, title, author_fname, author_lname, released_year, stock_quantity) VALUES ('$isbn','$title', '$author_fname', '$author_lname', '$released_year', '$stock_quantity')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['msg'] = "Book added successfully";
            header('location:manage-books.php');
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again";
            header('location:manage-books.php');
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <title>Library Management System | Add Book</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <!-- GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Add Book</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <div class=" panel panel-info">
                            <div class="panel-heading">
                                Book Info
                            </div>
                            <div class="panel-body">


                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>ISBN Number<span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" name="isbn" required autocomplete="off">
                                        <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique.</p>
                                    </div>


                                    <div class="form-group">
                                        <label>Title<span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" name="title" autocomplete="off" required>
                                    </div>


                                    <div class="form-group">
                                        <label>Author First Name <span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" name="author_fname" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Author Last Name <span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" name="author_lname" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Released Year<span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" name="released_year" autocomplete="off" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label>Stock Quantity<span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" name="stock_quantity" autocomplete="off" required="required">
                                    </div>
                                    <button type="submit" name="add" class="btn btn-info">Add </button>

                                </form>
                            </div>
                        </div>
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
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>