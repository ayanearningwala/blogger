<?php
session_start();
include('Db.php');
if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM posts WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Post deleted successfully!";
        header("Location: Dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
