<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $status = $_POST['status'];

  // Masukkan data pasien baru
  $sql = "INSERT INTO pasien (nama, status) VALUES ('$nama', '$status')";
  if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Tambah Pasien</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Pasien</h1>
    <form method="POST" action="" class="card p-4 shadow-sm">
      <div class="mb-3">
        <label class="form-label">Nama Pasien</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="Menunggu Resep">Menunggu Resep</option>
          <option value="Mendapatkan Obat">Mendapatkan Obat</option>
          <option value="Selesai">Selesai</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>