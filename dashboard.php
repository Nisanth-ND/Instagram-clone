<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> dashboard </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h1> Instagram Dashboard </h1>

    <h2> <?php echo "Welcome, " . $_SESSION['name']; ?> 👋</h2>

    <button> <a href="createpost.php"> Create Post </a> </button> <br><br>

    <button> <a href="viewpost.php"> View Posts </a> </button> <br><br>

    <button> <a href="profile.php"> Profile </a> </button> <br><br>

    <button> <a href="logout.php"> Logout </a> </button> <br><br>   
</div>

</body>
</html>