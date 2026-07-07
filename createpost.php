<?php
include "db.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

if (isset($_POST['submit'])) {

    $title = $conn->real_escape_string($_POST['title']);
    $post = $conn->real_escape_string($_POST['post']);

    $result = $conn->query("INSERT INTO posts (user_id, title, post)
                  VALUES ('$user_id', '$title', '$post')");

    if(!$result){
        die("Insert failed: " . $conn->error);
    }

    header("Location: viewpost.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> create post  </title>
    <link rel="stylesheet" href="stylepost.css">
</head>

<body>

<h2> Create Post </h2>
 
<form method="POST">
    <label> Title : </label> <br>
    <input type="text" name="title" required> <br><br>

    <label> Post : </label> <br>
    <textarea name="post" rows="8" cols="50" required> </textarea> <br><br>

    <button type="submit" name="submit"> Post </button>
</form>

</body>
</html>