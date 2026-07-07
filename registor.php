<?php include "db.php";

$error = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $check = $conn->query("SELECT id FROM users WHERE email = '$email'");

    if ($check->num_rows > 0) {
        $error = "This email is already registered. Please use another email.";
    } else {
        $conn->query("INSERT INTO users (name, password, age, email)
                  VALUES ('$name', '$password', '$age', '$email')");
                  
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> register </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
<h2> REGISTER </h2> <br>

<form method="POST">
    <input placeholder="Name" type="text" name="name" required><br><br>
    <input placeholder="Password" type="password" name="password" required><br><br>
    <input placeholder="Age" type="number" name="age" required><br><br>
    <input placeholder="Email" type="email" name="email" required><br><br>

    <button type="submit" name="submit"> Sign up </button>

    <p class="error"><?php echo $error; ?></p>
</form>
</div>

</body>
</html>