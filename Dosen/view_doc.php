<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> View IRS </title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
include('header.php');
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==""){
  header("location:../Login/index.php?pesan=gagal");
}
?>

<?php
  $val = $_GET['val'];
  $NIM = $_GET['nim'];

  if($val == 'irs'){
    $smt = $_GET['smt'];
    $query = mysqli_query($koneksi, "SELECT file_irs FROM irs WHERE NIM = $NIM AND smt=$smt");
    $arr_irs = mysqli_fetch_array($query);
    if ($arr_irs['file_irs'] == '') {
      $_SESSION['alert'] = 'upload';
      header("location:ver_irs_dosen.php?nip=$NIP");
    }
    else{
?>
    <object data="../Mahasiswa/berkas/<?= $arr_irs['file_irs']; ?>" type="application/pdf" width="100%" height="100%"></object>
<?php 
    }
  } 
  elseif($val == 'khs'){
    $smt = $_GET['smt'];
    $query = mysqli_query($koneksi, "SELECT file_khs FROM khs WHERE NIM = $NIM AND smt=$smt");
    $arr_khs = mysqli_fetch_array($query);
    if ($arr_khs['file_khs'] == '') {
      $_SESSION['alert'] = 'upload';
      header("location:ver_khs_dosen.php?nip=$NIP");
    }
    else{
?>
    <object data="../Mahasiswa/berkas/<?= $arr_khs['file_khs']; ?>" type="application/pdf" width="100%" height="100%"></object>
<?php 
    }
  } 
  elseif($val == 'pkl'){
    $query = mysqli_query($koneksi, "SELECT file_pkl FROM pkl WHERE NIM = $NIM");
    $arr_pkl = mysqli_fetch_array($query);
    if ($arr_pkl['file_pkl'] == '') {
      $_SESSION['alert'] = 'upload';
      header("location:ver_pkl_dosen.php?nip=$NIP");
    }
    else{
?>
    <object data="../Mahasiswa/berkas/<?= $arr_pkl['file_pkl']; ?>" type="application/pdf" width="100%" height="100%"></object>
<?php 
    }
  } 
  elseif($val == 'skripsi'){
    $query = mysqli_query($koneksi, "SELECT file_skripsi FROM skripsi WHERE NIM = $NIM");
    $arr_skripsi = mysqli_fetch_array($query);
    if ($arr_skripsi['file_skripsi'] == '') {
      $_SESSION['alert'] = 'upload';
      header("location:ver_skripsi_dosen.php?nip=$NIP");
    }
    else{
?>
    <object data="../Mahasiswa/berkas/<?= $arr_skripsi['file_skripsi']; ?>" type="application/pdf" width="100%" height="100%"></object>
<?php 
    }
  }
?>
</html>