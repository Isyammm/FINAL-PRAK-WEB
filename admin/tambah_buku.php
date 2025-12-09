<?php
include '../config/DataBase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];

    // Upload Gambar
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "../img/SampulBuku/";
    $target_file = $target_dir . basename($gambar);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    // Insert Data ke Database
    $query = "INSERT INTO buku (judul, pengarang, penerbit, gambar) VALUES ('$judul', '$pengarang', '$penerbit', '$gambar')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Buku berhasil ditambahkan!'); window.location='DataBuku.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan buku!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
         
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
    <h2>Tambah Data Buku</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Judul Buku:</label>
        <input type="text" name="judul" required><br>

        <label>Pengarang:</label>
        <input type="text" name="pengarang" required><br>

        <label>Penerbit:</label>
        <input type="text" name="penerbit" required><br>

        <label>Gambar:</label>
        <input type="file" name="gambar" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
