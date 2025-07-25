<?php
    $conn = mysqli_connect('localhost','root','','kel10ppl');

    if($conn === false){
        die("ERROR".mysqli_connect_error());
    }

    $nama_dosen = $_REQUEST['nama_dosen'];
    $nip = $_REQUEST['nip'];
    $email = $_REQUEST['email'];
    $alamat = $_REQUEST['alamat'];
    $no_hp = $_REQUEST['no_hp'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $sql = "INSERT INTO departemen (`NIP`, `nama_dosen`, `email`, `alamat`, `no_telp`, `username`) VALUES ('$nip', '$nama_dosen', '$email', '$alamat', '$no_hp','$username')";
    mysqli_query($conn, $sql);


    $sql1 = "UPDATE `user` SET `username` = '$username', `password` = '$password' WHERE `user`.`username` = '$nim';";
    mysqli_query($conn, $sql1);

    
    // if(mysqli_query($conn, $sql1)){
    //     echo"data tersimpan di database"; 
    // }else{
    //     echo"ERROR".mysqli_error($conn);
    // }

    mysqli_close($conn);
?>