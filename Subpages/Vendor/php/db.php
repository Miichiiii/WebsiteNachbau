<?php
// Verbindung zur MySQL-Datenbank herstellen
$servername = "localhost";
$username = "db_user";
$password = "db_password";
$dbname = "marketplace_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
