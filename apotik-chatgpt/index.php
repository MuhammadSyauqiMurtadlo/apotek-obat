<?php
include 'config.php';

$result = $conn->query("SELECT * FROM pasien");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Daftar Pasien</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Pasien</h1>

    <!-- Button Tambah Pasien -->
    <div class="mb-3">
      <a href="tambah_pasien.php" class="btn btn-success">Tambah Pasien</a>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nama Pasien</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
              <?php if ($row['status'] == 'Menunggu Resep'): ?>
                <a href="ambil_obat.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Ambil Obat</a>
              <?php elseif ($row['status'] == 'Mendapatkan Obat'): ?>
                <a href="pulang.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Pulang</a>
              <?php elseif ($row['status'] == 'Selesai'): ?>
                <!-- Tampilkan button Hapus jika status adalah Selesai -->
                <a href="hapus_pasien.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pasien ini?')">Hapus</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>