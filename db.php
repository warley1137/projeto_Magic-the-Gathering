<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "collection";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
