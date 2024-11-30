<?php
include 'config.php';

$id_pasien = $_GET['id'];

// Update status pasien menjadi "Selesai"
$conn->query("UPDATE pasien SET status = 'Selesai' WHERE id = $id_pasien");

// Kembalikan ke halaman utama
header("Location: index.php");
