<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pekerja = $_POST['idPekerja'];
    $nama_pekerja = $_POST['namaPekerja'];
    $no_hp = $_POST['noHp'];
    $departmen = $_POST['departmen'];
    $gaji = $_POST['gaji'];

    $query = "INSERT INTO PEKERJA (ID_Pekerja, nama_pekerja, no_hp, departmen, gaji) 
              VALUES (:id_pekerja, :nama_pekerja, :no_hp, :departmen, :gaji)";
    
    $stmt = oci_parse($connection, $query);

    oci_bind_by_name($stmt, ':id_pekerja', $id_pekerja);
    oci_bind_by_name($stmt, ':nama_pekerja', $nama_pekerja);
    oci_bind_by_name($stmt, ':no_hp', $no_hp);
    oci_bind_by_name($stmt, ':departmen', $departmen);
    oci_bind_by_name($stmt, ':gaji', $gaji);

    if (oci_execute($stmt)) {
        header('Location: index.php');
    } else {
        $e = oci_error($stmt);
        echo "<div class='alert alert-danger'>Error: " . $e['message'] . "</div>";
    }

    oci_free_statement($stmt);
    oci_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pekerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-light d-flex">

<!-- Sidebar -->
<aside class="sidebar bg-dark text-white p-4">
    <div class="text-center mb-4">
        <h3>HR</h3>
    </div>
    <br><br>
    <nav>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">
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
<main class="main-content p-4">
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="fw-bold">Tambah Data Pekerja</h2>
            <br>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="idPekerja" class="form-label">ID Pekerja</label>
                    <input type="number" class="form-control" id="idPekerja" name="idPekerja" required>
                </div>
                <div class="mb-3">
                    <label for="namaPekerja" class="form-label">Nama Pekerja</label>
                    <input type="text" class="form-control" id="namaPekerja" name="namaPekerja" required>
                </div>
                <div class="mb-3">
                    <label for="noHp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="noHp" name="noHp" required>
                </div>
                <div class="mb-3">
                    <label for="departmen" class="form-label">Departmen</label>
                    <input type="text" class="form-control" id="departmen" name="departmen" required>
                </div>
                <div class="mb-3">
                    <label for="gaji" class="form-label">Gaji</label>
                    <input type="number" class="form-control" id="gaji" name="gaji" required>
                </div>
                <button type="submit" class="btn btn-dark">Simpan</button>
            </form>
        </div>
    </div>
</main>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
