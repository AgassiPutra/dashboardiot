<?php 
include 'koneksi/koneksi.php';
$id = $_POST['id_device'];
$nama_device = $_POST['nama_device'];

if(empty($nama_device)){
    header("Location:dataesp.php?notif=editkosong&jenis=nama");
}else{
$sql_q="UPDATE `esp32` SET `nama_device` = '$nama_device' WHERE `id_device`= '$id'";
$query_f = mysqli_query($conn,$sql_q);
 
header("Location:dataesp32.php?notif=updateberhasil");
}
?>