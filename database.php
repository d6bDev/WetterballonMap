<?php
$host = "localhost";
$db = "Weatherballon";
$name = "input_waetherballon";
$pwd = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$db", $name, $pwd);
} catch (PDOException $e) {
    die($e->getMessage());
}