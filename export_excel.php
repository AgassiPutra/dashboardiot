<!DOCTYPE html>
<html>
<head>
	<title>Export Log Sensor - Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Sensor.xls");
	?>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Temperatur</th>
			<th>Humidity</th>
			<th>Tanggal</th>
		</tr>
		<?php 
        include "koneksi/koneksi.php";
		// menampilkan data pegawai
		$data = mysqli_query($conn,"select * from sensor_suhu");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['temperatur']; ?></td>
			<td><?php echo $d['humidity']; ?></td>
			<td><?php echo $d['tanggal']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>