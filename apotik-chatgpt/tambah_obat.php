<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_obat = $_POST['nama_obat'];
  $stok = $_POST['stok'];

  // Tambahkan obat baru
  $conn->query("INSERT INTO obat (nama_obat, stok) VALUES ('$nama_obat', $stok)");
  header("Location: daftar_obat.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Tambah Obat</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Obat</h1>
    <form method="POST" action="" class="card p-4 shadow-sm">
      <div class="mb-3">
        <label class="form-label">Nama Obat</label>
        <input type="text" name="nama_obat" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
      <a href="daftar_obat.php" class="btn btn-info">Daftar Obat</a>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>