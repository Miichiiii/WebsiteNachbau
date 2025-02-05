<?php
session_start();
require_once 'db.php';

// Überprüfen, ob der Anbieter eingeloggt ist
if (!isset($_SESSION['vendor_id'])) {
    header("Location: ../login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vendor_id   = $_SESSION['vendor_id'];
    $title       = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $price       = floatval($_POST['price']);
    
    $sql = "INSERT INTO services (vendor_id, title, description, price, created_at) 
            VALUES ('$vendor_id', '$title', '$description', '$price', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../dashboard.html");
        exit;
    } else {
        echo "Fehler: " . $conn->error;
    }
}
?>
