<?php
//File      : header.php
//Deskripsi : akses database dan lain-lain
session_start();
include('../Login/lib/db_login.php');
$NIP = $_GET['nip'];

?>