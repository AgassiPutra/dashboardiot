<?php
include('koneksi/koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_POST['id_device'];
    $jam = $_POST['jam'];

    if(empty($jam)){
    header("Location:datajam.php?notif=tambahkosong");
    }else{
    $sql = "INSERT INTO waktu_feeder (id_device,jam)VALUES ('$id','$jam')";
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
            <div class="column">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data Jam</h2>
                    </div>
                    <form action="createjam.php" method="POST">
                        <label for="device" class="col-sm-3 col-form-label">Pilih Device</label>
                        <div class="form-group">
                            <select class="form-control" id="createjam" name="id_device">
                                <option value="0">- Pilih Device -</option>
                                <?php
                                $sql_k = "SELECT `id_device`, `nama_device` FROM `esp32`";
                                $query_k = mysqli_query($conn,$sql_k);
                                while($data_k = mysqli_fetch_row($query_k)){
                                    $id_kat = $data_k[0];
                                    $kat = $data_k[1];
                                ?>
                                <option value="<?php echo $id_kat;?>"><?php echo $kat;?></option>
                                <?php }?>
                            </select>
                        </div>
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