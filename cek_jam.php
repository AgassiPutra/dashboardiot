<?php
include "koneksi/koneksi.php";

    date_default_timezone_set("Asia/Jakarta");
    $jam = date('H:i:s');
    echo $jam;

    $sql = mysqli_query($conn,"SELECT * FROM waktu_feeder order by id asc");
    while($data = mysqli_fetch_array($sql)){
        $id = $data['id'];
        $jamdb =  $data['jam'];
        if($jam == $jamdb){
            mysqli_query($conn,"UPDATE waktu_feeder SET status=1 WHERE id='$id' ");
        }
    }
?>  