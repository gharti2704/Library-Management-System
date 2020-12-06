<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

$id = $_GET['id'];
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');

} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_GET['id'];
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $author_fname = $_POST['author_fname'];
        $author_lname = $_POST['author_lname'];
        $released_year = $_POST['released_year'];
        $stock_quantity = $_POST['stock_quantity'];


        $update = "UPDATE books SET isbn = '$isbn', title = '$title', author_fname = '$author_fname', author_lname = '$author_lname', released_year = '$released_year', stock_quantity = '$stock_quantity' WHERE book_id = '$id' ";
        if (mysqli_query($conn, $update)) {
            $_SESSION['msg'] = "Book updated successfully";
            header('Location: manage-books.php');
        } else {
            $_SESSION['error'] = "Unable to update at this time";
            echo "Unable to update". mysqli_error($conn);
            
        }
    } else {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <title>Library Management System | Edit Book</title>
            <!-- BOOTSTRAP CORE STYLE  -->
            <link href="assets/css/bootstrap.css" rel="stylesheet" />
            <!-- FONT AWESOME STYLE  -->
            <link href="assets/css/font-awesome.css" rel="stylesheet" />
            <!-- CUSTOM STYLE  -->
            <link href="assets/css/style.css" rel="stylesheet" />
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
                            <h4 class="header-line">Edit Book</h4>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <div class=" panel panel-info">
                                <div class="panel-heading">
                                    Book Info
                                </div>
                                <div class="panel-body">

                                    <?php
                                    $sql = "SELECT *FROM books WHERE book_id = '$id' ";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <form action="edit-book.php?id=<?php echo $id ?>" role="form" method="post">

                                                <div class="form-group">
                                                    <label>ISBN Number<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="isbn" value="<?php echo htmlentities($row['isbn']); ?>" required>
                                                    <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
                                                </div>

                                                <div class="form-group">
                                                    <label>Title<span style="color:red;">*</span></label>
                                                    <input type="text" class="form-control" name="title" value="<?php echo htmlentities($row['title']); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Author First Name<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="author_fname" value="<?php echo htmlentities($row['author_fname']); ?>" required >
                                                </div>

                                                <div class="form-group">
                                                    <label>Author Last Name<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="author_lname" value="<?php echo htmlentities($row['author_lname']); ?>" required >
                                                </div>

                                                <div class="form-group">
                                                <label>Released Year<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="released_year" value="<?php echo htmlentities($row['released_year']); ?>" required >
                                                </div>
                                                
                                                <div class="form-group">
                                                <label>Stock Quantity<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="stock_quantity" value="<?php echo htmlentities($row['stock_quantity']); ?>" required >
                                                </div>
                                                <button type="submit" name="update" class="btn btn-info"> Update </button>
                                                </form>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <?php include('includes/footer.php'); ?>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="assets/js/jquery-1.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
        </body>

        </html>
    <?php } ?>