<?php
include "db.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

$result = $conn->query("SELECT * FROM posts WHERE user_id = '$user_id'");
?>

<!DOCTYPE html>
<html>

<head>
    <title> View Posts </title>
    <link rel="stylesheet" href="stylepost.css">
</head>

<body>

<h2> All Posts </h2>

<div class="btn-top">
    <button> <a href="createpost.php"> Add </a> </button>
    <button class="dash-btn"> <a href="dashboard.php"> Dashboard </a> </button> <br><br>
</div>

<?php while($row = $result->fetch_assoc()) { ?>

<div class="container">
<div>
    <h3><?= $row['title']; ?></h3>
    <p><?= $row['post']; ?></p>
</div>

<div class="btn-container">
    <button> <a href="editpost.php?id=<?= $row['id'] ?>"> Edit </a> </button>
    <button> <a href="deletepost.php?id=<?= $row['id'] ?>" onclick = "return confirm('Are you sure you want to delete this post?')"> Delete </a> </button>
</div>
</div>

<?php } ?>

</body>
</html>