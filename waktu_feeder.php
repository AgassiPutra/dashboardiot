<?php 
include "koneksi/koneksi.php";

$sql = mysqli_query($conn, "SELECT * FROM waktu_feeder WHERE status=1 AND id_device=1");
if(mysqli_num_rows($sql) > 0)
{
    echo "Makan";
}else{
    echo "Belum Waktunya";
}
?>