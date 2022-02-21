<?php 
include 'koneksi/koneksi.php';
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
 
$sql_q="UPDATE `user` SET `username` = '$username' , `email` = '$email' WHERE `id`= '$id'";
$query_f = mysqli_query($conn,$sql_q);
 
header("location:datauser.php?notif=editberhasil");
 
?>