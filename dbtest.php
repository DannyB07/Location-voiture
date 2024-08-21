<?php

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "cardex";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
