<?php
use YourNamespace\Db;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $conn->real_escape_string($_POST['name']);
    $email    = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO vendors (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if ($conn->query($sql) === true) {
        header("Location: ../login.html");
        exit;
    } else {
        echo "Fehler: " . $conn->error;
    }
}
?>
