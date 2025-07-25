<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Data User </title>
    <link rel="stylesheet" href="style.css">
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
          echo '<a href="profil_operator.php?nip='.$NIP.'">';
          echo '<i class="bx bx-grid-alt"></i>';
          echo '<span class="links_name">Profil</span>';
          echo '</a>';
        ?>
      </li>
      <li>
        <?php 
          echo '<a href="data_mahasiswa.php?nip='.$NIP.'" class="active">';
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
        <span class="dashboard">Data User</span>
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
      <div class="overview-boxes">
        <div class="box">
          <ul>
            <li>
              <form method="POST">
              <div class="box-topic"> Upload Data username Baru</div>
              <div class="form-name">
                Nomor Induk<br>
                Role<br>
                Status<br>
              </div>
              <div class="form-titik-dua">
                : &nbsp; &nbsp; <br>
                : <br>
                : <br>
              </div>
              <div class="input-form">
                    <input type="text" id="nim" name="nim" required><br>
                    <input type="text" id="role" name="role" list="roles" required><br>
                      <datalist id="roles">
                        <option value="mahasiswa">
                        <option value="dosen">
                        <option value="dept">
                      </datalist>
                    AKTIF
              </div>
              <div class="btn-save-mhs">
                <input type="submit"  class="save-btn" name="submit">
              </div>
            </form>
            </li>
          </ul>
      </div>
    </div>
  </section>
  <?php
    $conn = mysqli_connect('localhost','root','','kel10ppl');
      if($conn === false){
        die("ERROR".mysqli_connect_error());
      }

      if(isset($_POST['submit'])){
      $nim = $_POST['nim'];
      $role = $_POST['role'];

      $check="SELECT username FROM user";

      $sql="INSERT INTO user VALUES('$nim','$nim','$role')";

      if(mysqli_query($conn, $sql)){
         echo "<script>alert('Data sudah tersimpan di database!');</script>";
      }else{
          echo"ERROR".mysqli_error($conn);
        } 
      }  
      mysqli_close($conn);
  ?>
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