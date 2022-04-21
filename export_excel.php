<?php
include "koneksi/koneksi.php";
$filename = 'datasuhu_'.time().'.csv';

// POST values
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

// Select query
$query = "SELECT * FROM sensor_suhu ORDER BY id asc";

if(isset($_POST['from_date']) && isset($_POST['to_date'])){
   $query = "SELECT * FROM sensor_suhu where tanggal between '".$from_date."' and '".$to_date."' ORDER BY id asc";
}

$result = mysqli_query($conn,$query);
$suhu = array();

// file creation
$file = fopen($filename,"w");

// Header row - Remove this code if you don't want a header row in the export file.
$suhu = array("No","ID_Devices","Temperatur","Humidity","Tanggal"); 
fputcsv($file,$suhu);  
while($row = mysqli_fetch_assoc($result)){
   fputcsv($file,$row);
}

fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: text/csv; charset=utf-8 ");

readfile($filename);

// deleting file
unlink($filename);
exit();