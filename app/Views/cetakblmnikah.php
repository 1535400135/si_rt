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
<h4 style="text-align: center;"><u>SURAT KETERANGAN BELUM MENIKAH</u></h4>
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
<p style="text-align: justify;">Menyatakan dengan sebenar-benarnya bahwa saya sampai saat ini belum pernah menikah dengan siapapun baik secara Adat, Hukum Agama, maupun Hukum Negara.</p>
<p style="text-align: justify;">Demikian surat pernyataan ini saya buat dengan sebenarnya tanpa ada paksaan dari siapupun, apabila di kemudian hari ternyata pernyataan ini tidak benar, maka saya siap di tuntut sesuai dengan Hukum yang berlaku.</p>
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
<?php } ?>
</body>
</html>