<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "perpustakaan_man1_aljamaly");

// Cek koneksi database
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Query untuk mengambil semua data anggota
$query = "SELECT * FROM anggota";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="../CSS/style.css">
    
    <!-- remix icon link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <style>
         @media (max-width: 768px) {
            .header h1 { font-size: 20px; }
            .btn-add { font-size: 12px; padding: 8px 16px; }
            table th, table td { padding: 8px; }
        }
    </style>
</head>
<body>

    <div class="sidebar-dashboard">
        <div class="profile-dashboard">
            <img src="../img/IMG_20230324_215747_185.jpg" alt="">
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
                <table border="1" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                        if ($result && $result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                                // Pastikan path gambar benar
                                $foto_path = !empty($row['foto']) ? "../img/uploads/" . htmlspecialchars($row['foto']) : "../img/default.jpg";

                                echo "<tr>
                                        <td>{$no}</td>
                                        <td>" . htmlspecialchars($row['nama']) . "</td>
                                        <td>" . htmlspecialchars($row['nis']) . "</td>
                                        <td>" . htmlspecialchars($row['email']) . "</td>
                                        <td>
                                            <img src='" . $foto_path . "' 
                                                 alt='Foto Anggota' width='50' 
                                                 onerror=\"this.onerror=null; this.src='../img/default.jpg';\">
                                        </td>
                                        <td>
                                            <button class='btn-edit'><i class='ri-edit-box-line'></i></button>
                                            <button class='btn-delete'><i class='ri-delete-bin-6-fill'></i></button>
                                            <button class='btn-Print'><i class='ri-printer-fill'></i></button>
                                        </td>
                                      </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='6'>Tidak ada data anggota.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>

<?php
// Menutup koneksi
$koneksi->close();
?>
