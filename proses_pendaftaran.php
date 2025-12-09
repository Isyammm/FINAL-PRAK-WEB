<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debugging: Menampilkan data POST yang dikirim
    echo "<pre>";
    var_dump($_POST);
    var_dump($_FILES);
    echo "</pre>";

    // Pastikan semua data diisi dengan benar
    if (!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['tanggal_lahir']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        
        $nama = trim($_POST['nama']);
        $nis = trim($_POST['nis']);
        $tanggal_lahir = trim($_POST['tanggal_lahir']); 
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Cek file upload
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
            $fileTmpPath = $_FILES['foto']['tmp_name'];
            $fileName = $_FILES['foto']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            if (in_array($fileExtension, $allowedExtensions)) {
                $uploadDir = '../img/uploads/';
                $newFileName = time() . '_' . uniqid() . '.' . $fileExtension;
                $filePath = $uploadDir . $newFileName;

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpPath, $filePath)) {
                    echo "File berhasil di-upload.<br>";
                } else {
                    echo "Gagal upload file.";
                    exit();
                }
            } else {
                echo "Format file tidak valid!";
                exit();
            }
        } else {
            echo "File foto belum diupload!";
            exit();
        }

        // Koneksi ke database
        $mysqli = new mysqli('localhost', 'root', '', 'perpustakaan_man1_aljamaly');
        if ($mysqli->connect_error) {
            die("Koneksi gagal: " . $mysqli->connect_error);
        }

        // Simpan ke database
        $query = "INSERT INTO anggota (nama, nis, tanggal_lahir, email, password, foto) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("ssssss", $nama, $nis, $tanggal_lahir, $email, $hashed_password, $filePath);
            if ($stmt->execute()) {
                echo "Pendaftaran berhasil!";
            } else {
                echo "Error dalam pendaftaran: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error dalam query: " . $mysqli->error;
        }

        $mysqli->close();
    } else {
        echo "Semua data wajib diisi dengan benar.";
    }
} else {
    echo "Form belum disubmit.";
}
?>
