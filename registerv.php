<?php

// checking the request receive is a POST, if not we redirect it back to the login page.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.php");
    exit();
}

// Checking if the POST request has the name, email, password and confirm-password inputs.
if (!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm-password'])) {
    header("Location: register.php");
    exit();
}

// include the database file so we can make a connection to the database.
require_once 'database.php';
session_start();

// sanitize all inputs
$name = $connection->real_escape_string($_POST['name']);
$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);
$passwordConfirmation = $connection->real_escape_string($_POST['confirm-password']);

// checking if the name, email, password and confirm-password inputs are empty
if (empty($name) || empty($email) || empty($password) || empty($passwordConfirmation)) {
    $_SESSION['error'] = 'Missing inputs.';
    header("Location: register.php");
    exit();
}

// checking if the input email is a valid email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Invalid email.';
    header("Location: register.php");
    exit();
}

// checking if the password input matches the password-confirmation input
if ($password !== $passwordConfirmation) {
    $_SESSION['error'] = 'Password does not match Password Confirmation.';
    header("Location: register.php");
    exit();
}

// checking if an user with the email input already exists
$result = $connection->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows > 0) {
    $_SESSION['error'] = 'User already exists.';
    header("Location: register.php");
    exit();
}

// hashing the input password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// insert the user data into the users table
$connection->query("INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$hashedPassword')");

// redirect the user to the login page
header("Location: login.php");
exit();
