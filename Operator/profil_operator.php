<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Profil Operator</title>
  <link rel="stylesheet" href="style1.css">
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
          echo '<a href="profil_operator.php?nip='.$NIP.'" class="active">';
          echo '<i class="bx bx-grid-alt"></i>';
          echo '<span class="links_name">Profil</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="data_mahasiswa.php?nip='.$NIP.'">';
          echo '<i class="bx bx-check-square"></i>';
          echo '<span class="links_name">Data User</span>';
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
        <span class="dashboard">Profil Operator</span>
      </div>
      <?php 
      // mengambil data dari database
      $query = " SELECT * FROM operator WHERE NIP = $NIP";
      $result = $koneksi->query( $query );
      $row = $result->fetch_object();
      ?>
      <div class="profile-details">
        <img src="images/<?= $row->foto ?>" alt="">
        <span class="admin_name"><?php echo $row->nama_op ?><br>Operator</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box" style="padding-bottom: 100px; ">
          <div class="title" style="text-align: center; "><strong>Profil</strong></div>
          <div class="sales-details" style="margin-top: 20px;">
            <ul class="details">
              <img class="profil" src="images/<?= $row->foto ?>" alt=""></li>
            </ul>
            <ul class="details">
              <li>Nama</li>
              <li>NIP</li>
              <li>Email</li>
              <li>Handphone</li>  
              <li>Alamat</li>           
            </ul>
            <ul class="details">
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>
              <li>:</li>         
            </ul>
            <ul class="details" style="margin-right: 120px;">
              <li><?php echo $row->nama_op ?></li>
              <li><?php echo $row->NIP ?></li>
              <li><?php echo $row->email ?></li>
              <li><?php echo $row->no_telp ?></li>
              <li><?php echo $row->alamat ?></li>
            </ul> 
            

          </div>
          <div>
            <a href="edit_profile.php?nip=<?php echo $NIP ?>" class="save-btn update-profil">Edit Profil</a>
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