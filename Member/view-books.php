<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Library Management System | View Books</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet">
        <!-- DATATABLE STYLE  -->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet">
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
                        <h4 class="header-line">View Books</h4>
                    </div>
                    <div class="row">

                        <?php if ($_SESSION['message'] != "") { ?>
                            <div class="col-md-6">
                                <div class="alert alert-success">
                                    <strong>Success :</strong>
                                    <?php echo htmlentities($_SESSION['message']); ?>
                                    <?php echo htmlentities($_SESSION['message'] = ""); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-*">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Books Listing
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Book ID</th>
                                                <th>ISBN</th>                                            
                                                <th>Title</th>
                                                <th>Author F.Name</th>
                                                <th>Author L. Name</th>   
                                                <th>Released Year</th>
                                                <th>Stock Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
        
                                            $sql = "SELECT *FROM books";
                                            $result = mysqli_query($conn, $sql);
                        
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) { 
                                                    $id = $row['book_id']; ?>
                                                
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($row['book_id']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['isbn']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['title']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['author_fname']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['author_lname']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['released_year']); ?></td>
                                                        <td class="center"><?php echo htmlentities($row['stock_quantity']); ?></td>
                                                        <td class="center">
                                                            <a href="savedBook.php?id=<?php echo $id; ?>">
                                                                <button id = <?php echo $id ?> class="btn btn-primary"><i class="fa fa-check "></i> SELECT </button> </a>
                                                        
                                                        </td>
                                                    </tr>
                                            <?php 
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
        <script src="assets/js/jquery-2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- DATATABLE SCRIPTS  -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>




