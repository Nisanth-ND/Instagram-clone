<?php
include "db.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$post_id = $_GET['id'];

$result = $conn->query("SELECT * FROM posts WHERE id = $post_id AND user_id = $user_id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> editpost </title>
    <link rel="stylesheet" href="stylepost.css">
</head>

<body>
    <h2> Edit Post </h2>

    <form method="POST">
        <label> Title : </label> <br>
        <input type="text" name="title" value="<?= $row['title'] ?>"> <br><br>
        
        <label> Post : </label> <br>
        <textarea name="post" rows="8" cols="50"><?= $row['post'] ?></textarea> <br><br>
        
        <button type="submit" name="update"> Update </button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $title = $conn->real_escape_string($_POST['title']);
        $post = $conn->real_escape_string($_POST['post']);

        $result = $conn->query("UPDATE posts SET title='$title', post='$post' WHERE id = $post_id AND user_id = $user_id");

        if (!$result) {
            die("Insert failed: " . $conn->error);
        }

        header("Location: viewpost.php");
        exit();
    }
    ?>
</body>
</html>