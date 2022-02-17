<?php 
include 'koneksi/koneksi.php';
$id = $_POST['id'];
$seri_devices = $_POST['seri_devices'];
$nama_devices = $_POST['nama_devices'];
 
$sql_q="UPDATE `devices` SET `seri_devices` = '$seri_devices' , `nama_devices` = '$nama_devices' WHERE `id`= '$id'";
$query_f = mysqli_query($conn,$sql_q);
 
header("location:devicelist.php");
 
?>