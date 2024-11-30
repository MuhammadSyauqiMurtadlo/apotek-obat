<?php
include 'config.php';

$id_pasien = $_GET['id'];

// Hapus pasien dari database
$conn->query("DELETE FROM pasien WHERE id = $id_pasien");

// Redirect ke halaman utama
header("Location: index.php");
