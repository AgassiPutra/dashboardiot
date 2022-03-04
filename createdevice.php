<?php
include('koneksi/koneksi.php');
if (isset($_POST['submit'])) {
    $seri_devices = $_POST['seri_devices'];
    $nama_devices=$_POST['nama_devices'];

    if(empty($seri_devices)){
    header("Location:devicelist.php?notif=tambahkosong");
    }elseif(empty($nama_devices)){
    header("Location:devicelist.php?notif=tambahkosong");
    }else{
    $sql = "INSERT INTO devices (seri_devices, nama_devices)VALUES ('$seri_devices', '$nama_devices')";
    mysqli_query($conn,$sql);
    header("Location:devicelist.php?notif=tambahberhasil");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data Devices</h2>
                    </div>
                    <form action="createdevice.php" method="POST">
                        <div class="form-group">
                            <label>Seri Device</label>
                            <input type="text" name="seri_devices" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Device</label>
                            <input type="text" name="nama_devices" class="form-control"></input>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="devicelist.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>