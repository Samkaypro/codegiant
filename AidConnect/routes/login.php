<?php
require '../db/config.php'; 


$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

$email = $_POST['email']; 
$password = $_POST['password'];


$stmt = $db->prepare("SELECT id, email, password FROM users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    header("Location: ../question.html");
} else {
    echo "Invalid credentials";
}
?>
