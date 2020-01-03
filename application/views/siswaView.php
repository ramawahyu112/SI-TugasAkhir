<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SIMPLE CRUD APPLICATION</title>
<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<div class="data">
		<table>
			<tr>
				<td width="30%">ID</td>
				<td><?php echo $siswa->id; ?></td>
			</tr>
			<tr>
				<td valign="top">Nama Siswa</td>
				<td><?php echo $siswa->nama; ?></td>
			</tr>
			<tr>
				<td valign="top">Alamat</td>
				<td><?php echo $siswa->alamat; ?></td>
			</tr>
			<tr>
				<td valign="top">Jenis Kelamin</td>
				<td><?php echo strtoupper($siswa->jenis_kelamin)=='M'? 'Laki-laki':'Perempuan' ; ?></td>
			</tr>
			<tr>
				<td valign="top">Tanggal Lahir (dd-mm-yyyy)</td>
				<td><?php echo date('d-m-Y',strtotime($siswa->tanggal_lahir)); ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>