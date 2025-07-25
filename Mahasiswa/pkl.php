<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> PKL </title>
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
  if(isset($_SESSION['alert'])){
    echo '<script>alert("File PKL belum diupload!");</script>';
  }
  unset($_SESSION['alert']);
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
          echo '<a href="profil_mahasiswa.php?nim='.$NIM.'" >';
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
        echo '<a href="pkl.php?nim='.$NIM.'" class="active">';
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
      $pkl = mysqli_query($koneksi, "SELECT * FROM pkl
      WHERE pkl.NIM = '$NIM'; ");
      $mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa
      WHERE mahasiswa.NIM = '$NIM'; ");
      $khs = mysqli_query($koneksi, "SELECT * FROM khs
      WHERE khs.NIM = '$NIM' ORDER BY smt DESC; ");
      $skripsi = mysqli_query($koneksi, "SELECT * FROM skripsi
      WHERE skripsi.NIM = '$NIM'; ");
      ?>

      <?php
      while($arr_mhs = mysqli_fetch_array($mhs)):
      while($arr_khs = mysqli_fetch_array($khs)):
      while($arr_pkl = mysqli_fetch_array($pkl)):
      while($arr_skripsi = mysqli_fetch_array($skripsi)):
      ?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">PKL</span>
      </div>
      <div class="profile-details">
        <img src="images/<?= $arr_mhs['foto']; ?>" alt="">
        <span class="admin_name"><?= $arr_mhs['nama_mhs']; ?><br>Mahasiswa</span>
        <!-- <i class='bx bx-chevron-down' ></i> -->
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">IPK</div>
            <div class="number"><?= $arr_khs['ipk']; ?></div>
            <div class="indicator">
              <!-- <span class="text">Semester 4</span> -->
              <br>
            </div>
          </div>
          <!-- input gambar -->
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Nilai PKL</div>
            <div class="number"><?= $arr_pkl['nilai_pkl']; ?></div>
            <div class="indicator">
              <span class="text"><?= $arr_pkl['instansi']; ?></span>
            </div>
          </div>
          <!-- input gambar -->
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Nilai Skripsi</div>
            <div class="number"><?= $arr_skripsi['nilai_skripsi']; ?></div>
            <div class="indicator">
              <span class="text"><?= $arr_skripsi['dospem']; ?></span>
            </div>
          </div>
          <!-- input gambar -->
        </div>
        <div class="box">
          <div class="right-side">

            <div class="box-topic">Jumlah SKS</div>
            <div class="number"><?= $arr_khs['jml_sksk']; ?></div>
            <div class="indicator">
              <span class="text">Semester <?= $arr_khs['smt']; ?></span>
            </div>
          </div>
          <!-- input gambar -->
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">PKL</div>
          <div class="sales-details">
            <ul class="details">
              <li><a href="#">Instansi</a></li>
              <li><a href="#">Lama PKL</a></li>
              <li><a href="#">Bagian</a></li>
              <li><a href="#">Tanggal Sidang</a></li>
              <li><a href="#">Status</a></li>
              <li><a href="#">Nilai</a></li>
            </ul>
            <ul class="details">
              <li><a href="#">:</a></li>
              <li><a href="#">:</a></li>
              <li><a href="#">:</a></li>
              <li><a href="#">:</a></li>
              <li><a href="#">:</a></li>
              <li><a href="#">:</a></li>
            </ul>
            <ul class="details">
              <li><a><?= $arr_pkl['instansi']; ?></a></li>
              <li><a><?= $arr_pkl['lama_pkl']; ?></a></li>
              <li><a><?= $arr_pkl['bagian']; ?></a></li>
              <li><a><?= $arr_pkl['tgl_sidang']; ?></a></li>
              <li><a><?= $arr_pkl['status']; ?></a></li>
              <li><a><?= $arr_pkl['nilai_pkl']; ?></a></li>
            </ul>
            </ul>
            <?php endwhile?>
            <div class="top-sales box">
              <table>
                <div class="title">ISI PKL</div>
                <ul class="top-sales-details">
                  <li>
                    <a href="#">
                      <img src="images/<?= $arr_mhs['foto']; ?>" alt="">
                    </a>
                  <ul>
                    <li><span class="product"><?= $arr_mhs['nama_mhs']; ?></span></li>
                    <li><span class="price"><?= $arr_mhs['NIM']; ?></span></li> 
                  </ul>
                  <br>
                  </li>
                  <?php endwhile?>
                  <?php endwhile?>
                  <?php endwhile?>
                  <?php
                  echo '<a href="scanpkl.php?nim='.$NIM.'" class="tombol">View</a>';
                  echo '<a href="progress_pkl.php?nim='.$NIM.'" class="tombol">Progress</a>';
                  ?>
                </ul>
              </div>
              </tr>
            </table>
          </div>
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