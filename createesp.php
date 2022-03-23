<?php
include('koneksi/koneksi.php');
if (isset($_POST['submit'])) {
    $id_device = $_POST['id_device'];
    $nama_device = $_POST['nama_device'];

    if(empty($id_device)){
    header("Location:dataesp32.php?notif=tambahkosong");
    }else{
    $sql = "INSERT INTO esp32 (`id_device`,`nama_device`)VALUES ('$id_device','$nama_device')";
    mysqli_query($conn,$sql);
    header("Location:dataesp32.php?notif=tambahberhasil");
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
                        <h2>Tambah Data ESP32</h2>
                    </div>
                    <form action="createesp.php" method="POST">
                    <div class="form-group">
                            <label>ID Device</label>
                            <input type="text" name="id_device" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Device</label>
                            <input type="text" name="nama_device" class="form-control">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="datajam.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>