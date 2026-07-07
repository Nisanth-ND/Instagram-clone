<?php
$conn = new mysqli("localhost", "root", "", "instagram");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>