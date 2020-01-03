<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset=utf-8" >
	<title>Welcome to CodeIgniter</title>
	<!-- CSS -->
	<style type ="text/css">
	<!-- Add Custom CSS below -->
body{
background-color:#fff;
margin:40px;
font-family:Lucida Grande, Verdana, Sans-serif;
font-size:14px;
color :#4F5155;

}
a{
	color:#003399;
	background-color:transparent;
	font-weight:normal;
	
}
h1{
	color:#444;
	background-color:transparent;
	border-bottom:1px solid #D0D0D0;
	font-size:16px;
	font-weight:bold;
	margin:24px 0 2px 0;
	padding : 5px 0 6px 0;
}
</style>
</head>
<body>
<h1>CodeIgniter 2.0 dan Form!</h1>
<p>Silahkan pilih menu di bawah ini.</p>
<ul>
<li><?php echo anchor('hitung/daftarsiswa','Siswa') ;?>
<li><?php echo anchor('hitung/daftarmatakuliah','Mata Kuliah') ;?>
</ul>
<p><br/>Page rendered in{elapsed_time} seconds</p>

</body>
</html>
