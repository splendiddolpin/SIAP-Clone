<?php
    $conn = mysqli_connect('localhost','root','','kel10ppl');

    if($conn === false){
    die("ERROR".mysqli_connect_error());
    }

    $nama = $_REQUEST['nama'];
    $email = $_REQUEST['email'];
    $no_telp = $_REQUEST['no_telp'];
    $alamat = $_REQUEST['alamat'];

    $sql="UPDATE `operator` SET `nama` = '$nama', `email` = '$email', `no_telp` = '$no_telp', `alamat` = '$alamat' WHERE `operator`.`NIP` = '19456778'";

    if(mysqli_query($conn, $sql)){
        echo "<script>window.location.href = 'edit_profile.php'; 
        alert('Data sudah tersimpan di database!');</script>";
    }else{
        echo"ERROR".mysqli_error($conn);
    } 
    mysqli_close($conn);

?>