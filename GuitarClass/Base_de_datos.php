<?php

$server = 'localhost';
$username = 'root';
$password = '';
$datebase = 'cursoguitarra';

try {
  $conn = new PDO("mysql:host=$server;dbname=$datebase;", $username, $password);
} catch (PDOException $e) {
  die('Connected Failed: ' . $e->getMesage());
}

?>
