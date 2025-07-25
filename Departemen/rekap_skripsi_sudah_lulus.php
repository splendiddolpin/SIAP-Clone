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
          echo '<a href="rekap_skripsi_sudah_lulus.php?nip='.$NIP.'"  class="active">';
          echo "<i class='bx bx-file'></i>";
          echo '<span class="links_name">Rekap Skripsi</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="rekap_status_mhs.php?nip='.$NIP.'">';
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
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Rekap Skripsi</span>
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
        <div class="recent-sales box" style="overflow:auto; height:600px; padding-bottom: 100px; ">
          <div class="title" style="text-align: center; "><strong>Rekap Skripsi Mahasiswa</strong></div>

          <div>
            <table class="customers"> 
              <tr>
                <td colspan="8"><strong>Angkatan</strong></td>
              </tr>
              <tr>
                <th style="text-align: center;" colspan="2">2019</th>
                <th style="text-align: center;" colspan="2">2020</th>
                <th style="text-align: center;" colspan="2">2021</th>
                <th style="text-align: center;" colspan="2">2022</th>
              </tr>
              <tr>
                <td>sudah</td>
                <td>belum</td>
                <td>sudah</td>
                <td>belum</td> 
                <td>sudah</td>
                <td>belum</td> 
                <td>sudah</td>
                <td>belum</td>          
              </tr>
              <?php
              $data = mysqli_query($koneksi, "SELECT count(*) as total from skripsi, mahasiswa where skripsi.NIM = mahasiswa.NIM and skripsi.status='Lulus' and angkatan='2019' ");
              $data1 = mysqli_query($koneksi, "SELECT count(*) as total1 from skripsi, mahasiswa where skripsi.NIM = mahasiswa.NIM and skripsi.status='Belum Lulus' and angkatan='2019' ");
              $data2 = mysqli_query($koneksi, "SELECT count(*) as total2 from skripsi, mahasiswa where skripsi.NIM = mahasiswa.NIM and skripsi.status='Lulus' and angkatan='2020' ");
              $data3 = mysqli_query($koneksi, "SELECT count(*) as total3 from skripsi, mahasiswa where skripsi.NIM = mahasiswa.NIM and skripsi.status='Belum Lulus' and angkatan='2020' ");
              $data4 = mysqli_query($koneksi, "SELECT count(*) as total4 from skripsi, mahasiswa where skripsi.NIM = mahasiswa.NIM and skripsi.status='Lulus' and angkatan='2021' ");
              $data5 = mysqli_query($koneksi, "SELECT count(*) as total5 from skripsi, mahasiswa where skripsi.NIM = mahasiswa.NIM and skripsi.status='Belum Lulus' and angkatan='2021' ");
              $data6 = mysqli_query($koneksi, "SELECT count(*) as total6 from skripsi, mahasiswa where skripsi.NIM = mahasiswa.NIM and skripsi.status='Lulus' and angkatan='2022' ");
              $data7 = mysqli_query($koneksi, "SELECT count(*) as total7 from skripsi, mahasiswa where skripsi.NIM = mahasiswa.NIM and skripsi.status='Belum Lulus' and angkatan='2022' ");
              $hasil = mysqli_fetch_array($data);
              $hasil1 = mysqli_fetch_array($data1);
              $hasil2 = mysqli_fetch_array($data2);
              $hasil3 = mysqli_fetch_array($data3);
              $hasil4 = mysqli_fetch_array($data4);
              $hasil5 = mysqli_fetch_array($data5);
              $hasil6 = mysqli_fetch_array($data6);
              $hasil7 = mysqli_fetch_array($data7); 
              ?>
                  <tr>
                    <td><?php echo $hasil['total'] ?></td>
                    <td><?php echo $hasil1['total1'] ?></td>
                    <td><?php echo $hasil2['total2'] ?></td>
                    <td><?php echo $hasil3['total3'] ?></td>
                    <td><?php echo $hasil4['total4'] ?></td>
                    <td><?php echo $hasil5['total5'] ?></td>
                    <td><?php echo $hasil6['total6'] ?></td>
                    <td><?php echo $hasil7['total7'] ?></td>
                  </tr>                             
            </table>
          </div>

          <div>
            <table style="margin-top: 20px; margin: 20px auto;">
              <tr>
                <td>
                  <a href="rekap_skripsi_sudah_lulus.php?nip=<?php echo $NIP ?>" class="save-btn1-active" >Sudah Lulus</a>
                </td>
                <td>
                  <a href="rekap_skripsi_belum_lulus.php?nip=<?php echo $NIP ?>" class="save-btn1" >Belum Lulus</a>
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
                <th style="text-align: center;">Nilai</th>                             
              </tr>
              <?php 
              $query = "SELECT nama_mhs, angkatan, skripsi.*
                        FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND skripsi.status='Lulus' ";
              $result = $koneksi->query( $query );
              $no = 1;
              if (!$result){
                    die ("Could not query the database: <br />". $koneksi->error);
              }
                while ($row = $result->fetch_object()){ ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row->nama_mhs ?></td>
                    <td><?php echo $row->NIM ?></td>
                    <td><?php echo $row->angkatan ?></td>
                    <td><?php echo $row->nilai_skripsi ?></td>
                  </tr>
              <?php
                $no++;      
                }
                $result->free();
              ?>                                  
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