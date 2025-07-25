<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Profil</title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php 
  include('header.php');
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['role']==""){
    header("location:../Login/index.php?pesan=gagal");
  }
  ?>  
  <div class="sidebar">
    <div class="logo-details">
      <img class="bx bxl-c-plus-plus logoundip" src="images/u.png" alt="">
      <!-- <i class='bx bxl-c-plus-plus'></i> -->
      <span class="logo_name">UNIVERSITAS DIPONEGORO</span>
    </div>
    <ul class="nav-links">
      <li>
        <?php 
          echo '<a href="profil_mahasiswa.php?nim='.$NIM.'" class="active">';
          echo '<i class="bx bx-file"></i>';
          echo '<span class="links_name">Profile</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="irs.php?nim='.$NIM.'">';
          echo '<i class="bx bx-file"></i>';
          echo '<span class="links_name">IRS</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="khs.php?nim='.$NIM.'">';
          echo '<i class="bx bx-file"></i>';
          echo '<span class="links_name">KHS</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
        echo '<a href="pkl.php?nim='.$NIM.'">';
        echo '<i class="bx bx-file"></i>';
        echo '<span class="links_name">PKL</span>';
        echo '</a>';
        ?>
        
      </li>
      <li>
        <?php 
        echo '<a href="skripsi.php?nim='.$NIM.'">';
        echo '<i class="bx bx-file"></i>';
        echo '<span class="links_name">Skripsi</span>';
        echo '</a>';
        ?>
      </li>
      <li>
        <a href="../Login/logout.php">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Logout</span>
        </a>
      </li>
    </ul>
  </div>
  <?php

  $query = "SELECT mahasiswa.*, kota_kab.nama_kota_kab, provinsi.nama_prov FROM mahasiswa JOIN kota_kab ON kota_kab.kode_kota_kab = mahasiswa.kode_kota_kab JOIN provinsi ON provinsi.kode_prov = kota_kab.kode_prov WHERE mahasiswa.nim = '$NIM'";

  $mhs = $koneksi->query($query);

  while ($data_mhs = $mhs->fetch_object()) :

  ?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Profil Mahasiswa</span>
      </div>
      <div class="profile-details">
        <img src="images/<?= $data_mhs->foto ?>" alt="">
        <span class="admin_name"><?= $data_mhs->nama_mhs ?><br>Mahasiswa</span>
        <!-- <i class='bx bx-chevron-down' ></i> -->
      </div>
    </nav>

    <div class="home-content">

      <div class="sales-boxes">
        <div class="recent-sales box" style="padding-bottom: 100px; ">
          <div class="title" style="text-align: center; "><strong>Profil</strong></div>
          <div class="sales-details" style="margin-top: 20px;">
            <ul class="details">
              <li><img class="profil" src="images/<?= $data_mhs->foto ?>" alt=""></li>
        
            </ul>
            <ul class="details">
              <!-- <li class="topic">Jumlah SKS</li> -->
              <li>NIM</li>
              <li>Nama</li>
              <li>Alamat</li>
              <li>Kab/Kota</li>
              <li>Propinsi</li>
              <li>Angkatan</li>
              <li>Jalur Masuk</li>
              <li>Email</li>
              <li>Handphone</li>
              <li>Status</li>
              <li>Dosen Wali</li>

            </ul>
            <ul class="details">
              <!-- <li class="topic">Beban Studi Maks</li> -->
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>

            </ul>
            <ul class="details" style="margin-right: 120px;">
              <!-- <li class="topic">Beban Studi Maks</li> -->
              <!-- isa edit -->
                <li><?= $data_mhs->NIM ?></li>
                <li><?= $data_mhs->nama_mhs ?></li>
                <li><?= $data_mhs->alamat ?></li>
                <li><?= $data_mhs->nama_kota_kab ?></li>
                <li><?= $data_mhs->nama_prov ?></li>
                <li><?= $data_mhs->angkatan ?></li>
                <li><?= $data_mhs->jalur_masuk ?></li>
                <li><?= $data_mhs->email ?></li>
                <li><?= $data_mhs->no_telp ?></li>
                <li><?= $data_mhs->status ?></li>
                <?php 
                $query = "SELECT * FROM dosen WHERE NIP = '$data_mhs->NIP_doswal'";
                $result = $koneksi->query($query);
                $dosen = $result->fetch_object();
                ?>
                <li><?= $dosen->nama_dosen ?></li>


            </ul>


          </div>
          <div>
            <!-- is edit -->
            <a href="editprofil.php?nim=<?= $data_mhs->NIM ?>" class="save-btn update-profil">Edit Profil</a>
          </div>
        <?php
              endwhile;
        ?>
        <!--  -->
        </div>
      </div>
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>

</html>