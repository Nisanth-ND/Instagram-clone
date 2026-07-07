<?php 
include "db.php";
session_start();

$message = "";

if (isset($_POST['submit'])) {   
    $name = $_POST['name'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE name = '$name'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if($password == $user['password']) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location: dashboard.php");
            exit();
            }
         else {
            $message = "❌ Wrong Password!";
        }
    }   
    else {
        $message = "❌ User not found!";
    }   
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> login </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
<h2> LOGIN </h2>

<form method="POST">
    <input placeholder="Name" type="text" name="name" required> <br><br>
    <input placeholder="Password" type="password" name="password" required> <br><br>

    <button type="submit" name="submit"> Login </button> <br><br>

    <?php if (!empty($message)) { 
        echo "<p class='error'>  $message </p>";
    } ?>
</form>

</div>
</body>
</html>