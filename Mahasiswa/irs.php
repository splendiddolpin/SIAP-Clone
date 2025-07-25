<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> IRS </title>
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .bx-sm {
      font-size: 1rem!important;
    }
  </style>

</head>

<body>
  <?php
  include('header.php');

  // cek apakah yang mengakses halaman ini sudah login
  if ($_SESSION['role'] == "") {
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
        echo '<a href="profil_mahasiswa.php?nim=' . $NIM . '" >';
        echo '<i class="bx bx-file"></i>';
        echo '<span class="links_name">Profile</span>';
        echo '</a>';
        ?>
      </li>
      <li>
        <?php
        echo '<a href="irs.php?nim=' . $NIM . '" class="active">';
        echo '<i class="bx bx-file"></i>';
        echo '<span class="links_name">IRS</span>';
        echo '</a>';
        ?>
      </li>
      <li>
        <?php
        echo '<a href="khs.php?nim=' . $NIM . '">';
        echo '<i class="bx bx-file"></i>';
        echo '<span class="links_name">KHS</span>';
        echo '</a>';
        ?>
      </li>
      <li>
        <?php
        echo '<a href="pkl.php?nim=' . $NIM . '">';
        echo '<i class="bx bx-file"></i>';
        echo '<span class="links_name">PKL</span>';
        echo '</a>';
        ?>

      </li>
      <li>
        <?php
        echo '<a href="skripsi.php?nim=' . $NIM . '">';
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
  while ($arr_mhs = mysqli_fetch_array($mhs)) :
    while ($arr_khs = mysqli_fetch_array($khs)) :
      while ($arr_pkl = mysqli_fetch_array($pkl)) :
        while ($arr_skripsi = mysqli_fetch_array($skripsi)) :
  ?>
          <section class="home-section">
            <nav>
              <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">IRS</span>
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

      <?php endwhile;
      endwhile;
    endwhile;
  endwhile; ?>

      <!-- <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">IRS</span>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Ahmad Isa<br>Mahasiswa</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">IPK</div>
            <div class="number">4.00</div>
            <div class="indicator">
              <br>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Nilai PKL</div>
            <div class="number">B</div>
            <div class="indicator">
              <span class="text">PT.Nusantara</span>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Nilai Skripsi</div>
            <div class="number">A</div>
            <div class="indicator">
              <span class="text">Jonas Mubarok M.kom</span>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">

            <div class="box-topic">Jumlah SKS</div>
            <div class="number">134</div>
            <div class="indicator">
              <span class="text">Semester 7</span>
            </div>
          </div>
        </div>
      </div> -->

      <div class="sales-boxes">
        <div class="recent-sales box" style="padding-bottom: 100px; ">
          <div class="title" style="text-align: center; "><strong>Data IRS</strong></div>
          <div>
            <table class="customers">
              <tr>
                <th>Semester </th>
                <th>Jumlah SKS</th>
                <th>Status</th>
                <th>Validasi</th>
                <th>Action</th>
              </tr>
              <?php
              $query_irs = "SELECT irs.*, irs.status AS irs_status, mahasiswa.* FROM irs, mahasiswa WHERE irs.NIM = '$NIM' and mahasiswa.NIM = '$NIM'";

              $irs = $koneksi->query($query_irs);

              while ($data_irs = $irs->fetch_object()) :

              ?>
                <tr>
                  <td><?= $data_irs->smt ?></td>
                  <td><?= $data_irs->jml_sks ?></td>
                  <td><?= $data_irs->irs_status?></td>
                  <td><?= $data_irs->validasi?></td>
                  <td>
                    <?php
                    echo '<a href="isiirs.php?nim=' . $NIM . '&smt='.$data_irs->smt.'"  style="color: #081D45;"><i class="bx bxs-pencil bx-sm"></i></a>'
                    ?>
                  </td>


                </tr>
              <?php
              endwhile;
              ?>
              <!-- <tr>
                <td>2</td>
                <td>22</td>
                <td>24</td>
                <td><?php
                    echo '<a href="isiirs.php?nim=' . $NIM . '"  style="color: #081D45;"><i class="bx bxs-pencil bx-sm"></i></a>' ?>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>22</td>
                <td>24</td>
                <td><?php
                    echo '<a href="isiirs.php?nim=' . $NIM . '"  style="color: #081D45;"><i class="bx bxs-pencil bx-sm"></i></a>' ?>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>22</td>
                <td>24</td>
                <td><?php
                    echo '<a href="isiirs.php?nim=' . $NIM . '"  style="color: #081D45;"><i class="bx bxs-pencil bx-sm"></i></a>' ?>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>22</td>
                <td>24</td>
                <td><?php
                    echo '<a href="isiirs.php?nim=' . $NIM . '"  style="color: #081D45;"><i class="bx bxs-pencil bx-sm"></i></a>' ?>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>22</td>
                <td>24</td>
                <td><?php
                    echo '<a href="isiirs.php?nim=' . $NIM . '"  style="color: #081D45;"><i class="bx bxs-pencil bx-sm"></i></a>' ?>
                </td> -->
              </tr>
            </table>
          </div>

          <!-- <div class="recent-sales box">
          <div class="title">Recent Record</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Semester</li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">6</a></li>
              <li><a href="#">7</a></li>
            </ul>
            <ul class="details">
              <li class="topic">Jumlah SKS</li>
              <li><a href="#">21</a></li>
              <li><a href="#">22</a></li>
              <li><a href="#">22</a></li>
              <li><a href="#">22</a></li>
              <li><a href="#">22</a></li>
              <li><a href="#">22</a></li>
              <li><a href="#">22</a></li>
            </ul>
            <ul class="details">
              <li class="topic">Beban Studi Maks</li>
              <li><a href="#">24</a></li>
              <li><a href="#">24</a></li>
              <li><a href="#">24</a></li>
              <li><a href="#">24</a></li>
              <li><a href="#">24</a></li>
              <li><a href="#">24</a></li>
              <li><a href="#">24</a></li>
            </ul>
            </ul>
            
          </div> -->
        </div>
        <div class="top-sales box">
          <div class="title">ISI IRS</div>
          <ul class="top-sales-details">
          <?php
            $query_mhs = "SELECT * FROM mahasiswa
            WHERE mahasiswa.NIM = '$NIM'";

            $mhs = $koneksi->query($query_mhs);

            while ($data_mhs = $mhs->fetch_object()):
            
            ?>

            <li>
              <a href="#">
                <img src="images/<?=$data_mhs->foto ?>" alt="">
              </a>
            <li><span class="product"><?= $data_mhs->nama_mhs ?></span></li>
            <li><span class="price"><?= $data_mhs->NIM ?></span></li>
            <br>
            </li>
            <?php
            endwhile;

                  echo '<a href="list_upload_irs.php?nim='.$NIM.'" class="tombol">Upload</a>';
                  echo '<a href="list_view_irs.php?nim='.$NIM.'" class="tombol">View</a>';
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
            sidebarBtn.onclick = function() {
              sidebar.classList.toggle("active");
              if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
              } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
          </script>

</body>

</html>