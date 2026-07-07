<?php 
include "db.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$post_id = $_GET['id'];

$conn->query("DELETE FROM posts WHERE id = $post_id AND user_id = $user_id");

header("Location: viewpost.php");
?> 