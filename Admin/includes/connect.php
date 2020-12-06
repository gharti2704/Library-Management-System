<?php 

function connectDB(){

$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "library";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $database);
if(!$connect){
   echo "error ".mysqli_connect_error($connect);
}
return $connect;
}

function closeConnect($connect){
   mysqli_close($connect);
}

?>