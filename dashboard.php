<?php
session_start();
include('Db.php');
if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
    exit();
}

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Welcome to your Dashboard</h2>
<a href="Add_article.php">Add New Article</a><br>

<?php
$sql = "SELECT * FROM posts WHERE author='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div><h3>" . $row['title'] . "</h3>
        <a href='View.php?id=" . $row['id'] . "'>View</a> |
        <a href='Edit_post.php?id=" . $row['id'] . "'>Edit</a> |
        <a href='Delete_post.php?id=" . $row['id'] . "'>Delete</a></div>";
    }
} else {
    echo "No posts found!";
}
?>

</body>
</html>
