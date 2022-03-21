<?php
include('koneksi/koneksi.php');
if (isset($_POST['submit'])) {
    $jam = $_POST['jam'];

    if(empty($jam)){
    header("Location:datajam.php?notif=tambahkosong");
    }else{
    $sql = "INSERT INTO waktu_feeder (jam)VALUES ('$jam')";
    mysqli_query($conn,$sql);
    header("Location:datajam.php?notif=tambahberhasil");
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
                        <h2>Tambah Data Jam</h2>
                    </div>
                    <form action="createjam.php" method="POST">
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="text" name="jam" class="form-control">
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