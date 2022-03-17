<!DOCTYPE html>
<html>
<head>
<title>Surat Domisili</title>
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
<h4 style="text-align: center;"><u>SURAT KETENRANGAN DOMISILI</u></h4>
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
		<td style="width: 180px">NIK</td>
		<td style="width: 10px">:</td>
		<td><?= $value['nik'] ?></td>
	</tr>
	<tr>
		<td style="width: 180px">Alamat</td>
		<td style="width: 10px">:</td>
		<td><?= $value['alamat'] ?></td>
	</tr>
</table>
<p style="text-align: justify;">Orang tersebut diatas, adalah benar-benar warga kami dan berdomisili di RT.008 RW.012 Kecamatan Ciracas Kelurahan Kelapa Dua Wetan Kabupaten Kota Administrasi Jakarta Timur. Menerangkan Surat keterangan DOMISILI ini di minta oleh yang bersangkutan, </p><p>................................................................................................................................................................................................................................................................................................</p>
<p style="text-align: justify;">Demikian Surat keterangan ini, kami buat dengan sesungguhnya dan untuk dipergunakan sebagaimana semestinya. Sesuai dengan tujuan yang diminta penggunaan diluar yang telah di sebutkan di atas akan menjadi tanggung jawab yang bersangkutan.</p>
<p style="text-align: center;">Mengetahui,</p>
<table>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 350px">Nomor <?= $nomor_surat ?></td>
		<td>Jakarta <?= date('d/M/Y') ?></td>
	</tr>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 350px">Pengurus RW. 012</td>
		<td>Pengurus RT. 008</td>
	</tr>
</table><br><br><br><br>
<table>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 350px">( ........................ )</td>
		<td>( MARYADI )</td>
	</tr>
</table>
<?php } ?>
</body>
</html>