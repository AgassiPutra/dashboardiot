<?php
include "koneksi/koneksi.php";

    date_default_timezone_set("Asia/Jakarta");
    $jam = date('H:i:s');
    echo $jam;

    $sql = mysqli_query($conn,"select * from waktu_feeder");
    while($data = mysqli_fetch_array($sql)){
        $id = $data['id'];
        $jamdb = $data['jam'];
        if($jam == $jamdb){
            mysqli_query($conn,"update waktu_feeder set status=1 where id='$id'");
        }
    }
?>  