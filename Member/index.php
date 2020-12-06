<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

$_SESSION['memberID'] = " ";
if($_SESSION['login']!=''){
$_SESSION['login']='';
}

if($_SERVER['REQUEST_METHOD'] == "POST"){ 
$email = $_POST['email'];
$password = md5($_POST['password']);
$isLogedIn = TRUE;

$sql = "SELECT *FROM members";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if(!($email == $row['email'] && $password == $row['password'])){
              $isLogedIn = FALSE;
            }else {
              $_SESSION['login'] = $_POST['email'];
              $_SESSION['memberID'] = $row['id'];
              header('Location: my-profile.php');
                
            }
        }
        if(!$isLogedIn){
          echo "<script>alert('Invalid Details');</script>";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Library Management System | </title>
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
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">MEMBER LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Email Address:</label>
<input class="form-control" type="text" name="email" required autocomplete="off" />
</div>
<div class="form-group">
<label>Password:</label>
<input class="form-control" type="password" name="password" required autocomplete="off"  />
<span class="help-block"><a href="member-forgot-password.php">Forgot Password</a></span>
</div>

 <button type="submit" name="login" class="btn btn-info">LOGIN </button> <span>| <a href="signup.php">Not Registered Yet</a></span>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PANEL END-->            
             
 
    </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
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
