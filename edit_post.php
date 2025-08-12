<?php
session_start();
include('Db.php');
if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Article updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Edit Article</h2>
<form method="POST" action="">
    <label for="title">Title:</label>
    <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
    
    <label for="content">Content:</label>
    <textarea name="content" required><?php echo $row['content']; ?></textarea><br>

    <button type="submit" name="update">Update Article</button>
</form>

</body>
</html>
