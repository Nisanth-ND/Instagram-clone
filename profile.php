<?php
include "db.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

$result = $conn->query("SELECT * FROM users WHERE id = '$user_id'");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

    <h2 class="username"> <?php echo $_SESSION['name']; ?> </h2>
    
<div class="profile-card">
    <p class="profiledetails"> <strong>Name :</strong> <?php echo $user['name']; ?> </p>

    <p class="profiledetails"> <strong>Age :</strong> <?php echo $user['age']; ?> </p>

    <p class="profiledetails"> <strong>Email :</strong> <?php echo $user['email']; ?> </p>

    <br>
</div>

    <button> <a href="dashboard.php"> Dashboard </a> </button>

</div>

</body>
</html>