<!DOCTYPE html>
<html>
<head>
<title>Surat Pengantar</title>
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
<h4 style="text-align: center;"><u>SURAT KETENRANGAN PENGANTAR</u></h4>
<p style="text-align: center;"><b>Nomor Surat : <?= $nomor_surat ?></b></p>
<br>
<p style="text-align: justify;">Yang bertanda tangan di bawah ini, pengurus RT.008/012 Kel Kelapa Dua Wetan Kec Ciracas Jakarta-Timur. Dengan ini menerangkan:</p>
<table>
	<tr>
		<td style="width: 180px">Nama</td>
		<td style="width: 10px">:</td>
		<td><?= $value['nama'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Tempat/ Tanggal Lahir</td>
		<td style="width: 10px">:</td>
		<td><?= $value['tempat'].'/ '.$value['tanggal'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">NIK</td>
		<td style="width: 10px">:</td>
		<td><?= $value['nik'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Jenis Kelamin</td>
		<td style="width: 10px">:</td>
		<td><?= $value['jk'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Pekerjaan</td>
		<td style="width: 10px">:</td>
		<td><?= $value['pekerjaan'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Agama</td>
		<td style="width: 10px">:</td>
		<td><?= $value['agama'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Kewarganegaraan</td>
		<td style="width: 10px">:</td>
		<td><?= $value['kewarganegaraan'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Alamat</td>
		<td style="width: 10px">:</td>
		<td><?= $value['alamat'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Maksud dan Tujuan</td>
		<td style="width: 10px">:</td>
		<td><?= $tujuan ?></td>
	</tr>
</table>
<p style="text-align: justify;">Demikian Surat Pengantar ini di buat dengan sebenarnya dan untuk dipergunakan sebagaimana mestinya sesuai yang diminta oleh yang bersangkutan tersebut diatas. Penggunaan diluar tujuan tersebut merupakan tanggung jawab yang bersangkutan.</p>
<table>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 280px">Nomor : <?= $nomor_surat ?></td>
		<td>Jakarta <?= date('d/M/Y') ?></td>
	</tr>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 280px">Pengurus RW. 012</td>
		<td>Pengurus RT. 008</td>
	</tr>
</table><br><br><br><br>
<table>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 280px">( ........................... )</td>
		<td>( MARYADI )</td>
	</tr>
</table>
<?php } ?>
</body>
</html>