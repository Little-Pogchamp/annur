<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_yayasan_annur";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi Database Gagal: " . $conn->connect_error);
}

// Fungsi proteksi role Admin
function checkAdmin() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header("Location: login.php?msg=unauthorized");
        exit;
    }
}
?>