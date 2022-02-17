
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Data Device</h2>
                    </div>
                    <?php 
                    include "koneksi/koneksi.php";
                    $id = $_GET['id'];
                    $sql_c = "SELECT `seri_devices`, `nama_devices` FROM `devices` WHERE `id`='$id'";
                    $nomor = 1;
                    $query_c = mysqli_query($conn,$sql_c);
                    while($data = mysqli_fetch_array($query_c)){
                    ?>
                    <form action="konfirmasiupdatedevice.php" method="POST">
                        <div class="form-group">
                            <label>Seri Device</label>
                            <input type="text" name="seri_devices" class="form-control" value="<?php echo $data['seri_devices']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Device</label>
                            <input name="nama_devices" class="form-control" value="<?php echo $data['nama_devices']; ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="devicelist.php" class="btn btn-default">Cancel</a>
                    </form>
                    <?php } ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>