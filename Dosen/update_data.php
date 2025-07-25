<?php 
include("header.php");
$val = $_GET['val'];
$nim = $_GET['nim'];

if($val=='check_irs'){
    $smt = $_GET['smt'];
    $query = "UPDATE irs SET validasi='Sudah Divalidasi' WHERE NIM='$nim' AND smt='$smt';";
    $koneksi->query($query);
    $koneksi->close();
    
    header('Location: ver_irs_dosen.php?nip='.$NIP); 
}
elseif ($val=='uncheck_irs') {
    $smt = $_GET['smt'];
    $query = "UPDATE irs SET validasi='Belum Divalidasi' WHERE NIM='$nim' AND smt='$smt';";
    $koneksi->query($query);
    $koneksi->close();
    
    header('Location: ver_irs_dosen.php?nip='.$NIP); 
}
elseif ($val=='check_khs') {
    $smt = $_GET['smt'];
    $query = "UPDATE khs SET validasi='Sudah Divalidasi' WHERE NIM='$nim' AND smt='$smt';";
    $koneksi->query($query);
    $koneksi->close();
    
    header('Location: ver_khs_dosen.php?nip='.$NIP); 
}
elseif ($val=='uncheck_khs') {
    $smt = $_GET['smt'];
    $query = "UPDATE khs SET validasi='Belum Divalidasi' WHERE NIM='$nim' AND smt='$smt';";
    $koneksi->query($query);
    $koneksi->close();
    
    header('Location: ver_khs_dosen.php?nip='.$NIP); 
}
elseif ($val=='check_pkl') {
    $query = "UPDATE pkl SET status='Lulus' WHERE NIM='$nim'";
    $koneksi->query($query);
    $koneksi->close();
    
    header('Location: ver_pkl_dosen.php?nip='.$NIP); 
}
elseif ($val=='uncheck_pkl') {
    $query = "UPDATE pkl SET status='Belum Lulus' WHERE NIM='$nim'";
    $koneksi->query($query);
    $koneksi->close();
    
    header('Location: ver_pkl_dosen.php?nip='.$NIP); 
}
elseif ($val=='check_skripsi') {
    $query = "UPDATE skripsi SET status='Lulus' WHERE NIM='$nim'";
    $koneksi->query($query);
    $koneksi->close();
    
    header('Location: ver_skripsi_dosen.php?nip='.$NIP); 
}
elseif ($val=='uncheck_skripsi') {
    $query = "UPDATE skripsi SET status='Belum Lulus' WHERE NIM='$nim'";
    $koneksi->query($query);
    $koneksi->close();
    
    header('Location: ver_skripsi_dosen.php?nip='.$NIP); 
}
?>