<?php
session_start();
include('Db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Article</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2><?php echo $row['title']; ?></h2>
<p><?php echo $row['content']; ?></p>

</body>
</html>
