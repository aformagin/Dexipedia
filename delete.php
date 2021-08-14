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
    exit();
}

// sanitize all inputs
$pkmnId = $connection->real_escape_string($_POST['pkmnId']);
$user_id = $_SESSION['id'];


if (empty($pkmnId) || empty($user_id)) {
    $_SESSION['error'] = 'Missing inputs.';
    echo $pkmnId;
	header("Location:javascript://history.go(-1)");
    exit();
}

// Remove from table
$connection->query("DELETE FROM favorites WHERE pkmnId=$pkmnId AND id=$user_id");

// redirect the user to the login page
header("Location: favorites.php");
exit();
