<!DOCTYPE html>
<html>
<head>
<title>Laporan POSITIF</title>
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
<h3 style="text-align: center;">-= LAPORAN POSITIF =-</h3>
<table border="1">
	<tr>
		<th style="width: 50px">No.</th>
		<th style="width: 180px">Nama</th>
		<th style="width: 100px">Jenis Kelamin</th>
		<th style="width: 160px">Alamat</th>
		<th style="width: 160px">Tanggal Kena</th>
	</tr>
	<?php $no=1; foreach ($data as $value) { ?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $value->nama ?></td>
		<td><?= $value->jk ?></td>
		<td><?= $value->alamat ?></td>
		<td><?= $value->tglkena ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>