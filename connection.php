<?php
// Konfigurasi koneksi ke Oracle Database
$connection = oci_connect('hr', 'hr', 'localhost:1521/orcl');

if (!$connection) {
    $error = oci_error();
    echo "Koneksi ke Oracle gagal: " . $error['message'];
    exit;
}

// // Query untuk menghitung jumlah data dalam tabel SALES
// $sql = 'SELECT count(*) AS TOTAL FROM PEKERJA';

// // Persiapkan statement OCI
// $statement = oci_parse($connection, $sql);

// // Eksekusi query
// oci_execute($statement);

// // Ambil hasil query
// $row = oci_fetch_assoc($statement);
// if ($row) {
//     echo "Total Records in PEKERJA: " . $row['TOTAL'] . "\n";
// } else {
//     echo "Query tidak mengembalikan hasil.\n";
// }

// // Tutup koneksi
// oci_free_statement($statement);
// oci_close($connection);
?>
