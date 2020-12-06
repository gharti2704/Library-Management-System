<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();

$book_id = $_GET['id'];
$title;
$member_id;
$member_name;
$stock_quantity;
$isIssued = FALSE;

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $sql = "SELECT *FROM selectedBooks WHERE book_id = '$book_id' LIMIT 1 ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $member_id = $row['member_id'];
            $member_name = $row['member_name'];
        }
    }

    $sql = "INSERT INTO borrowedBooks(book_id, title, member_id, member_name, issued_date) 
    VALUES ('$book_id', '$title', '$member_id', '$member_name', CURRENT_DATE() )";
    $result1 = mysqli_query($conn, $sql);
    if (!$result1) {
        echo "Error1 " . mysqli_error($conn);
    }

    if ($result1) {

        $sql = "SELECT stock_quantity FROM books WHERE book_id = '$book_id' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $stock_quantity = $row['stock_quantity'] - 1;
            }
        }

        if (!$result) {
            echo "Error2 " . mysqli_error($conn);
        } else {
            $isIssued = TRUE;
        }
    }



    if ($isIssued) {
        $sql = "UPDATE books SET stock_quantity = '$stock_quantity' WHERE book_id = '$book_id' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql = "DELETE FROM selectedBooks WHERE member_id = '$member_id' AND book_id = '$book_id' ";
            $result = mysqli_query($conn, $sql);
            $_SESSION['msg'] = "Book issued successfully";
            header('location:issue-book.php');
        } else {
            $_SESSION['error'] = "Unable to issue, something went wrong";
        }
    }
}
?>