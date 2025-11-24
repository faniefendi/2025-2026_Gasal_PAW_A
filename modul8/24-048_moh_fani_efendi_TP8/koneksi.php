<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_tpmodul8");

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>
