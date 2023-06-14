<?php

$host = "192.168.178.71";
$db = "loginseite";
$name = "input_weatherballon";
$pwd = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$db", $name, $pwd);
} catch (PDOException $e){
    die($e->getMessage());
}