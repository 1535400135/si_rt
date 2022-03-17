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
<h4 style="text-align: center;"><u>SURAT KETERANGAN KEMATIAN</u></h4>
<p style="text-align: center;"><b>Nomor Surat : <?= $nomor_surat ?></b></p>
<br>
<p style="text-align: justify;">Yang bertanda tangan di bawah ini, pengurus RT.008/012 Kel Kelapa Dua Wetan Kec Ciracas Jakarta-Timur. Dengan ini menerangkan:</p>
<table>
	<tr>
		<td style="width: 180px">NIK</td>
		<td style="width: 10px">:</td>
		<td><?= $value->nik ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Nama</td>
		<td style="width: 10px">:</td>
		<td><?= $value->nama ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Jenis Kelamin</td>
		<td style="width: 10px">:</td>
		<td><?= $value->tanggal ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Penyebab</td>
		<td style="width: 10px">:</td>
		<td><?= $value->penyebab ?></td>
	</tr>
</table>
<p style="text-align: justify;">Dengan ini menyatakan bahwa warga tersebut telah benar-benar MENINGGAL DUNIA pada waktu yang telah disebutkan.</p>
<p style="text-align: justify;">Apabila di kemudian hari ada yang mempermasalhkan atas meninggalnya almahrum tersebut diatas, maka saya bertanggung jawab sepenuhnya dan tidak akan melibatkan siapapun atau pihak lain.</p>
<p>Demikian surat pernyataan ini saya buat dengan keadaan sebenarnya dan tanpa paksaan atau ancaman dari pihak lain. Apabila saya membuat keterangan yang tidak benar, saya bersedia diminta pertanggung jawaban oleh pihak yang berwenang sesuai hukum yang berlaku di Negara Republik Indonesia.</p><br>
<table>
	<tr>
		<td style="width: 400px">Mengetahui</td>
		<td>Jakarta <?= date('d / m / Y') ?></td>
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