<?php 
include 'koneksi/koneksi.php';
$id = $_POST['id'];
$jam = $_POST['jam'];

if(empty($jam)){
    header("Location:datajam.php?notif=editkosong&jenis=jam");
}else{
$sql_q="UPDATE `waktu_feeder` SET `jam` = '$jam' WHERE `id`= '$id'";
$query_f = mysqli_query($conn,$sql_q);
 
header("Location:datajam.php?notif=updateberhasil");
}
?>