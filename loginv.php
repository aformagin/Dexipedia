<?php

// checking the request receive is a POST, if not we redirect it back to the login page.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

// Checking if the POST request has the email and password inputs.
if (!isset($_POST['email'], $_POST['password'])) {
    header("Location: login.php");
    exit();
}

// include the database file so we can make a connection to the database.
require_once 'database.php';
session_start();

// sanitize all inputs
$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);

// checking if the email or password inputs are empty
if (empty($email) || empty($password)) {
    $_SESSION['error'] = 'Missing inputs.';
    header("Location: login.php");
    exit();
}

// checking if the input email is a valid email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Invalid email.';
    header("Location: login.php");
    exit();
}

// checking if the input email exists in the users table
$result = $connection->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows <= 0) {
    $_SESSION['error'] = 'User not found.';
    header("Location: login.php");
    exit();
}

// if the email exists we pull that row from the database
if ($row = $result->fetch_assoc()) {

    // checking the password input matches the hashed password for the user in the database
    if (!password_verify($password, $row['password'])) {
        $_SESSION['error'] = 'Invalid credentials.';
        header("Location: login.php");
        exit();
    }

    // set the id session variable so we track whether the user is logged in or not
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];

    // redirect the user to the home page of the website
    header("Location: index.php");
    exit();
}
exit();
