<?php
include 'config.php';

// Ambil daftar obat dari database
$result = $conn->query("SELECT * FROM obat");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Daftar Obat</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Obat</h1>
    <a href="tambah_obat.php" class="btn btn-primary mb-3">Tambah Obat</a>
    <a href="tambah_obat.php" class="btn btn-secondary mb-3">Kembali</a>
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Nama Obat</th>
          <th>Stok</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['nama_obat']; ?></td>
            <td><?php echo $row['stok']; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>