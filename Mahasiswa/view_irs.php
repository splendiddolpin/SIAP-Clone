<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Scan IRS </title>
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
$smt = $_GET['smt'];
$irs = mysqli_query($koneksi, "SELECT file_irs FROM irs
WHERE irs.NIM = '$NIM' and smt='$smt'; ");


while($arr_irs = mysqli_fetch_array($irs)){
  if ($arr_irs['file_irs'] == '') {
      $_SESSION['alert'] = 'upload';
      header("location:list_view_irs.php?nim=$NIM");
  }
  else{
?>

    <object data="berkas/<?= $arr_irs['file_irs']; ?>" type="application/pdf" width="100%" height="100%"></object>
<?php
  }
}
?>
</html>