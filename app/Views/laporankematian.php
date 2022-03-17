<!DOCTYPE html>
<html>
<head>
<title>Laporan Kelahiran</title>
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
<h3 style="text-align: center;">-= LAPORAN KEMATIAN =-</h3>
<table border="1">
	<tr>
		<th style="width: 50px">No.</th>
		<th style="width: 220px">NIK</th>
		<th style="width: 220px">Nama</th>
		<th style="width: 100px">Tanggal</th>
		<th style="width: 100px">Penyebab</th>
	</tr>
	<?php $no=1; foreach ($data as $value) { ?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $value->nik ?></td>
		<td><?= $value->nama ?></td>
		<td><?= $value->tanggal ?></td>
		<td><?= $value->penyebab ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>