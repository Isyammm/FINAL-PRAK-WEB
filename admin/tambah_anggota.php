<?php
session_start();

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "perpustakaan_man1_aljamaly");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Proses tambah anggota
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $nis = $koneksi->real_escape_string($_POST['nis']);
    $email = $koneksi->real_escape_string($_POST['email']);
    $foto = "";

    // Cek jika ada foto yang diunggah
    if (!empty($_FILES['foto']['name'])) {
        $foto_name = basename($_FILES['foto']['name']);
        $target_dir = "../img/uploads/";
        $target_file = $target_dir . $foto_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Hanya izinkan tipe file tertentu
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $foto = $foto_name; // Simpan nama file ke database
            } else {
                echo "Gagal mengunggah foto.";
                exit();
            }
        } else {
            echo "Format file tidak valid. Gunakan JPG, JPEG, PNG, atau GIF.";
            exit();
        }
    }

    // Simpan data ke database
    $stmt = $koneksi->prepare("INSERT INTO anggota (nama, nis, email, foto) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $nis, $email, $foto);

    if ($stmt->execute()) {
        header("Location: dataAnggota.php?status=success");
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
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        /* Style untuk form tambah anggota */
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
    <h2>Tambah Anggota</h2>
    <form action="tambah_anggota.php" method="post" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        
        <label>NIS:</label>
        <input type="text" name="nis" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Foto:</label>
        <input type="file" name="foto"><br>
        
        <button type="submit">Tambah Anggota</button>
    </form>
</body>
</html>
