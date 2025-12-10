<?php
include 'config/DataBase.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
    <!-- Box Icon link -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <!-- remix icon link -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- google fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Oswald:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playwrite+AU+SA+Guides&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Oleo+Script:wght@400;700&family=Playwrite+AU+SA+Guides&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</head>
<body >

    <header class="header">
        <div class="logo">
          <img src="img/LogoMansa1.png" alt="Coffee Shop Logo" />
          <div>
            <p>AL <span>JAMALY</span></p>
          </div>
        </div>
  
        <nav class="navbar">
          <a href="home.html#home" class="nav-link">Home</a>
          <a href="home.html#about" class="nav-link">About</a>
          <a href="home.html#Services" class="nav-link">Layanan</a>
          <a href="BukuPelajaran.html" class="nav-link">E-Pustaka</a>
          <a href="home.html#contac" class="nav-link">Contact</a>
        </nav>
  
        <div class="icons">
          <div class="ordernow"><a href="login.html">Login</a></div>
          <div id="menubar" class="fas fa-bars"></div>
        </div>
    </header>

    <div class="body-conteiner-Kunjungan">
        <div class="header-kunjungan">
            <div class="container-Kunjungan">
                <h2>BUKU KUNJUNGAN</h2>
            </div>
        </div>

        <div id="BukuKujungan">
            <form action="../admin/Proses_Kunjungan.php" method="POST">
                <label for="inputpassword">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" required>
                
                <label for="inputtext">Nama</label>
                <input type="text" id="nama" name="nama" required> 

                <label for="Jabatan">Jabatan</label>
                <select name="jabatan" id="jabatan" name="jabatan" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <option value="siswa/i">Siswa/i</option>
                    <option value="guru">Guru/staf</option>
                    <option value="umum">Umum</option>
                </select> 

                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas" name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X Mipa 1">X Mipa 1</option>
                    <option value="X Mipa 2">X Mipa 2</option>
                    <option value="X Mipa 3">X Mipa 3</option>
                    <option value="X IPS 1">X IPS 1</option>
                    <option value="X IPS 2">X IPS 2</option>
                    <option value="X IPS 3">X IPS 3</option>
                    <option value="X agama">X agama</option>
                    
                    <option value=" XI Mipa 1">XI Mipa 1</option>
                    <option value="XI Mipa 2">XI Mipa 2</option>
                    <option value="XI Mipa 3">XI Mipa 3</option>
                    <option value="XI IPS 1">XI IPS 1</option>
                    <option value="XI IPS 2">XI IPS 2</option>
                    <option value="XI IPS 3">XI IPS 3</option>
                    <option value="XI agama">XI agama</option>
                    
                    <option value="XII Mipa 1">XII Mipa 1</option>
                    <option value="XII Mipa 2">XII Mipa 2</option>
                    <option value="XII Mipa 3">XII Mipa 3</option>
                    <option value="XII IPS 1">XII IPS 1</option>
                    <option value="XII IPS 2">XII IPS 2</option>
                    <option value="XII IPS 3">XII IPS 3</option>
                    <option value="XII agama">XII agama</option>  

                    <option value="Lainya...">Lainya...</option>
                </select> 

                <label for="kelas">Keperluan</label>
                <select name="keperluan" id="keperluan" name="keperluan" required>
                    <option value="">-- Pilih Keperluan --</option>
                    <option value="Meminjam Buku">Meminjam Buku</option>
                    <option value="Membaca">Membaca</option>
                    <option value="Lainya">Lainya....</option>
                </select> 

                <button type="submit"> KIRIM </button>

            </form>
        </div>
    </div>

     <!-- Halaman Footer -->
        <div>
            <footer >
                <div class="footer-main" style="background-color: #fafafa;">
                    <div class="footer-logo">
                        <img src="../img/LogoMansa1.png" alt="Logo">
                        <div>
                            <p>Al-Jamaly</p>
                        </div>
                        
                    </div>

                    <div class="footer-media">
                        <h3>Sosial Media</h3>
                        <p><a href=""><i class="ri-youtube-fill"></i></a><a href=""><i class="ri-instagram-fill"></i></a><a href=""><i class="ri-facebook-box-fill"></i></a><a href=""><i class="ri-tiktok-fill"></i></a></p>
                    </div>
                    
                    <div class="footer-contact">
                        <div>
                            <h3>Contact</h3>
                            <p><i class="ri-phone-line">082346874142</i></p>
                            <p><i class="ri-mail-line">man1sinjai@gmail.com</i></p>
                            <p><i class="ri-school-line">Alamat Jalan, JL. Baronang Tappee Kel. Lappa Kec. Sinjai Utara</i></p>
                        </div>
                    </div>
                </div>
            </footer>
            
        </div>
    <div  class="copyright">
        <p> &copy 2025 Man satu Sinjai by hisyam_yassar</p>
    </div>
    
</body>
</html>
