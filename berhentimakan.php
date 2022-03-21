<?php
include "koneksi/koneksi.php";
mysqli_query($conn,"update waktu_feeder set status=0");
?>