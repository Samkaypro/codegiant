<?php
require '../db/config.php'; //database config file
// Establish a database connection
$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

// prepred statements to avoid sql injection
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$stmt = $db->prepare("INSERT INTO users (first_name, last_name, phone_number, username, email, password) VALUES (:first_name, :last_name, :phone_number, :username, :email, :password)");

$stmt->bindParam(':first_name', $first_name);
$stmt->bindParam(':last_name', $last_name);
$stmt->bindParam(':phone_number', $phone_number);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

$stmt->execute();

header("Location: ../sign_in.html"); // Redirect to login page


?>
