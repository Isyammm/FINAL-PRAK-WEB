<?php
// Cek jika session belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "perpustakaan_man1_aljamaly");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data anggota berdasarkan ID
$anggota = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID adalah angka

    // Gunakan prepared statement
    $stmt = $koneksi->prepare("SELECT * FROM anggota WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $anggota = $result->fetch_assoc();
    $stmt->close();

    if (!$anggota) {
        header("Location: dataAnggota.php?error=notfound");
        exit();
    }
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']); // Pastikan ID tetap angka
    $nama = htmlspecialchars($_POST['nama']);
    $nis = htmlspecialchars($_POST['nis']);
    $email = htmlspecialchars($_POST['email']);
    $foto = $anggota['foto']; // Default ke foto lama

    // Cek jika ada file foto yang diunggah
    if (!empty($_FILES['foto']['name'])) {
        $foto_name = time() . "_" . basename($_FILES['foto']['name']); // Tambahkan timestamp untuk unik
        $target_dir = "../img/uploads/";
        $target_file = $target_dir . $foto_name;

        // Validasi ekstensi file
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $foto = $foto_name; // Update foto dengan nama baru
            }
        }
    }

    // Update data di database dengan prepared statement
    $stmt = $koneksi->prepare("UPDATE anggota SET nama = ?, nis = ?, email = ?, foto = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nama, $nis, $email, $foto, $id);

    if ($stmt->execute()) {
        header("Location: dataAnggota.php?status=updated");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        /* Style untuk form edit anggota */
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Inter', sans-serif;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            margin-top: 60px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: green;
            outline: none;
            box-shadow: 0 0 5px rgba(12, 228, 59, 0.84);
        }

        button {
            width: 100%;
            padding: 12px;
            background: green;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
    </style>
</head>
<body>
    <h2>Edit Data Anggota</h2>
    <form action="update_anggota.php?id=<?= htmlspecialchars($anggota['id']) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($anggota['id']) ?>">
        
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($anggota['nama']) ?>" required><br>
        
        <label>NIS:</label>
        <input type="text" name="nis" value="<?= htmlspecialchars($anggota['nis']) ?>" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($anggota['email']) ?>" required><br>
        
        <label>Foto:</label>
        <input type="file" name="foto"><br>
        <?php if (!empty($anggota['foto'])): ?>
            <img src="../img/uploads/<?= htmlspecialchars($anggota['foto']) ?>" width="100"><br>
        <?php endif; ?>
        
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
