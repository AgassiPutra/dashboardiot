<?php 
include 'koneksi/koneksi.php';
$id = $_GET['id'];
$sql_q="DELETE FROM waktu_feeder WHERE id='$id'";
$query_f = mysqli_query($conn,$sql_q);
 
header("location:datajam.php?notif=hapusberhasil");
 
?>
