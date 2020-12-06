<?php
session_start();
error_reporting(0);
include('includes/connect.php');
$conn = connectDB();
$member_id = $_SESSION['memberID'];
$book_id = $_GET['id'];
$title;
$member_name;

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $sql = "SELECT title FROM books WHERE book_id = '$book_id' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
        }
    }

    $sql = "SELECT CONCAT(fname, ', ', lname) AS fullName FROM members WHERE id = '$member_id' ";
    $result1 = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $member_name = $row['fullName'];
        }
    }


    $insert = "INSERT INTO selectedBooks (member_id, member_name, book_id, title) VALUES ('$member_id', '$member_name', '$book_id', '$title') ";
    $result2 = mysqli_query($conn, $insert);


    if ($result2) {

        $_SESSION['message'] = "Successfully added. Please see librarian.";
        header('Location: view-books.php');
    }
}
?>