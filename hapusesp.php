<?php 
include 'koneksi/koneksi.php';
$id = $_GET['id_device'];
$sql_q="DELETE FROM esp32 WHERE id_device='$id'";
$query_f = mysqli_query($conn,$sql_q);

header("location:dataesp32.php?notif=hapusberhasil");
 
?>
