<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'lib/db_login.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai operator
	if($data['role']=="op"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "op";
		// alihkan ke halaman dashboard operator
		//cek user baru atau user lama
		$cek_user = mysqli_query($koneksi,"select NIP, username from operator where username='$username';");
		$row = $cek_user->fetch_object();
		if($row->username == $username){ //user lama
			// alihkan ke halaman dashboard dosen
			header("location:../Operator/profil_operator.php?nip=".$row->NIP);
		}
		else{ //user baru
			// alihkan ke halaman registrasi dosen
			header("location:../Login/registrasi_dosen.php?username=".$username);
		}
 
	// cek jika user login sebagai dosen
	}else if($data['role']=="dosen"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "dosen";
		// alihkan ke halaman dashboard dosen

		//cek user baru atau user lama
		$cek_user = mysqli_query($koneksi,"select NIP, username from dosen where username='$username';");
		$row = $cek_user->fetch_object();
		if($row->username == $username){ //user lama
			// alihkan ke halaman dashboard dosen
			header("location:../Dosen/profil_dosen.php?nip=".$row->NIP);
		}
		else{ //user baru
			// alihkan ke halaman registrasi dosen
			header("location:../Login/registrasi_dosen.php?username=".$username);
		}
		
	// cek jika user login sebagai mahasiswa
	}else if($data['role']=="mahasiswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "mahasiswa";
		
		//cek user baru atau user lama
		$cek_user = mysqli_query($koneksi,"select NIM, username from mahasiswa where username='$username';");
		$row = $cek_user->fetch_object();
		if($row->username == $username){ //user lama
			// alihkan ke halaman dashboard mahasiswa
			header("location:../Mahasiswa/profil_mahasiswa.php?nim=".$row->NIM);
		}
		else{ //user baru
			// alihkan ke halaman registrasi mahasiswa
			header("location:../Login/registrasi_mahasiswa.php?username=".$username);
		}

	// cek jika user login sebagai departemen
	}else if($data['role']=="dept"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "dept";
		// alihkan ke halaman dashboard departemen
		header("location:../Departemen/profil_departemen.php");

		//cek user baru atau user lama
		$cek_user = mysqli_query($koneksi,"select NIP, username from departemen where username='$username';");
		$row = $cek_user->fetch_object();
		if($row->username == $username){ //user lama
			// alihkan ke halaman dashboard departemen
			header("location:../Departemen/profil_departemen.php?nip=".$row->NIP);
		}
		else{ //user baru
			// alihkan ke halaman registrasi departemen
			header("location:../Login/registrasi_departemen.php?username=".$username);
		}
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>