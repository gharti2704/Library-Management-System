
<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

$id = $_GET['id'];
$sql = "DELETE FROM books WHERE book_id = '$id' ";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo "Error ".mysqli_error($conn);
} else{
    $_SESSION['delmsg'] = "Book deleted scuccessfully";
    header('Location: manage-books.php');
}
?>