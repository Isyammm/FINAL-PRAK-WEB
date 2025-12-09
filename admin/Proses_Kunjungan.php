<?php
// Pastikan file database ada sebelum di-include
$databaseFile = __DIR__ . '/../config/DataBase.php';
if (!file_exists($databaseFile)) {
    die("Error: File konfigurasi database tidak ditemukan.");
}
include $databaseFile;

// Periksa apakah koneksi database sudah tersedia
if (!isset($conn)) {
    die("Error: Koneksi database tidak tersedia.");
}

// Pastikan data form dikirim sebelum diproses
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tanggal = $_POST['tanggal'] ?? null;
    $nama = $_POST['nama'] ?? null;
    $jabatan = $_POST['jabatan'] ?? null;
    $kelas = $_POST['kelas'] ?? null;
    $keperluan = $_POST['keperluan'] ?? null;

    if (!$tanggal || !$nama || !$jabatan || !$keperluan) {
        die("Error: Semua field wajib diisi.");
    }

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO buku_kunjungan (tanggal, nama, jabatan, kelas, keperluan) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sssss", $tanggal, $nama, $jabatan, $kelas, $keperluan);
    
    if ($stmt->execute()) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error saat menyimpan data: " . $stmt->error;
    }

    $stmt->close();
}
?>
