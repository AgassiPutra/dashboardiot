<?php
include "koneksi/koneksi.php";

$pos = $_GET['pos'];
mysqli_query($conn,"UPDATE tb_servo SET servo='$pos'");
echo $pos;
?>