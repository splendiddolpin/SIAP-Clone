<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Isi IRS</title>
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
  if ($_SESSION['role'] == "") {
    header("location:../Login/index.php?pesan=gagal");
  }

  $smt = $_GET['smt'];

  if (isset($_POST['kembali'])) {
    header("location:irs.php?nim=$NIM");
    exit;
  }

  if (isset($_POST['submit'])) {

    $jml_sks = $_POST['jml_sks'];
    $status = $_POST['status'];

    if ($jml_sks == '') {
      echo "tidak ada apaa2";
      echo $jml_sks;
    } else {
      echo "ada sesuatu";
    }

    if ($jml_sks == '') {
      echo '<script>alert("Ada field yang belum diisi!");</script>';

    } else {
      // cek apakah semester ini sudah ada di khs
      $cek_khs = mysqli_query($koneksi, "SELECT count(*) FROM khs WHERE NIM='$NIM' AND smt='$smt'");
      $cek = mysqli_fetch_array($cek_khs);
      if($cek[0]>0){ //khs semester ini sudah ada
        $update = "UPDATE irs, khs SET irs.jml_sks = '$jml_sks', khs.jml_sks = '$jml_sks', irs.status='$status', khs.status='$status', irs.validasi='Belum Divalidasi' WHERE irs.NIM = '$NIM' AND khs.NIM = '$NIM' AND irs.smt = '$smt' and khs.smt = '$smt';";
        mysqli_query($koneksi, $update);
      }
      else{ //khs semester ini belum ada
        mysqli_query($koneksi, "INSERT INTO khs (NIM, smt, jml_sks) VALUES('$NIM', '$smt', '$jml_sks')");
        $update = "UPDATE irs, khs SET irs.jml_sks = '$jml_sks', khs.jml_sks = '$jml_sks', irs.status='$status', khs.status='$status', irs.validasi='Belum Divalidasi' WHERE irs.NIM = '$NIM' AND khs.NIM = '$NIM' AND irs.smt = '$smt' and khs.smt = '$smt';";
        mysqli_query($koneksi, $update); 
      }
      
      mysqli_query($koneksi, "UPDATE mahasiswa SET status=(SELECT status FROM irs WHERE NIM='$NIM' ORDER BY smt DESC LIMIT 1) WHERE NIM='$NIM';"); 
      
      //update jml_sksk semester 1
      mysqli_query($koneksi, "UPDATE khs SET jml_sksk =(SELECT jml_sks FROM khs WHERE NIM='$NIM' AND smt=(1)) WHERE NIM='$NIM' AND smt=1;");
      
      //iterator looping
      $jml_smt = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_smt FROM khs WHERE NIM='$NIM';");
      $cek = mysqli_fetch_array($jml_smt);
      //update jml_sksk semester > 1
      for($i=2;$i<=$cek['jml_smt'];$i++){
        mysqli_query($koneksi, "UPDATE khs SET jml_sksk = ( (SELECT jml_sksk FROM khs WHERE NIM='$NIM' AND smt=($i-1))+ (SELECT jml_sks FROM khs WHERE NIM='$NIM' AND smt=('$i')) ) WHERE NIM='$NIM' AND smt=$i;");
      }

      //   $direktori = "images/";
      //   $file_foto = $_FILES['foto']['name'];

      //   // sesi upload foto
      //   if(move_uploaded_file($_FILES['foto']['tmp_name'], $direktori.$file_foto)) {

      // mysqli_query($koneksi, "UPDATE mahasiswa SET foto = '$file_foto' WHERE NIM = '$nim'");
      //   }

      header("location:irs.php?nim=$NIM");
      exit;
    }
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


        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Isi IRS</div>
            <form method="POST">
              <div class="sales-details">



                <ul class="details">
                  <li><a>Semester</a></li>
                  <li><a>Beban Max SKS</a></li>
                  <li><a>Jumlah SKS</a></li>
                  <li><a>Status</a></li>
                  <!-- <li><a><br></a></li>
              <li><a>Pilih Mata Kuliah</a></li>
              <li><a>List Mata Kuliah</a></li> -->


                </ul>
                <ul class="details">
                  <li><a>:</a></li>
                  <li><a>:</a></li>
                  <li><a>:</a></li>
                  <li><a>:</a></li>
              
                </ul>
                <ul class="details">

                  <?php
                  $query_irs = "SELECT * FROM irs WHERE NIM = '$NIM' AND smt = '$smt'";

                  $irs = $koneksi->query($query_irs);

                  while ($data_irs = $irs->fetch_object()) :
                  ?>

                    <li><a><?php echo $data_irs->smt; ?></a></li>
                    <li><a>24</a></li>
                    <li><a><input name="jml_sks" id="jml_sks" style="border-radius: 5px; width:50px;" value="<?= $data_irs->jml_sks ?>"></a></li>
                    <li><a><select id="status" name="status" style="border-radius: 5px; width:100px;" value="<?= $data_irs->status ?>">
                      <option value="Aktif">Aktif</option>
                      <option value="Cuti">Cuti</option>
                      <option value="Mangkir">Mangkir</option>
                      <option value="Drop Out">Drop Out</option>
                      <option value="Undur">Undur</option>
                      <option value="Meninggal">Meninggal</option>
                      
                      </select></a></li>
                      
                  <?php
                  endwhile;
                  ?>
                  
                  </li>
                </ul>
                <ul></ul>
                <ul></ul>
                <ul></ul>
                <ul></ul>
                <ul></ul>
                
              </div>
              <div class="update-profil" style="left: 30%;margin-top:100px;">
                <button type="submit" name="kembali" id="kembali" class="save-btn ">Kembali</button>
                <!-- <a href="profil_mahasiswa.php?nim=<?= $nim ?>" class="save-btn">Kembali</a> -->
                <button type="submit" name="submit" id="submit" class="save-btn ">Konfirmasi</button>

                
              </div>
            </form>

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
              <a>
                <img src="images/<?=$data_mhs->foto ?>" alt="">
              </a>
            <li><span class="product"><?= $data_mhs->nama_mhs ?></span></li>
            <li><span class="price"><?= $data_mhs->NIM ?></span></li>
            <br>
            </li>
            <?php
            endwhile;

            ?>
          </ul>
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
              const btnAdd = document.querySelector('#btnAdd');
              const btnRemove = document.querySelector('#btnRemove');
              const listbox = document.querySelector('#list');
              const framework = document.querySelector('#framework');

              btnAdd.onclick = (e) => {
                e.preventDefault();

                // validate the option
                if (framework.value == '') {
                  alert('Tolong Pilih Mata Kuliah Terlebih Dahulu');
                  return;
                }
                // create a new option
                const option = new Option(framework.value, framework.value);
                // add it to the list
                listbox.add(option, undefined);

                // reset the value of the input
                framework.value = '';
                framework.focus();
              };

              // remove selected option
              btnRemove.onclick = (e) => {
                e.preventDefault();

                // save the selected options
                let selected = [];

                for (let i = 0; i < listbox.options.length; i++) {
                  selected[i] = listbox.options[i].selected;
                }

                // remove all selected option
                let index = listbox.options.length;
                while (index--) {
                  if (selected[index]) {
                    listbox.remove(index);
                  }
                }
              };
              var condition = true; // your condition
              if (condition) {
                var theSelect = document.getElementById('framework');
                var options = theSelect.getElementsByTagName('OPTION');
                for (var i = 0; i < options.length; i++) {
                  if (options[i].innerHTML == 'Pembelajaran Haji') {
                    theSelect.removeChild(options[i]);
                    i--; // options have now less element, then decrease i
                  }
                }
              }
            </script>
  </form>
</body>

</html>