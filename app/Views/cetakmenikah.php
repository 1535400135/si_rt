<!DOCTYPE html>
<html>
<head>
<title>Surat Sudah Menikah</title>
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
<h4 style="text-align: center;"><u>SURAT KETERANGAN SUDAH MENIKAH</u></h4>
<p style="text-align: center;"><b>Nomor Surat : <?= $nomor_surat ?></b></p>
<br>
<p style="text-align: justify;">Yang bertanda tangan di bawah ini, pengurus RT.008/012 Kel Kelapa Dua Wetan Kec Ciracas Jakarta-Timur. Dengan ini menerangkan:</p>
<?php foreach ($data as $value) { ?>
<table>
	<tr>
		<td style="width: 180px">NIK</td>
		<td style="width: 10px">:</td>
		<td><?= $value['nik'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Nama</td>
		<td style="width: 10px">:</td>
		<td><?= $value['nama'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Tempat/Tanggal Lahir</td>
		<td style="width: 10px">:</td>
		<td><?= $value['tempat'].'/'.$value['tanggal'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Jenis Kelamin</td>
		<td style="width: 10px">:</td>
		<td><?= $value['jk'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Agama</td>
		<td style="width: 10px">:</td>
		<td><?= $value['agama'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Pekerjaan</td>
		<td style="width: 10px">:</td>
		<td><?= $value['pekerjaan'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Alamat</td>
		<td style="width: 10px">:</td>
		<td><?= $value['alamat'] ?></td>
	</tr>
</table>
<?php } ?>
<p style="text-align: justify;">Dengan ini menyatakan saya pernah menikah pada tanggal <?= $masa ?> Dengan sesorang yang bernama dibawah ini.</p>
<?php foreach ($istri as $istri) { ?>
<table>
	<tr>
		<td style="width: 180px">NIK</td>
		<td style="width: 10px">:</td>
		<td><?= $istri['nik'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Nama</td>
		<td style="width: 10px">:</td>
		<td><?= $istri['nama'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Tempat/Tanggal Lahir</td>
		<td style="width: 10px">:</td>
		<td><?= $istri['tempat'].'/'.$istri['tanggal'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Jenis Kelamin</td>
		<td style="width: 10px">:</td>
		<td><?= $istri['jk'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Agama</td>
		<td style="width: 10px">:</td>
		<td><?= $istri['agama'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Pekerjaan</td>
		<td style="width: 10px">:</td>
		<td><?= $istri['pekerjaan'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Alamat</td>
		<td style="width: 10px">:</td>
		<td><?= $istri['alamat'] ?></td>
	</tr>
</table>
<?php } ?>
<br>
<table>
	<tr>
		<td style="width: 400px">Saksi-Saki</td>
		<td>Jakarta <?= date('d/m/Y') ?></td>
	</tr>
	<tr>
		<td style="width: 400px">1. Ketua RT. 008/012</td>
		<td>Yang Membuat Pernyataan</td>
	</tr>
</table>
<br><br><br><br>
<table>
	<tr>
		<td style="width: 400px"></td>
		<td>Materai 10000</td>
	</tr>
	<tr>
		<td style="width: 400px">2. Ketua RW. 012</td>
		<td>( ......................... )</td>
	</tr>
</table>
</body>
</html>