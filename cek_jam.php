<?php
include "koneksi/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $jam = date('H:i:s');
    echo $jam;

    $sql = mysqli_query($conn,"SELECT * FROM waktu_feeder");
    while($data = mysqli_fetch_array($sql)){
        $id = $data['id'];
        $waktu =  $data['jam'];
        if($jam == $waktu){
            mysqli_query($conn,"UPDATE waktu_feeder SET status=1 WHERE id='$id' ");
        }
    }
?>