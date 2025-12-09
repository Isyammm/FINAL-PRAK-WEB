<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "perpustakaan_man1_aljamaly");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Cek apakah ada ID anggota dikirim lewat GET
if (isset($_GET['id'])) {
    $id_anggota = intval($_GET['id']); // Konversi ke integer untuk keamanan

    // Cek apakah ID ada di database
    $query_foto = $koneksi->prepare("SELECT foto FROM anggota WHERE id = ?");
    $query_foto->bind_param("i", $id_anggota);
    $query_foto->execute();
    $result = $query_foto->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $foto = $data['foto'];

        // Hapus data anggota dari database
        $delete_query = $koneksi->prepare("DELETE FROM anggota WHERE id = ?");
        $delete_query->bind_param("i", $id_anggota);

        if ($delete_query->execute()) {
            // Hapus foto jika bukan default.jpg
            if ($foto != "default.jpg") {
                $foto_path = __DIR__ . "/img/uploads/" . $foto;
                if (file_exists($foto_path)) {
                    unlink($foto_path); // Hapus foto
                }
            }

            // Redirect setelah sukses hapus
            header("Location: dataAnggota.php?status=deleted");
            exit();
        } else {
            echo "❌ Gagal menghapus data anggota: " . $delete_query->error;
        }
    } else {
        echo "⚠️ Data anggota tidak ditemukan.";
    }

    $query_foto->close();
} else {
    echo "⚠️ ID anggota tidak dikirim.";
}

$koneksi->close();
?>
