<?php
include('koneksi/koneksi.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email=$_POST['email'];
    $password = md5($_POST['password']);

    if(empty($username && $password)){
    header("Location:datauser.php?notif=tambahkosong");
    }elseif(empty($email)){
    header("Location:datauser.php?notif=tambahkosong");
    }else{
    $sql = "INSERT INTO user (username, email, password)
        VALUES ('$username', '$email', '$password')";
    mysqli_query($conn,$sql);
    header("Location:datauser.php?notif=tambahberhasil");
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
                        <h2>Tambah Data User</h2>
                    </div>
                    <form action="createuser.php" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="datauser.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>