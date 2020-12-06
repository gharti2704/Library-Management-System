<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
        $id = $_GET['id'];
        $stock_quantity; $member_id;  
        $isReturned = FALSE;  
        
        $sql = "SELECT member_id FROM borrowedBooks WHERE book_id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $member_id = $row['member_id'];
            }
        }

        $sql = "DELETE FROM borrowedBooks WHERE book_id = '$id' AND member_id = '$member_id' ";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $sql = "SELECT stock_quantity FROM books WHERE book_id = '$id' ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $stock_quantity = $row['stock_quantity'] + 1;
                }
                $isReturned = TRUE;
            }
            if($isReturned){
                $sql = "UPDATE books SET stock_quantity = '$stock_quantity' WHERE book_id = '$id' ";
                $result = mysqli_query($conn, $sql);
                $_SESSION['msg'] = "Book Returned successfully";
                header('location:return-books.php');  
            }
            }
        else{$_SESSION['error'] = "Something went wrong, Please try again";}
        }
?>