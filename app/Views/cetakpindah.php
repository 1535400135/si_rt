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
<h4 style="text-align: center;"><u>SURAT KETERANGAN PINDAH</u></h4>
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
		<td style="width: 180px">Tanggal Pindah</td>
		<td style="width: 10px">:</td>
		<td><?= $value['tgl_in'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Alasan Pindah</td>
		<td style="width: 10px">:</td>
		<td><?= $value['alasan'] ?></td>
	</tr>
</table>
<p style="text-align: justify;">Dengan ini menyatakan warga tersebut telah pindah dari lingkungan RT.008/012 Kel Kelapa Dua Wetan Kec Ciracas Jakarta-Timur. Demikian surat pernyataan ini dibuat, agar dapat dipergunakan sebagaimana mestinya</p><br>
<p style="text-align: right; margin-right: 80px;">Jakarta <?= date('d / M / Y') ?></p>
<p style="text-align: right; margin-right: 80px;">Ketua RT. 008</p>
<br><br><br>
<p style="text-align: right; margin-right: 80px;">( MARYADI )</p>
<?php } ?>
</body>
</html>