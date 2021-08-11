<?php
/*This file is used throught the website. Instead of having to rewrite the connection to the database multiple times, we decided to define it here so we can use with the require once function*/
define('DB_SERVER', 'localhost');
define('DB_PORT', '3306');
define('DB_USERNAME', 'velizcaa_pokemonWeb');
define('DB_PASSWORD', 'TMsXhXFQ');
define('DB_NAME', 'velizcaa_pokemonWeb');

$connection = mysqli_connect(
    DB_SERVER,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME,
    DB_PORT
);

if (!$connection) {
    die('Could not connect. ' . mysqli_connect_error());
}
