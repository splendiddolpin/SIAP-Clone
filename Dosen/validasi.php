<?php 
include("header.php");
$val = $_GET['val'];

if($val=='irs'){
    $nim = $_GET['nim'];
    $smt = $_GET['smt'];
    $query = "UPDATE irs SET validasi='Sudah Divalidasi' WHERE NIM='$nim' AND smt='$smt';";
    $koneksi->query($query);
    $koneksi->close();
    // $resultUpdate = $koneksi->query( $update );
    header('Location: ver_irs_dosen.php?nip='.$NIP); 
}

 ?>