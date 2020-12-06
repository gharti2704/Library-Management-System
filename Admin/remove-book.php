<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

$id = $_GET['id'];
$member_id = $_SESSION['member_id'];

$sql = "DELETE FROM selectedBooks WHERE book_id = '$id' AND member_id = '$member_id' ";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo "Error ".mysqli_error($conn);
} else{
    $_SESSION['remove'] = "Book removed scuccessfully";
    $_SESSION['member_id'] = "";
    header('Location: issue-book.php');
}
?>