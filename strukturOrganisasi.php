<?php
$base_url = "http://localhost/perpustakaan_man1_aljamaly/";
?>


<!DOCTYPE html>
<html>
<head>
  <title>Struktur Organisasi Perpustakaan</title>
  <link rel="stylesheet" href="<?= $base_url ?>CSS/style.css">
  <script src="<?= $base_url ?>JS/javascript.js" defer></script>

    
  <!-- remix icon link -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- google fonts link -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Oswald:wght@400;700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playwrite+AU+SA+Guides&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Oleo+Script:wght@400;700&family=Playwrite+AU+SA+Guides&display=swap" rel="stylesheet">

  <script
    src="https://kit.fontawesome.com/c1df782baf.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- <script src="JS/javascript.js" defer></script> -->
</head>
<body>
  
<header class="header">
        <div class="logo">
          <img src="img/LogoMansa1.png" alt="Coffee Shop Logo" />
          <div>
            <p>AL <span>JAMALY</span></p>
          </div>
        </div>
    
        <nav class="navbar">
          <a href="index.php#home" class="nav-link">Beranda</a>
          <div class="dropdown">
            <button class="dropbtn">Profil 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="index.php#about">Profil</a>
                <a href="VisiMisi.php" >Visi Misi</a>
                <a href="strukturOrganisasi.php" >Struktur Organisasi</a>
            </div>
        </div>
        
        <a href="index.php#Services" class="nav-link">Layanan</a>
        
        <div class="dropdown">
            <button class="dropbtn">E-Pustaka 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="BukuPelajaran.php" >Buku Pelajaran</a>
                <a href="bukuCerita.php" >Buku Digital</a>
            </div> 
        </div>
        
          <a href="index.php#contac" class="nav-link">Contact</a>
        </nav>
    
        <div class="icons">
          <div class="ordernow"><a href="login.php">Login</a></div>
          <div id="menubar" class="fas fa-bars"></div>
        </div>
      </header>
      
  
  
  <div id="Struktur">
    <h2 data-aos="fade-button">Struktur Organisasi<br>Perpustakaan Al-Jamaly</h2>

    <div class="box-struktur" data-aos="fade-right">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/User-Pict-Profil.svg/640px-User-Pict-Profil.svg.png" alt="Kepala SMA">
      <p><strong>Kepala Madrasah</strong><br>Hasiah S.Ag. M.Pd.I <br> NIP.196902141998032001</p>
    </div>

    <div class="box-struktur" data-aos="fade-left">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/User-Pict-Profil.svg/640px-User-Pict-Profil.svg.png" alt="Kepala Tata Administrasi">
      <p><strong>Kepala Perpustakaan</strong><br>Sri Tatik Muliana. S.Pd <br> NIP. 197902232003122 005</p>
    </div>

    <div class="staff-boxes-struktur">
      <div class="box-struktur" data-aos="fade-right">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/User-Pict-Profil.svg/640px-User-Pict-Profil.svg.png" alt="Kepala Perpustakaan">
        <p><strong>Layanan Pemakai </strong><br>Muhda Mansur. S.IP</p>
      </div>
      <div class="box-struktur" data-aos="fade-top">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/User-Pict-Profil.svg/640px-User-Pict-Profil.svg.png" alt="Kepala Perpustakaan">
        <p><strong>Layanan Pemakai </strong><br>Yulia Sofyan</p>
      </div>
      
      <div class="box-struktur" data-aos="fade-left">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/User-Pict-Profil.svg/640px-User-Pict-Profil.svg.png" alt="Kepala Perpustakaan">
        <p><strong>Layanan Teknis </strong><br>Hilma Wati Hilal, A. Ma.Past</p>
      </div>
    </div>

    <div class="staff-boxes-struktur">
      <div class="staff-box-struktur" data-aos="fade-right">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/User-Pict-Profil.svg/640px-User-Pict-Profil.svg.png" alt="Staff Teknologi">
        <p><strong>Anggota</strong><br>Siswa Man 1 Sinjai</p>
      </div>
      <div class="staff-box-struktur" data-aos="fade-left">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/User-Pict-Profil.svg/640px-User-Pict-Profil.svg.png" alt="Staff Pemustaka">
        <p><strong>Anggota</strong><br>Guru Man 1 Sinjai</p>
      </div>
    </div>
  </div>

    <!-- Halaman Footer -->
    <section id="footer">
      <div>
          <footer>
              <div class="footer-main">
                      <img src="../img/LogoMansa2.png" alt="Logo">            

                  <div class="footer-media">
                      <h3>Sosial Media</h3>
                      <p><a href="">
                          <i class="ri-youtube-fill"></i>
                      </a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""><i class="ri-facebook-box-fill"></i></a>
                      <a href=""><i class="ri-tiktok-fill"></i></a></p>
                  </div>
                  
                  <div class="footer-contact">
                      <div>
                          <h3>Contact</h3>
                          <p><i class="ri-phone-line">082346874142</i></p>
                          <p><i class="ri-mail-line">man1sinjai@gmail.com</i></p>
                          <p><i class="ri-school-line">Alamat Jalan, JL. Baronang 
                              <br>Kel. Lappan Kec. Sinjai Utara</i></p>
                      </div>
                  </div>
              </div>
          </footer>
      </div>
      
    </section>
      <div  class="copyright">
          <p> &copy 2024 Man satu Sinjai by nr_faiqtunnis</p>
      </div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
    offset: 300,
    duration: 1000,
  });
</script>

</body>
</html>
