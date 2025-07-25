<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Profil</title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>



<body>

  <?php
  include('header.php');

  // cek apakah yang mengakses halaman ini sudah login
  if ($_SESSION['role'] == "") {
    header("location:../Login/index.php?pesan=gagal");
  }

  require_once("../login/lib/db_login.php");

  $nim = $_GET['nim'];

  if (isset($_POST['kembali'])) {
    header("location:profil_mahasiswa.php?nim=$nim");
    exit;
  }

  if (isset($_POST['submit'])) {
    
    $alamat = $_POST['alamat'];
    $kode_kota_kab = $_POST['kode_kota_kab'];
    $no_telp = $_POST['no_telp'];
    $NIP_doswal = $_POST['nip_doswal'];

    if ($alamat == '' || $no_telp == '') {
      echo '<script>alert("Ada field yang belum diisi!");</script>';
    }
    else {
      $update = "UPDATE mahasiswa SET alamat = '$alamat', kode_kota_kab = '$kode_kota_kab', no_telp = '$no_telp', NIP_doswal='$NIP_doswal' WHERE NIM = '$nim'";

      mysqli_query($koneksi, $update);

      $direktori = "images/";
      $file_foto = $_FILES['foto']['name'];

      // sesi upload foto
      if(move_uploaded_file($_FILES['foto']['tmp_name'], $direktori.$file_foto)) {

    mysqli_query($koneksi, "UPDATE mahasiswa SET foto = '$file_foto' WHERE NIM = '$nim'");
      }

      header("location:profil_mahasiswa.php?nim=$nim");
      exit;
    }
  }

  ?>
  

  <div class="sidebar">
    <div class="logo-details">
      <img class="bx bxl-c-plus-plus logoundip" src="images/u.png" alt="">
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
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Profil</span>
      </div>
      <div class="profile-details">

        <?php
        
        $query_profil = "SELECT * FROM mahasiswa WHERE nim = '$nim'";

        $do_query_profil = $koneksi->query($query_profil);

        while ($data_profil = $do_query_profil->fetch_object()) :
        
        ?>

        <img src="images/<?= $data_profil->foto ?>" alt="">
        <span class="admin_name"><?= $data_profil->nama_mhs ?><br>Mahasiswa</span>

        <?php
        endwhile;
        ?>
        <!-- <i class='bx bx-chevron-down' ></i> -->
      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        
        <div class="recent-sales box" style="padding-bottom: 100px;">
          <div class="title" style="text-align: center;"><strong>Profil</strong></div>
          <form method="POST" enctype="multipart/form-data">
          <div class="sales-details" style="margin-left: 50px; margin-right: 50px;">

            <!-- isa edit -->

            <?php

            $query = "SELECT mahasiswa.*, kota_kab.nama_kota_kab, provinsi.* FROM mahasiswa JOIN kota_kab ON kota_kab.kode_kota_kab = mahasiswa.kode_kota_kab JOIN provinsi ON provinsi.kode_prov = kota_kab.kode_prov WHERE nim = '$nim'";

            $mhs = $koneksi->query($query);

            while ($data_mhs = $mhs->fetch_object()) :

            ?>

              <ul class="details">
                <li>Foto Profil</li>
                <li>NIM</li>
                <li>Nama</li>
                <li>Alamat</li>
                <li>Kab/Kota</li>
                
              </ul>
              <ul class="details">
                <li><input type="file" name="foto"></li>
                <li><?= $data_mhs->NIM ?></li>
                <li><?= $data_mhs->nama_mhs ?></li>
                <li><input name="alamat" style="border-radius: 5px; width:215px;" type="text" size="10" value="<?= $data_mhs->alamat ?>"></li>
                
                  <?php 
                  // mengambil data dari database
                  $query = " SELECT * FROM kota_kab";
                  $result = $koneksi->query( $query );
                  // $row = $result->fetch_object();
                  ?>
                  <input type="text" id="kode_kota_kab" name="kode_kota_kab" list="kode" required value="<?= $data_mhs->kode_kota_kab ?>" style="border-radius: 5px; width: 215px;">
                    <datalist id="kode">
                      <?php 
                      while ($row = $result->fetch_object()){?>
                        <option value="<?php echo $row->kode_kota_kab ?>"><?php echo $row->nama_kota_kab ?></option>
                      <?php 
                      } ?>
                    </datalist>
                </li>
              </ul>
              <ul class="details" style="margin-right: 120px;">
                <li>Angkatan</li>
                <li>Jalur Masuk</li>
                <li>Email</li>
                <li>Handphone</li>
                <li>Status</li>
                <li>NIP Dosen Wali</li>
              </ul>
              <ul class="details">
                <li><?= $data_mhs->angkatan ?></li>
                <li><?= $data_mhs->jalur_masuk ?></li>
                <li><?= $data_mhs->email ?></li>
                <li><input name="no_telp" style="border-radius: 5px;width:215px;" type="text" size="10" value="<?= $data_mhs->no_telp ?>"></li>
                <li><?= $data_mhs->status ?></li>

                <!-- Dosen Wali -->
                <li>
                  <div data-validate = "data is required">
                  <?php 
                  $query = "SELECT * FROM dosen";
                  $result = $koneksi->query($query);
                  ?>
                  <input type="text" id="nip_doswal" name="nip_doswal" list="nip" required value="<?= $data_mhs->NIP_doswal ?>" style="border-radius: 5px; width: 215px;">
                    <datalist id="nip">
                      <?php 
                      while ($row = $result->fetch_object()){?>
                        <option value="<?php echo $row->NIP ?>"><?php echo $row->nama_dosen ?></option>
                      <?php 
                      } ?>
                    </datalist>
                  </div>
                </li>
              </ul>

            <?php
            endwhile;
            ?>
            <!-- isa edit -->


          </div>
          <div class="update-profil">
            <button type="submit" name="kembali" id="kembali" class="save-btn ">Kembali</button>
            <!-- <a href="profil_mahasiswa.php?nim=<?= $nim ?>" class="save-btn">Kembali</a> -->
            <button type="submit" name="submit" id="submit" class="save-btn ">Konfirmasi</button>
          
           <!-- <a href="profil_mahasiswa.php?nim=<?= $nim ?>" class="save-btn">Konfirmasi</a> -->
          </div>
          </form>
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

<script>
  function getXMLHTTPRequest() {
  if (window.XMLHttpRequest) {
    // code for modern browsers
    //code for modern browsers
    //Semua browser modern (Chrome, Firefox, IE7+, Edge, Safari, Opera)
    //memiliki objek XMLHttpRequest bawaan.

    return new XMLHttpRequest();
  } else {
    // code for old IE browsers
    return new ActiveXObject('Microsoft.XMLHTTP');
  }
  // Objek XMLHttpRequest dapat digunakan untuk bertukar data dengan server
  // web di belakang layar. Ini berarti dimungkinkan untuk memperbarui bagian
  // halaman web, tanpa memuat ulang seluruh halaman.
}

  
</script>