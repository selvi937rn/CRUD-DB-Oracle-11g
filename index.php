<?php
require 'connection.php';

// Query untuk menampilkan data dari tabel PEKERJA
$query = "SELECT * FROM PEKERJA ORDER BY ID_PEKERJA ASC";
$stmt = oci_parse($connection, $query);
oci_execute($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pekerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-gray-100 d-flex">

<!-- Sidebar -->
<aside class="sidebar bg-dark text-white p-4">
    <div class="text-center mb-4">
        <h3>HR</h3>
    </div>
    <br><br>
    <nav>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fa-solid fa-file-medical"></i> Data Pekerja
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-white" href="tambah.php">
                    <i class="fa-solid fa-plus"></i> Tambah Pekerja
                </a>
            </li>
        </ul>
    </nav>
</aside>

<!-- Content Area -->
<main class="main-content p-5">
    <div class="table-container">
        <div class="mb-4">
            <h2 class="fw-bold">Tabel Pekerja</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Pekerja</th>
                        <th>Nama Pekerja</th>
                        <th>No HP</th>
                        <th>Departmen</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = oci_fetch_assoc($stmt)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['ID_PEKERJA']) ?></td>
                            <td><?= htmlspecialchars($row['NAMA_PEKERJA']) ?></td>
                            <td><?= htmlspecialchars($row['NO_HP']) ?></td>
                            <td><?= htmlspecialchars($row['DEPARTMEN']) ?></td>
                            <td><?= htmlspecialchars($row['GAJI']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['ID_PEKERJA'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $row['ID_PEKERJA'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
