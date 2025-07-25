<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Cari Progres </title>
    <link rel="stylesheet" href="style1.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
      <span class="logo_name">UNIVERSITAS DIPONEGORO</span>
    </div>
    <ul class="nav-links">
      <li>
        <?php 
          echo '<a href="profil_dosen.php?nip='.$NIP.'">';
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
          echo '<a href="cari_progres.php?nip='.$NIP.'" class="active">';
          echo "<i class='bx bx-search'></i>";
          echo '<span class="links_name">Cari Progress</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="rekap_pkl_sudah_lulus.php?nip='.$NIP.'">';
          echo "<i class='bx bx-file'></i>";
          echo '<span class="links_name">Rekap PKL</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="rekap_skripsi_sudah_lulus.php?nip='.$NIP.'">';
          echo "<i class='bx bx-file'></i>";
          echo '<span class="links_name">Rekap Skripsi</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="rekap_status_mhs.php?nip='.$NIP.'">';
          echo "<i class='bx bx-file'></i>";
          echo '<span class="links_name">Rekap Stat MHS</span>';
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
        <span class="dashboard">Cari Progres</span>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Kiky<br>Dosen</span>
      </div>
    </nav>
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
              <div class="box-topic"> Cari Progress</div>
            <form method="post" name="myForm">
              <div class="profiles">
                <input type="text" placeholder="NIM" name="inputNIM">
              </div>
              <div class="btn-search">
                <button class="search-btn" id="btn1" >search</button>
              </div>
            </form>
          <?php
          if(isset($_POST['inputNIM'])){
            $search = $_POST['inputNIM'];
          }
          $sql = "SELECT * FROM mahasiswa WHERE NIM=$search";

          $result = $koneksi->query($sql);
          $row = $result->fetch_object();
          ?>

          <div class="edit-profile" id="edit-profile">
            <h1>Hasil Pencarian</h1>
              <div class="test"><img src="images/<?php echo $row->foto?>" width="100" height="100"></div>
              <div class="test2">
                <?php echo $row->nama_mhs?><br>
                <?php echo $row->NIM?><br>
                <hr>
                Angkatan : <?php echo $row->angkatan?><br>
                Status : <?php echo $row->status?><br>
              </div>
            <?php
              $sql2 = "SELECT * FROM mahasiswa,khs WHERE mahasiswa.NIM = khs.NIM and smt='7' and mahasiswa.NIM=$search";
              $result2 = $koneksi->query($sql2);
              $row2 = $result2->fetch_object();

              $sql3 = "SELECT * FROM mahasiswa, pkl WHERE mahasiswa.NIM = pkl.NIM and mahasiswa.NIM=$search";
              $result3 = $koneksi->query($sql3);
              $row3 = $result3->fetch_object();

              $sql4 = "SELECT * FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM and mahasiswa.NIM=$search";
              $result4 = $koneksi->query($sql4);
              $row4 = $result4->fetch_object();
            ?>
              <div class="content">
                <div id="option1" class="smt-chart">
                  <div class="box-irs">
                    <h2>IPK</h2>
                    <?php echo $row2->ipk?>
                  </div>
                  <div class="box-khs">
                    <h2>SKSK</h2>
                    <?php echo $row2->jml_sksk?>
                  </div>
                  <div class="box-pkl">
                    <h2>PKL</h2>
                    Status : <?php echo $row3->status?><br>
                    Nilai : <?php echo $row3->nilai_pkl?><br>
                    Status : <?php echo $row3->validasi?><br>
                    Semester : <?php echo $row3->smt?>
                  </div>
                  <div class="box-skripsi">
                    <h2>Skripsi</h2>
                    Status :<?php echo $row4->status?>
                    <br>
                    Nilai : <?php echo $row4->nilai_skripsi?>
                    <br>
                    Tgl-Sidang : <?php echo $row4->tgl_sidang?>
                    <br>
                    Lama Studi : <?php echo $row4->smt?>
                  </div>
                </div>
              
          </div>
      </div>
    </div>
  </section>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }


    
  </script>
</body>
</html>
