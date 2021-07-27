<?php

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
