<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM vendors WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $vendor = $result->fetch_assoc();
        if (password_verify($password, $vendor['password'])) {
            $_SESSION['vendor_id'] = $vendor['id'];
            $_SESSION['vendor_name'] = $vendor['name'];
            header("Location: ../dashboard.html");
            exit;
        } else {
            echo "Ungültiges Passwort.";
        }
    } else {
        echo "Benutzer nicht gefunden.";
    }
}
?>
