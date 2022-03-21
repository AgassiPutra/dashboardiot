<?php 
include "koneksi/koneksi.php";

// $sql = mysqli_query($conn, "SELECT * FROM waktu_feeder");
// $data = mysqli_fetch_array($sql);
// $time = $data[1];
// // $time2 = $data[1];
// // $time3 = $data['2'];
// // $time4 = $data['3'];

// echo $time;

$sql = mysqli_query($conn, "SELECT * FROM waktu_feeder WHERE status=1");
if(mysqli_num_rows($sql) > 0)
{
    echo "Makan";
}else{
    echo "Belum Waktunya";
}
?>