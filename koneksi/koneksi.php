<?php
$koneksi = mysqli_connect("localhost","root","","pet_feeder");
// cek koneksi
if (!$koneksi){
    die("Error koneksi: " . mysqli_connect_errno());
}
?>