<?php 
include 'koneksi/koneksi.php'; 
session_start();
 
if (isset($_POST['submit'])) {
    $seri_devices = $_POST['seri_devices'];
    $nama_devices = $_POST['nama_devices'];
 
        $sql = "SELECT * FROM devices WHERE nama_devices='$nama_device'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO devices (seri_devices, nama_devices)
                    VALUES ('$seri_devices', '$nama_devices')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, Tambah Data Berhasil!')</script>";
                $seri_devices = "";
                $nama_devices = "";
                header("Location:devicelist.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
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