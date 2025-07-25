<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>KHS</title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .smt:link, .smt:visited {
  background-color: white;
  color: black;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius :100%;
  }

  .smt:hover, .smt:active {
    background-color: red;
    color :white;
  }
  </style>
</head>

<body>
  <?php 
  include('header.php');
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['role']==""){
    header("location:../Login/index.php?pesan=gagal");
  }
  ?>
  <form action="" method="post" enctype="multipart/form-data">
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
          echo '<a href="khs.php?nim='.$NIM.'" class="active">';
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
        <span class="dashboard">KHS</span>
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
            <div class="recent-sales box" style="overflow:auto; height:550px; padding-bottom: 100px;">
            <div class="title" style="text-align: center; ">KHS</div>
            <div>
            <table class="customers">
            <tr>
                <th>Semester</th>
                <th>SKS Kumulatif</th>
                <th>IP Kumulatif</th>
                <th>SKS Semester</th>
                <th>IP Semester</th>
                <th>Validasi</th>
                <th>Action</th>
            </tr>
            <?php
            $khs1 = "SELECT * FROM khs
            WHERE khs.NIM = '$NIM' ";
            $query = $koneksi->query($khs1);
            if (!$query){
              die ("Could not query the database: <br />". $koneksi->error);
            }
            while($row = $query->fetch_object()){ ?>
            <tr>
              <td><a class="smt" href="lihatkhs.php?nim=<?php echo $NIM; ?>&smt=<?php echo $row->smt; ?>"><?php echo $row->smt ?></a></td>
              <td><?php echo $row->jml_sksk ?></td>
              <td><?php echo $row->ipk ?></td>
              <td><?php echo $row->jml_sks ?></td>
              <td><?php echo $row->ips ?></td>
              <td><?php echo $row->validasi ?></td>
              <td>
                    <?php
                    echo '<a href="isikhs.php?nim=' . $NIM . '&smt='.$row->smt.'"  style="color: #081D45;"><i class="bx bxs-pencil bx-sm"></i></a>'
                    ?>
              </td>
            </tr>
            <?php
            }
            ?>
            <?php
            $smt = "SELECT * FROM khs
            WHERE khs.NIM = '$NIM' ";
            $query1 = $koneksi->query($smt);
            if (!$query1){
              die ("Could not query the database: <br />". $koneksi->error);
            }
            while($row1 = $query1->fetch_object()){ ?>
            <?php

            if(isset($_POST['proses'])){
            $direktori = "berkas/";
            $file_name=$_FILES['NamaFile']['name'];
            move_uploaded_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);

            mysqli_query($koneksi, "update khs set file_khs='$file_name' where NIM='$NIM' and smt='$row1->smt' ");
            echo "File Berhasil Diupload";
            }
            ?>
            <?php
            }
            ?>
            </div>
            </table>
            </div>
            </div>
            <div class="top-sales box" style="height: 400px;">
                <div class="title">ISI KHS</div>
                <ul class="top-sales-details">
                <li>
                    <a >
                    <img src="images/<?= $arr_mhs['foto']; ?>" alt="">
                    </a>
                    <li><span class="product"><?= $arr_mhs['nama_mhs']; ?></span></li>
                    <li><span class="price"><?= $arr_mhs['NIM']; ?></span></li> 
                <br>
                </li>
                <?php endwhile?>
                <?php endwhile?>
                <?php endwhile?>
                <?php endwhile?>
                <?php
                  echo '<a href="update_data.php?nim='.$NIM.'" class="tombol">Upload</a>';
                  echo '<a href="list_view_khs.php?nim='.$NIM.'" class="tombol">View</a>';
                ?>
                </ul>
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
</form>
</body>

</html>