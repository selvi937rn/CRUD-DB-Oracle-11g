<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $id_pekerja = $_GET['id'];

    // Query untuk menghapus data pekerja berdasarkan ID
    $query = "DELETE FROM PEKERJA WHERE ID_Pekerja = :id_pekerja";
    $stmt = oci_parse($connection, $query);

    // Bind parameter
    oci_bind_by_name($stmt, ':id_pekerja', $id_pekerja);

    // Eksekusi query hapus
    if (oci_execute($stmt)) {
        echo "<div class='alert alert-success'>Data berhasil dihapus!</div>";
    } else {
        $e = oci_error($stmt);
        echo "<div class='alert alert-danger'>Error: " . $e['message'] . "</div>";
    }

    // Bebaskan statement dan tutup koneksi
    oci_free_statement($stmt);
    oci_close($connection);

    // Redirect ke halaman utama setelah operasi selesai
    header("Location: index.php");  // Sesuaikan dengan nama file halaman utama Anda
    exit();
} else {
    echo "<div class='alert alert-danger'>ID Pekerja tidak ditemukan!</div>";
}
?>
