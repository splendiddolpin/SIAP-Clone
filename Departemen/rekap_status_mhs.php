<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Rekap Status Mahasiswa </title>
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
          echo '<a href="profil_departemen.php?nip='.$NIP.'">';
          echo '<i class="bx bx-grid-alt"></i>';
          echo '<span class="links_name">Profil</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="rekap_pkl_sudah_lulus.php?nip='.$NIP.'">';
          echo "<i class='bx bx-file'></i>";
          echo '<span class="links_name">Rekap PKL</span>';
          echo "</a>";
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
          echo '<a href="rekap_status_mhs.php?nip='.$NIP.'"  class="active">';
          echo "<i class='bx bx-file'></i>";
          echo '<span class="links_name">Rekap Stat Mhs</span>';
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
  $mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa ");
  ?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Rekap Status Mahasiswa</span>
      </div>
      <?php 
      // mengambil data dari database
      $query = " SELECT * FROM departemen WHERE nip = $NIP";
      $result = $koneksi->query( $query );
      $row = $result->fetch_object();
      ?>
      <div class="profile-details">
        <img src="images/<?= $row->foto ?>" alt="">
        <span class="admin_name"><?php echo $row->nama_dept ?><br>Departemen</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box" style="padding-bottom: 100px; ">
          <div class="title" style="text-align: center; "><strong>Rekap Status Mahasiswa</strong></div>

          <div>
            <table style="margin-top: 20px; margin: 20px auto;">
              <tr>
                <td>
                  <a href="rekap_status_mhs.php?nip=<?php echo $NIP ?>" class="save-btn1-active " >Status</a>
                </td>
                <td>
                  <a href="rekap_list_mhs.php?nip=<?php echo $NIP ?>" class="save-btn1" >List Mahasiswa</a>
                </td>                
              </tr>
            </table>
          </div>

          <div>
            <table class="customers">              
              <tr>
                <th style="text-align: center;">Angkatan</th>
                <th style="text-align: center;">Aktif</th>  
                <th style="text-align: center;">Cuti</th>
                <th style="text-align: center;">Mangkir</th>  
                <th style="text-align: center;">Drop Out</th>     
                <th style="text-align: center;">Undur</th>
                <th style="text-align: center;">Meninggal</th>  
                <th style="text-align: center;">Lulus</th>                         
              </tr>
              <tr>
                <td>2019</td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'aktif' AND angkatan = 2019;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>;
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'cuti' AND angkatan = 2019;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'mangkir' AND angkatan = 2019;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td> 
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'drop out' AND angkatan = 2019;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'undur' AND angkatan = 2019;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'meninggal' AND angkatan = 2019;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'lulus' AND angkatan = 2019;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>     
              </tr>  
              <tr>
                <td>2020</td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'aktif' AND angkatan = 2020;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'cuti' AND angkatan = 2020;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'mangkir' AND angkatan = 2020;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td> 
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'drop out' AND angkatan = 2020;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'undur' AND angkatan = 2020;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'meninggal' AND angkatan = 2020;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>
                <td><?php 
                $query_stat = "SELECT COUNT(angkatan)
                FROM mahasiswa
                WHERE status = 'lulus' AND angkatan = 2020;";
                $stat = $koneksi->query($query_stat);
                $data_stat = $stat->fetch_row();
                echo $data_stat[0] 
                ?></td>         
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