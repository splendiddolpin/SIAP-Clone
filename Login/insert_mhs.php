<?php
    $conn = mysqli_connect('localhost','root','','kel10ppl');

    if($conn === false){
        die("ERROR".mysqli_connect_error());
    }

    $nama_lengkap = $_REQUEST['nama_lengkap'];
    $nim = $_REQUEST['nim'];
    $email = $_REQUEST['email'];
    $alamat = $_REQUEST['alamat'];
    $no_hp = $_REQUEST['no_hp'];
    $angkatan = $_REQUEST['angkatan'];
    $kode_kota_kab = $_REQUEST['kode_kota_kab'];
    $jalur_masuk = $_REQUEST['jalur_masuk'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $sql = "INSERT INTO mahasiswa(NIM, nama_mhs, email, alamat, no_telp, angkatan, status, foto, jalur_masuk, kode_kota_kab, username) VALUES ('$nim', '$nama_lengkap', '$email', '$alamat', '$no_hp', '$angkatan', '', '', '$jalur_masuk', '$kode_kota_kab', '$nim')";
    mysqli_query($conn, $sql);

    $sql1 = "UPDATE `user` SET `username` = '$username', `password` = '$password' WHERE `user`.`username` = '$nim';";
    mysqli_query($conn, $sql1);

    $irs_smt1 = "INSERT INTO irs(NIM,smt) VALUES ('$nim', 1)";
    mysqli_query($conn, $irs_smt1);

    $khs_smt1 = "INSERT INTO khs(NIM,smt) VALUES ('$nim', 1)";
    mysqli_query($conn, $khs_smt1);    

    $pkl = "INSERT INTO pkl(NIM) VALUES ('$nim')";
    mysqli_query($conn, $pkl);    

    $skripsi = "INSERT INTO skripsi(NIM) VALUES ('$nim')";
    mysqli_query($conn, $skripsi);    
        
    mysqli_close($conn);
    header("Location: ../Login/index.php");
?>