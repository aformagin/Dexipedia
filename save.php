<?php

// checking the request receive is a POST, if not we redirect it back to the login page.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	header("Location:javascript://history.go(-1)");
    exit();
}

if (!isset($_POST['pkmnId'])) {
	header("Location:javascript://history.go(-1)");
    exit();
}

// include the database file so we can make a connection to the database.
require_once 'database.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    $_SESSION['error'] = 'You must be logged in to save a Pokemon!';
    exit();
}

// sanitize all inputs
$pkmnId = $connection->real_escape_string($_POST['pkmnId']);
$user_id = $_SESSION['id'];


$result = $connection->query("SELECT pkmnId FROM favorites WHERE pkmnId LIKE $pkmnId AND id=$user_id");
if (mysqli_num_rows($result) > 0) {
    header("Location: favorites.php");
    exit();
}

if (empty($pkmnId) || empty($user_id)) {
    $_SESSION['error'] = 'Missing inputs.';
	header("Location:javascript://history.go(-1)");
    exit();
}

// insert the pkmnID data into the favorites table
$connection->query("INSERT INTO favorites (`id`, `pkmnId`) VALUES ('$user_id', '$pkmnId')");

// redirect the user to the login page
header("Location: favorites.php");
exit();
