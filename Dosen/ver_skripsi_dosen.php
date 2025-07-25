<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Verifikasi Data</title>
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
  if(isset($_SESSION['alert'])){
    echo '<script>alert("File Skripsi belum diupload!");</script>';
  }
  unset($_SESSION['alert']);
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
          echo '<a href="ver_irs_dosen.php?nip='.$NIP.'" class="active">';
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
        <span class="dashboard">Verifikasi Data</span>
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
          <div class="title" style="text-align: center; "><strong>Data Skripsi</strong></div>

          <div>
            <table style="margin-top: 20px;">
              <tr>
                <td>
                  <a href="ver_irs_dosen.php?nip=<?php echo $NIP ?>" class="save-btn1" >IRS</a>
                </td>
                <td>
                  <a href="ver_khs_dosen.php?nip=<?php echo $NIP ?>" class="save-btn1" >KHS</a>
                </td>
                <td>
                  <a href="ver_pkl_dosen.php?nip=<?php echo $NIP ?>" class="save-btn1" >PKL</a>
                </td>
                <td>
                  <a href="ver_skripsi_dosen.php?nip=<?php echo $NIP ?>" class="save-btn1-active" >Skripsi</a>
                </td>
              </tr>
            </table>
          </div>

          <div>
            <table class="customers">
              <tr>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tahun Masuk</th>
                <th>Lama Studi (Semester)</th>
                <th>Nilai Skripsi</th>
                <th>Tanggal Sidang</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <?php 
              $query = "SELECT nama_mhs, angkatan, skripsi.* FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND NIP_dospem_pkl = '$NIP' ORDER BY status, smt DESC";
              $result = $koneksi->query( $query );
              if (!$result){
                    die ("Could not query the database: <br />". $koneksi->error);
              }
                while ($row = $result->fetch_object()){ ?>
                  <tr>
                    <td><?php echo $row->nama_mhs?></td>
                    <td><?php echo $row->NIM?></td>
                    <td><?php echo $row->angkatan?></td>
                    <td><?php echo $row->smt?></td>
                    <td><?php echo $row->nilai_skripsi?></td>
                    <td><?php echo $row->tgl_sidang?></td>
                    <td><?php echo $row->status?></td>
                    <td>
                    <!-- tombol validasi -->
                    <a href="update_data.php?val=<?php echo 'check_skripsi'; ?>&nip=<?php echo $NIP; ?>&nim=<?php echo $row->NIM; ?>" style="color: #081D45; border:none;"><i class='bx bxs-check-circle bx-sm'></i></a>
                    <a href="update_data.php?val=<?php echo 'uncheck_skripsi'; ?>&nip=<?php echo $NIP; ?>&nim=<?php echo $row->NIM; ?>" style="color: #081D45; border:none;"><i class='bx bx-window-close bx-sm'></i></a>
                    <!-- tombol edit -->
                    <a href="ver_skripsi_edit.php?nip=<?php echo $NIP; ?>&nim=<?php echo $row->NIM; ?>"  style="color: #081D45;"><i class='bx bxs-pencil bx-sm'></i></a>
                    <!-- tombol view -->
                    <a href="view_doc.php?val=<?php echo 'skripsi' ?>&nip=<?php echo $NIP ?>&nim=<?php echo $row->NIM;?>" style="color: #081D45;"><i class='bx bxs-file-find bx-sm' ></i></a>
                    </td>
                  </tr>
              <?php      
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