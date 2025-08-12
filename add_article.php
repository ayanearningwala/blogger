<?php
session_start();
include('Db.php');
if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['email'];
    
    $sql = "INSERT INTO posts (title, content, author) VALUES ('$title', '$content', '$author')";
    if ($conn->query($sql) === TRUE) {
        echo "New article added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Article</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Add New Article</h2>
<form method="POST" action="">
    <label for="title">Title:</label>
    <input type="text" name="title" required><br>
    
    <label for="content">Content:</label>
    <textarea name="content" required></textarea><br>

    <button type="submit" name="submit">Add Article</button>
</form>

</body>
</html>
