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
		<?php echo $message; ?>
		
<?php echo form_open($action); ?>
		<div class="data">
		<table>
			<tr>
				<td width="30%">Kode Mata Kuliah</td>
				<td><input type="text" name="kodemk" disabled="disabled" class="text" value="<?php echo (isset($matakuliah['kodemk']))?$matakuliah['kodemk']:''; ?>"/></td>
				<input type="hidden" name="kodemk" value="<?php echo (isset($matakuliah['kodemk']))?$matakuliah['kodemk']:''; ?>"/>
			 </td>
			</tr>
			<tr>
				<td valign="top">Nama Mata Kuliah<span style="color:red;">*</span></td>
				<td><input type="text" name="namamk" class="text" value="<?php echo (set_value('namamk'))?set_value('namamk'):$matakuliah['namamk']; ?>"/>
				<?php echo form_error('namamk');?> </td>
			</tr>
			<tr>
				<td valign="top">Jumlah Sks</td>
				<td><input type="text" name="jmlsks" class="text" value="<?php echo set_value('jmlsks')?set_value('jmlsks'):$matakuliah['jmlsks']; ?>"/>
					<?php echo form_error('jmlsks');?> </td>
				
			</tr>
			<tr>
				<td wkodemkth="top">Semester</td>
				<td><input type="text" name="semester"  class="text" value="<?php echo (isset($matakuliah['semester']))?$matakuliah['semester']:''; ?>"/>
					<?php echo form_error('semester');?> </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Save"/></td>
			</tr>
		</table>
		</div>

	</form>


		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>