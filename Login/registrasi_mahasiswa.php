<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php 
  include('header.php');
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['role']==""){
    header("location:../Login/index.php?pesan=gagal");
  }

  $username = $_GET['username'];
  ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form action="insert_mhs.php" class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Isi Data
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: ex@abc.xyz">
						<input class="input100" type="text" name="nama_lengkap" placeholder="Nama lengkap">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<input class="input100" type="text" name="nim" placeholder='<?=$username?>' pattern='<?=$username?>' title='<?=$username?>'>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<input class="input100" type="text" name="email" placeholder="e-mail">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<input class="input100" type="text" name="alamat" placeholder="Alamat">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<input class="input100" type="text" name="no_hp" placeholder="Nomor HP">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<input class="input100" type="text" name="angkatan" placeholder="Angkatan">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<input class="input100" type="text" name="jalur_masuk" placeholder="Jalur Masuk">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<?php 
			      // mengambil data dari database
			      $query = " SELECT * FROM kota_kab";
			      $result = $koneksi->query( $query );
			      // $row = $result->fetch_object();
			      ?>
			      <input class="input100" type="text" id="kode_kota_kab" name="kode_kota_kab" list="kode" required placeholder="Kabupaten/Kota">
			      	<datalist id="kode">
			      		<?php 
			      		while ($row = $result->fetch_object()){?>
			      			<option value="<?php echo $row->kode_kota_kab ?>"><?php echo $row->nama_kota_kab ?></option>
			      		<?php 
			      	  } ?>
			      	</datalist>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<input class="input100" type="text" name="username" placeholder="Username Baru">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "data is required">
						<input class="input100" type="password" name="password" placeholder="Password baru">
						<span class="focus-input100"></span>
					</div>

                    UPlOAD IMG


					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Submit">

					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							
							<i></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>