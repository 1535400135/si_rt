<!DOCTYPE html>
<html>
<head>
<title>Laporan KK</title>
<style type="text/css">
body{
	font-family: Times New Roman;
}
h4{
	font-size: 16px;
}
p{
	font-size: 14px;
	padding-bottom: -10px;
	margin-left: 30px;
	margin-right: 30px;
}
table {
	margin-left: 30px;
	margin-right: 30px;
	border-collapse: collapse;
}
td {
	padding: 5px;
}
label{
	font-size: 12px;
}
</style>
</head>
<body>
<img src="<?= base_url() ?>/public/copsurat.png" width="100%">
<br>
<h3 style="text-align: center;">-= LAPORAN KARTU KELUARGA =-</h3>
<table border="1">
	<tr>
		<th>No.</th>
		<th>No Kartu Keluarga</th>
		<th>Kepala Keluarga</th>
		<th>Alamat</th>
		<th>Tanggal</th>
	</tr>
	<?php $no=1; foreach ($data as $value) { ?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $value->no_kk ?></td>
		<td><?= $value->nama ?></td>
		<td><?= $value->alamat ?></td>
		<td><?= $value->tanggal ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>