<?php 
include "koneksi/koneksi.php";

$sql = mysqli_query($conn, "SELECT * FROM waktu_feeder");
$data = mysqli_fetch_array($sql);
$time = $data[1];
// $time2 = $data[1];
// $time3 = $data['2'];
// $time4 = $data['3'];

echo $time;

// $sql1 = mysqli_query($conn, "SELECT * FROM waktu_feeder where status=1");
// if(mysqli_num_rows($sql1) > 0)
// {
//     echo "Nyala";
// }
?>