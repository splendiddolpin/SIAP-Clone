<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard | CodingLab </title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['role']==""){
    header("location:../Login/index.php?pesan=gagal");
  }
  ?>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img class="bx bxl-c-plus-plus logoundip" src="images/u.png" alt="">
      <!-- <i class='bx bxl-c-plus-plus'></i> -->
      <span class="logo_name">UNIVERSITAS DIPONEGORO</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="profil.html">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Profile</span>
        </a>
      </li>
      <li>
        <a href="irs.html" >
          <i class='bx bx-box'></i>
          <span class="links_name">IRS</span>
        </a>
      </li>
      <li>
        <a href="khs.html" class="active">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">KHS</span>
        </a>
      </li>
      <li>
        <a href="skripsi.html">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">SKRIPSI</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Product</span>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Prem Shahi<br>Mahasiswa</span>
        <!-- <i class='bx bx-chevron-down' ></i> -->
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">IPK</div>
            <div class="number">4.00</div>
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
            <div class="number">B</div>
            <div class="indicator">
              <span class="text">PT.Nusantara</span>
            </div>
          </div>
          <!-- input gambar -->
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Nilai Skripsi</div>
            <div class="number">A</div>
            <div class="indicator">
              <span class="text">Jonas Mubarok M.kom</span>
            </div>
          </div>
          <!-- input gambar -->
        </div>
        <div class="box">
          <div class="right-side">

            <div class="box-topic">Jumlah SKS</div>
            <div class="number">134</div>
            <div class="indicator">
              <span class="text">Semester 7</span>
            </div>
          </div>
          <!-- input gambar -->
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Skripsi</div>
          <div class="topic">Progress Skripsi</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Status Skripsi</li>
              <li class="topic">Nilai Skripsi</li>
              <li class="topic">Scan Berita Acara</li>
            </ul>
            <ul class="details">
              <li><a href="#">:</a></li>
              <li><a href="#">:</a></li>
              <li><a href="#">:</a></li>
            </ul>
            <ul class="details">
              <li><a href="#">Lulus</a></li>
              <li><a href="#">A</a></li>
              <li><a href="#" class="tombolUpload">Upload Berita Acara</a></li>


            </ul>
            </ul>
            <div class="top-sales box">

                
              <table>
                
                <div class="title">Progress</div>
                <!-- <tr class="top-sales-details">
                  <td><a href="#">
                    <img src="images/Profile.jpg" alt=""> -->
                    <!-- <span class="product">Bagaskara Rifky</span> -->
                  <!-- </a></td>
                  <td><span class="product">Bagaskara Rifky</span><br><span class="price">24060120140077</span></td>
                </tr> -->
                <ul class="top-sales-details">
                  <li>
                    <a href="#">
                      <img src="images/profile.jpg" alt="">
                      <!-- <span class="product">Bagaskara Rifky</span><br>
                      <span class="price">24060120140077</span> -->
                    </a>
                    <!-- <span class="price">24060120140077</span> -->
                  <ul>
                    <li><span class="product">Bagaskara Rifky</span></li>
                    <li><span class="price">24060120140077</span></li> 
                  </ul>
                  <br>
                  </li>
                  <a href="#" class="tombol">Scan</a>


                  <a href="skripsi.html" class="tombol">Kembali</a>

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