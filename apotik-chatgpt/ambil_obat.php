<?php
include 'config.php';

$id_pasien = $_GET['id'];

// Ambil daftar obat dari database
$obat_result = $conn->query("SELECT * FROM obat");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_obat = $_POST['id_obat'];

  // Masukkan obat yang dipilih ke dalam resep
  $conn->query("INSERT INTO resep_obat (id_pasien, id_obat) VALUES ($id_pasien, $id_obat)");

  // Kurangi stok obat
  $conn->query("UPDATE obat SET stok = stok - 1 WHERE id = $id_obat");

  // Update status pasien menjadi "Mendaptkan Obat"
  $conn->query("UPDATE pasien SET status = 'Mendapatkan Obat' WHERE id = $id_pasien");

  // Kembalikan ke halaman utama
  header("Location: index.php");
}
?>



<!DOCTYPE html>
<html>

<head>
  <title>Pilih Obat</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Pilih Obat untuk Pasien</h1>
    <form method="POST" action="" class="card p-4 shadow-sm">
      <div class="mb-3">
        <label class="form-label">Pilih Obat</label>
        <select name="id_obat" class="form-select" required>
          <?php while ($row = $obat_result->fetch_assoc()): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_obat']; ?> (Stok: <?php echo $row['stok']; ?>)</option>
          <?php endwhile; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Ambil Obat</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
      <a href="tambah_obat.php" class="btn btn-success mt-3">Tambah Obat</a>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>