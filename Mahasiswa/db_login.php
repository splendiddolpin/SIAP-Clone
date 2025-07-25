<?php
//File      : db_login.php
//Deskripsi : menghubungkan ke database

$db_host='localhost';
$db_database='kel10ppl';
$db_username='root';
$db_password='';

// connect database
$koneksi = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($koneksi->connect_errno) {
    die ("Could not connect to the database : <br />". $koneksi->connect_error);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>