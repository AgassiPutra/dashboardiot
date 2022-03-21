
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
                        <h2>Update Data Jam</h2>
                    </div>
                    <?php 
                    include "koneksi/koneksi.php";
                    $id = $_GET['id'];
                    $sql_c = "SELECT `jam`, `status` FROM `waktu_feeder` WHERE `id`='$id'";
                    $nomor = 1;
                    $query_c = mysqli_query($conn,$sql_c);
                    while($data = mysqli_fetch_array($query_c)){
                    ?>
                    <form action="konfirmasiupdatejam.php" method="POST">
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="text" name="jam" class="form-control" value="<?php echo $data['jam']; ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="datajam.php" class="btn btn-default">Cancel</a>
                    </form>
                    <?php } ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>