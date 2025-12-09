<?php
// Pastikan file database di-include dengan path yang benar
$databaseFile = __DIR__ . '/../config/DataBase.php';
if (!file_exists($databaseFile)) {
    die("Error: File konfigurasi database tidak ditemukan.");
}
include $databaseFile;

// Periksa apakah koneksi database berhasil
if (!isset($conn)) {
    die("Error: Koneksi database tidak tersedia.");
}

// Jalankan query dengan validasi error
$sql = "SELECT * FROM buku_kunjungan ORDER BY tanggal DESC";
$result = $conn->query($sql);
if (!$result) {
    die("Error saat mengambil data: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="../CSS/style.css">

    <!-- remix icon link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- google fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <style>
        @media (max-width: 768px) {
            .header h1 { font-size: 20px; }
            .btn-add { font-size: 12px; padding: 8px 16px; }
            table th, table td { padding: 8px; }
            .pagination span { font-size: 12px; }
            .pagination .page-numbers li a { padding: 4px 8px; }
        }
    </style>
</head>
<body>

    <div class="sidebar-dashboard">
        <div class="profile-dashboard">
            <img src="../img/IMG_20230324_215747_185.jpg" alt="Profile">
            <div class="name">Nur Faiqatunnisa</div>
            <div class="role">Administrator</div>
        </div>
        <ul class="nav-dashboard">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="DataBuku.html">Kelola Data Buku</a></li>
            <li><a href="dataAnggota.html">Kelola Data Anggota</a></li>
            <li><a href="#">Sirkulasi</a></li>
            <li class="nav-header">SETTING</li>
            <li><a href="../home.html">Logout</a></li>
        </ul>
    </div>
                         
    <div class="main-content-dashboard">
        <div class="header-dashboard">
            <div class="menu-icon"><i class="fas fa-bars"></i></div>
            <div class="title">Sistem Informasi Perpustakaan</div>
        </div>

        <div class="content-Dataanggota">
            <div class="Judul-dataanggota">
                <h2>Data Anggota</h2>
            </div>
    
            <div class="Search-Dataanggota">
                <label for="search">Search:</label>
                <input type="text" id="search">
            </div>
    
            <div class="Tabel-anggota">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Kelas</th>
                            <th>Keperluan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id']); ?></td>
                                    <td><?= htmlspecialchars($row['tanggal']); ?></td>
                                    <td><?= htmlspecialchars($row['nama']); ?></td>
                                    <td><?= htmlspecialchars($row['jabatan']); ?></td>
                                    <td><?= htmlspecialchars($row['kelas'] ?? '-'); ?></td>
                                    <td><?= htmlspecialchars($row['keperluan']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">Tidak ada data buku kunjungan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>
