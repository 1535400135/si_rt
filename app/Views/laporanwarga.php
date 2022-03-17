<!DOCTYPE html>
<html>
<head>
<title>Laporan Warga</title>
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
<h3 style="text-align: center;">-= LAPORAN WARGA RT.08 RW.012 =-</h3>
<table border="1">
	<tr>
		<th>No.</th>
		<th>NIK</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>No. Telp/HP</th>
		<th>No. KK</th>
	</tr>
	<?php $no=1; foreach ($data as $value) { ?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $value->nik ?></td>
		<td><?= $value->nama ?></td>
		<td><?= $value->jk ?></td>
		<td><?= $value->tanggal ?></td>
		<td><?= $value->no_hp ?></td>
		<td><?php if ($value->no_kk=='') { echo "No. KK Belum Ada"; } else { echo $value->no_kk; } ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>