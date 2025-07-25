<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Rekap Skripsi</title>
  <link rel="stylesheet" href="style.css">
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
          echo '<a href="cari_progres.php?nip='.$NIP.'">';
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
          echo '<a href="rekap_skripsi_sudah_lulus.php?nip='.$NIP.'" class="active">';
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
        <span class="dashboard">Rekap Skripsi</span>
      </div>
      <?php 
      // mengambil data dari database
      $query = " SELECT * FROM dosen WHERE nip = $NIP";
      $result = $koneksi->query( $query );
      $row = $result->fetch_object();
      ?>
      <div class="profile-details">
        <img src="images/<?= $row->foto ?>" alt="">
        <span class="admin_name"><?php echo $row->nama_dosen ?><br>Dosen</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box" style="padding-bottom: 100px; ">
          <div class="title" style="text-align: center; "><strong>Rekap Skripsi Mahasiswa</strong></div>

          <div>
            <table class="customers">
              <tr>
                <td colspan="6"><strong>Angkatan</strong></td>
              </tr>
              <tr>
                <th style="text-align: center;" colspan="2">2019</th>
                <th style="text-align: center;" colspan="2">2020</th>
                <th style="text-align: center;" colspan="2">2021</th>
              </tr>
              <tr>
                <td>sudah</td>
                <td>belum</td>
                <td>sudah</td>
                <td>belum</td> 
                <td>sudah</td>
                <td>belum</td>           
              </tr>
              <tr>
                <td>30</td>
                <td>20</td>
                <td>30</td>
                <td>20</td>
                <td>30</td>
                <td>20</td>   
              </tr>                                 
            </table>
          </div>

          <div>
            <table style="margin-top: 20px; margin: 20px auto;">
              <tr>
                <td>
                  <a href="rekap_skripsi_sudah_lulus.php?nip=<?php echo $NIP ?>" class="save-btn1 " >Sudah Lulus</a>
                </td>
                <td>
                  <a href="rekap_skripsi_belum_lulus.php?nip=<?php echo $NIP ?>" class="save-btn1-active" >Belum Lulus</a>
                </td>                
              </tr>
            </table>
          </div>

          <div>
            <table class="customers">              
              <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Nama Mahasiswa</th>  
                <th style="text-align: center;">NIM</th>
                <th style="text-align: center;">Angkatan</th>                                            
              </tr>
              <tr>
                <td>1</td>
                <td>Jajang</td>
                <td>240601201*****</td>
                <td>2020</td> 
                        
              </tr>  
              <tr>
                <td>2</td>
                <td>Jejeng</td>
                <td>240601201*****</td>
                <td>2020</td> 
                        
              </tr>  
              <tr>
                <td>3</td>
                <td>Jijing</td>
                <td>240601201*****</td>
                <td>2020</td> 
                         
              </tr>                                              
            </table>
          </div>

          
        </div>
      </div>
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>

</html>