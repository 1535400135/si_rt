<!DOCTYPE html>
<html>
<head>
<title>Surat COVID-19</title>
<style type="text/css">
body{
	font-family: Times New Roman;
	margin-left: 30px
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
ol {
	margin-left: 40px;
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
<h4 style="text-align: center;"><u>SURAT KETERANGAN COVID-19</u></h4>
<p style="text-align: center;"><b>Nomor Surat : <?= $nomor_surat ?></b></p>
<br>
<p style="text-align: justify;">Yang bertanda tangan di bawah ini, pengurus RT.008/012 Kel Kelapa Dua Wetan Kec Ciracas Jakarta-Timur. Dengan ini menerangkan:</p>
<table>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 120px">Nama</td>
		<td>: MARYADI</td>
	</tr>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 120px">Jabatan</td>
		<td>: KETUA RT. 008</td>
	</tr>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 120px">Alamat</td>
		<td>: JL LENGKENG</td>
	</tr>
</table>
<p>Dengan ini menerangkan bahwa :</p>
<table>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 120px">Nama</td>
		<td>: <?= $value->nama ?></td>
	</tr>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 120px">NIK</td>
		<td>: <?= $value->nik ?></td>
	</tr>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 120px">Tempat/Tanggal Lahir</td>
		<td>: <?= $value->tempat.'/'.$value->tanggal ?></td>
	</tr>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 120px">Alamat</td>
		<td>: <?= $value->alamat ?></td>
	</tr>
	<tr>
		<td style="width: 50px"></td>
		<td style="width: 120px">Nomor Telpon</td>
		<td>: <?= $value->no_hp ?></td>
	</tr>
</table>
<ol>
	<li>Dinyatakan sebagai orang terkomfrimasi positif COVID-19 tanpa gejala dan tanpa komorbid sesuai dengan rekomendasi dari <?= $value->rsrujukan ?> Tanggal <?= $value->tglkena ?></li>
	<li>Sesuai dengan Pergub 88 tahun 2020 diwajibkan untuk melakukan isolasi Mandiri selama 10 hari terhitung <?= $masa.' SD '.$masa2 ?>.</li>
	<li>Adalah benar <b>tidak mampu untuk melaksanakan isolasi Mandiri di rumah.</b></li>
</ol>
<p>Demikian surat keterangan ini saya buat dengan sebenarnya dan mohon di pergunakan sebagaimana mestinya.</p>
<p style="text-align: right;">Jakarta <?= date('d M Y') ?></p>
<br><br><br><br>
<p style="text-align: right;">MARYADI</p>
<?php } ?>
</body>
</html>