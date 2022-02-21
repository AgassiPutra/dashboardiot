<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_feeder";
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$temperatur=htmlspecialchars($_GET["temperatur"]) ;
$humidity=htmlspecialchars($_GET["humidity"]) ;
$tanggal=date("Y-m-d H:i:s");
$sql = "INSERT INTO sensor_suhu (temperatur,humidity,tanggal)
VALUES ('$temperatur','$humidity','$tanggal')";
// use exec() because no results are returned
$conn->exec($sql);
echo "New record created successfully";
} catch(PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>