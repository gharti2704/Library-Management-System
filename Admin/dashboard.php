<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else { ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Library Management System | Admin Dash Board</title>
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
            <h4 class="header-line">ADMIN DASHBOARD</h4>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-success back-widget-set text-center">
              <i class="fa fa-book fa-5x"></i>


              <?php
              $bookListed = 0;
              $sql = "SELECT *FROM books";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $bookListed++;
                }
              }
              ?>
              <h3><?php echo htmlentities($bookListed); ?></h3>
              Books Listed
            </div>
          </div>


          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-info back-widget-set text-center">
              <i class="fa fa-bars fa-5x"></i>
              <?php
              $booksIssued = 0;
              $sql = "SELECT *FROM borrowedBooks";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                  $booksIssued++;
                }
              }
              ?>

              <h3><?php echo htmlentities($booksIssued); ?> </h3>
              Books Issued
            </div>
          </div>


          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-danger back-widget-set text-center">
              <i class="fa fa-users fa-5x"></i>
              <?php
               $registeredMember = 0;
              $sql = "SELECT *FROM members";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $registeredMember++;
                }
              }
              ?>
              <h3><?php echo htmlentities($registeredMember); ?></h3>
              Registered Members
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
            <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">

              <div class="carousel-inner">

                <div class="item active">
                  <img src="assets/img/1.jpg" alt="" />
                </div>

                <div class="item">
                  <img src="assets/img/2.jpg" alt="" />
                </div>

                <div class="item">
                  <img src="assets/img/3.jpg" alt="" />
                </div>

              </div>
              <!--INDICATORS-->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li>
                <li data-target="#carousel-example" data-slide-to="2"></li>
              </ol>
              <!--PREVIUS-NEXT BUTTONS-->
              <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- CONTENT-WRAPPER SECTION END-->
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