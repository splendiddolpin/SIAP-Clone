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
  if ($_SESSION['role'] == "") {
    header("location:../Login/index.php?pesan=gagal");
  }


  if (isset($_POST['kembali'])) {
    header("location:profil_dosen.php?nip=$NIP");
    exit;
  }

  if (isset($_POST['submit'])) {
    
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    


    if ($alamat == '' || $no_telp == '') {
      echo '<script>alert("Ada field yang belum diisi!");</script>';
    }
    else {
      $update = "UPDATE dosen SET alamat = '$alamat', no_telp = '$no_telp' WHERE NIP = '$NIP'";

      mysqli_query($koneksi, $update);

      $direktori = "images/";
      $file_foto = $_FILES['foto']['name'];

      // sesi upload foto
      if(move_uploaded_file($_FILES['foto']['tmp_name'], $direktori.$file_foto)) {

    mysqli_query($koneksi, "UPDATE dosen SET foto = '$file_foto' WHERE NIP = '$NIP'");
      }

      header("location:profil_dosen.php?nip=$NIP");
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
          echo '<a href="profil_dosen.php?nip='.$NIP.'" class="active">';
          echo '<i class="bx bx-grid-alt"></i>';
          echo '<span class="links_name">Profil</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="ver_irs_dosen.php?nip='.$NIP.'">';
          echo "<i class='bx bx-check-square'></i>";
          echo '<span class="links_name">Verifikasi Data</span>';
          echo "</a>";
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="cari_progres.php?nip='.$NIP.'">';
          echo "<i class='bx bx-search'></i>";
          echo '<span class="links_name">Cari Progress</span>';
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
        
        $query_profil = "SELECT * FROM dosen WHERE NIP = '$NIP'";

        $do_query_profil = $koneksi->query($query_profil);

        while ($data_profil = $do_query_profil->fetch_object()) :
        
        ?>

        <img src="images/<?= $data_profil->foto ?>" alt="">
        <span class="admin_name"><?= $data_profil->nama_dosen ?><br>Dosen</span>

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

            $query = "SELECT * FROM dosen WHERE NIP = '$NIP'";

            $dosen = $koneksi->query($query);

            while ($data_dosen = $dosen->fetch_object()) :

            ?>

              <ul class="details">
                <li>Foto Profil</li>
                <li>NIP</li>
                <li>Nama</li>
                <li>Alamat</li>
              </ul>
              <ul class="details">
                <li><input type="file" name="foto"></li>
                <li><?= $data_dosen->NIP ?></li>
                <li><?= $data_dosen->nama_dosen ?></li>
                <li><input name="alamat" style="border-radius: 5px; width:215px;" type="text" size="10" value="<?= $data_dosen->alamat ?>"></li>
              </ul>
              <ul class="details" style="margin-right: 120px;">
                <li>Email</li>
                <li>Handphone</li>
              </ul>
              <ul class="details">
                <li><?= $data_dosen->email_pribadi ?></li>
                <li><input name="no_telp" style="border-radius: 5px;width:215px;" type="text" size="10" value="<?= $data_dosen->no_telp ?>"></li>
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

  // function get_kota_kab() {
    
  //   var inner = 'nama_kota_kab';
  //   var kode_prov = document.getElementById('nama_prov').value;
  //   var url = "get_kota_kab.php?kode_prov=" + kode_prov;
  //   var xmlhttp = getXMLHTTPRequest();
  //   xmlhttp.open('GET', url, true);
  //   xmlhttp.onreadystatechange = function () {
  //     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
  //       document.getElementById(inner).innerHTML = xmlhttp.responseText;
  //     }
  //     return false;
  //   }
  //   xmlhttp.send(null);
  //   // console.log(url);  
  // }
</script>