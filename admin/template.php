<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>ADMIN PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="5">
					<p align="justify">
						<b><font size="+1">TEMPLATE LIST</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_pengguna,cms_reviewer
							where cms_pengguna.id_pengguna=cms_reviewer.id_pengguna";
							$res = mysql_query($sql);
						?>	
					</p>
				</td>	
			</tr>
			<tr align="center">
				<td>
					<img src="../gambar/1.jpg" title="Template Satu" width="75%">
				</td>
				<td>
						<img src="../gambar/2.jpg" title="Template Dua" width="75%">
				</td>
			</tr>
			<form action="apply_template.php" method="post">
			<tr align="center">
				<td>
					<input type="radio" name="template" value="1" checked="checked">Choose This Template
				</td>
				<td>
					<input type="radio" name="template" value="2">Choose This Template
				</td>
			</tr>
			<tr align="center">
				<td align="right">
					<input type='image' src='../gambar/apply.jpg' width='25' name='kirim' title="Apply Template">
				</td>
			</form>
			<form action="index.php">							
				<td align="left">
				<input type='image' title="Cancel" src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'>
				</td>
			</form>
			</tr>
		</table>
		<?php include('../footer.php'); ?>
	</body>
</html>
<?php
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>