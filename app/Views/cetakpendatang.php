<!DOCTYPE html>
<html>
<head>
<title>Surat Pendatang</title>
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
<?php foreach ($data as $value) { ?>
<h4 style="text-align: center;"><u>SURAT KETENRANGAN PENDATANG</u></h4>
<p style="text-align: center;"><b>Nomor Surat : <?= $nomor_surat ?></b></p>
<br>
<p style="text-align: justify;">Yang bertanda tangan di bawah ini, pengurus RT.008/012 Kel Kelapa Dua Wetan Kec Ciracas Jakarta-Timur. Dengan ini menerangkan:</p>
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
		<td style="width: 180px">Jenis Kelamin</td>
		<td style="width: 10px">:</td>
		<td><?= $value['jk'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Tanggal Datang</td>
		<td style="width: 10px">:</td>
		<td><?= $value['tgl_in'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Tanggal Keluar</td>
		<td style="width: 10px">:</td>
		<td><?= $value['tgl_out'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Pelapor</td>
		<td style="width: 10px">:</td>
		<td><?= $value['pelapor'] ?></td>
	</tr>
</table>
<p style="text-align: justify;">Dengan ini menyatakan telah berkunjung di wilayah RT.008 RW.12 Kel Kelapa Dua Wetan Kec Ciracas jakarta timur dengan tanggal yang ditentukan.</p><br>
<p style="text-align: right; margin-right: 80px;">Jakarta <?= date('d/M/Y') ?></p>
<p style="text-align: right; margin-right: 80px;">Ketua RT. 008</p>
<br><br><br>
<p style="text-align: right; margin-right: 80px;">( MARYADI )</p>
<?php } ?>
</body>
</html>