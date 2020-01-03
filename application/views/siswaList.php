<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>SIMPLE CRUD APPLICATION</title>

<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="content">
		<h1>Contoh Insert Update dan delete</h1>
		<?php
		$action='';
		if($action==''){
			$action="hitung/daftarsiswa/";
		}
		 echo form_open($action); ?>
		<input type="text" name="keyword" placeholder="search">
		<input type="submit" name="search_submit" value="Cari">
		</form>
		<div class="paging"><?php echo $pagination; ?></div>
		<div class="data"><?php echo $table; ?></div>
		<div class="paging"><?php echo $pagination; ?></div>
		
		<br />
		<?php echo anchor('hitung/addSiswa/','Tambah Siswa baru',array('class'=>'add')); ?>
		<hr>
		<?php echo anchor('','Back to List',array('class'=>'add')); ?>
	</div>
</body>
</html>