<?php 
include "koneksi/koneksi.php";

$sql = mysqli_query($conn, "SELECT * FROM tb_servo");
$data = mysqli_fetch_array($sql);
$servo = $data['servo'];

echo $servo;
?>