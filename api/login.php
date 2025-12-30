<?php
session_start();
header("Content-Type: application/json");

require "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$username = $data["username"] ?? "";
$password = $data["password"] ?? "";

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $_SESSION["user"] = $username;

    echo json_encode([
        "objket" => "login",
        "status" => "success",
        "message" => "Login successful"
    ]);
} else {
    echo json_encode([
        "objket" => "login",
        "status" => "error",
        "message" => "Invalid username or password"
    ]);
}
