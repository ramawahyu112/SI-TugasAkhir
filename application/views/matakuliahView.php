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
				<td width="30%">Kode Mata Kuliah</td>
				<td><?php echo $matakuliah->kodemk; ?></td>
			</tr>
			<tr>
				<td valign="top">Nama Mata Kuliah</td>
				<td><?php echo $matakuliah->namamk; ?></td>
			</tr>
			<tr>
				<td valign="top">Jumlah Sks</td>
				<td><?php echo $matakuliah->jmlsks; ?></td>
			</tr>
			<tr>
				<td valign="top">Semester</td>
				<td><?php echo $matakuliah->semester; ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>