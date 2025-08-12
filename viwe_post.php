<?php
include('db.php');

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE id = '$post_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        echo "<h1>" . $post['title'] . "</h1>";
        echo "<p>" . $post['content'] . "</p>";
    } else {
        echo "Post not found!";
    }
}
?>
