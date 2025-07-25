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

    <?php 
    // mengambil data dari database
    $query = " SELECT * FROM dosen WHERE nip = $NIP";
    $result = $koneksi->query( $query );
    $row = $result->fetch_object();
    ?>
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Verifikasi Data</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box" style="padding-bottom: 100px; ">
          <div class="title" style="text-align: center; "><strong>Data IRS</strong></div>

          <div>
            <table style="margin-top: 20px;">
              <tr>
                <td>
                  <a href="ver_irs_dosen.php?nip=<?php echo $NIP; ?>" class="save-btn1 " >IRS</a>
                </td>
                <td>
                  <a href="ver_khs_dosen.php?nip=<?php echo $NIP; ?>" class="save-btn1-active" >KHS</a>
                </td>
                <td>
                  <a href="ver_pkl_dosen.php?nip=<?php echo $NIP; ?>" class="save-btn1" >PKL</a>
                </td>
                <td>
                  <a href="ver_skripsi_dosen.php?nip=<?php echo $NIP; ?>" class="save-btn1" >Skripsi</a>
                </td>
              </tr>
            </table>
          </div>
          <?php 
              $NIM = $_GET['nim'];
              $smt = $_GET['smt'];
              $query = "SELECT nama_mhs, angkatan, khs.* FROM mahasiswa,khs WHERE  mahasiswa.NIM=khs.NIM AND khs.NIM='$NIM' AND smt='$smt'";
              $result = $koneksi->query( $query );
              if (!$result){
                    die ("Could not query the database: <br />". $koneksi->error);
              }
              $row = $result->fetch_object(); 
          ?>
          <div>
            <?php 
            if (isset($_POST['simpan'])){
              $ips = $_POST['ips'];
              $ipk = $_POST['ipk'];
              $smt = $_GET['smt'];
              $jml_sksk = $_GET['jml_sksk'];
              $query = "UPDATE khs SET khs.jml_sksk='$jml_sksk',ips = '$ips', ipk='$ipk' WHERE NIM='$NIM' AND smt='$smt';";
              $result = $koneksi->query( $query );
              if (!$result){
                    die ("Could not query the database: <br />". $koneksi->error);
              }
              header("location:ver_khs_dosen.php?nip=$NIP");
              exit;
            }
            ?>
            <form method="POST">
              <table style="margin-top:20px">
                <tr>
                  <td style="text-align:left">Nama Mahasiswa</td>
                  <td style="padding: 0px 5px">:</td>
                  <td><?php echo $row->nama_mhs?></td>
                </tr>
                <tr>
                  <td style="text-align:left">NIM</td>
                  <td style="padding: 0px 5px">:</td>
                  <td><?php echo $row->NIM?></td>
                </tr>
                <tr>
                  <td style="text-align:left">Tahun Masuk</td>
                  <td style="padding: 0px 5px">:</td>
                  <td><?php echo $row->angkatan?></td>
                </tr>
                <tr>
                  <td style="text-align:left">Semester</td>
                  <td style="padding: 0px 5px">:</td>
                  <td><?php echo $row->smt?></td>
                </tr>
                <tr>
                  <td style="text-align:left">SKS Semester</td>
                  <td style="padding: 0px 5px">:</td>
                  <td><?php echo $row->jml_sks?></td>
                </tr>
                <tr>
                  <td style="text-align:left">SKS Kumulatif</td>
                  <td style="padding: 0px 5px">:</td>
                  <td><input style="width:50px" type="text" name="jml_sksk" id="jml_sksk" value="<?php echo $row->jml_sksk?>"></td>
                </tr>
                <tr>
                  <td style="text-align:left">IP Semester</td>
                  <td style="padding: 0px 5px">:</td>
                  <td><input style="width:50px" type="text" name="ips" id="ips" value="<?php echo $row->ips?>"></td>
                </tr>
                <tr>
                  <td style="text-align:left">IP Kumulatif</td>
                  <td style="padding: 0px 5px">:</td>
                  <td><input style="width:50px" type="text" name="ipk" id="ipk" value="<?php echo $row->ipk?>"></td>
                </tr>
              </table>
              <button class="save-btn update-profil" type="submit" name="simpan" id="simpan">Simpan</button>
            </form>
            

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