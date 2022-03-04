<?php 
include 'koneksi/koneksi.php';
$id = $_POST['id'];
$seri_devices = $_POST['seri_devices'];
$nama_devices = $_POST['nama_devices'];

if(empty($nama_devices)){
    header("Location:devicelist.php?notif=editkosong&jenis=nama_devices");
}else{
$sql_q="UPDATE `devices` SET `seri_devices` = '$seri_devices' , `nama_devices` = '$nama_devices' WHERE `id`= '$id'";
$query_f = mysqli_query($conn,$sql_q);
 
header("Location:devicelist.php?notif=updateberhasil");
}
?>