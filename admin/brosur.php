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
						<b><font size="+1">BROCHURE FORM</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>	
			</tr>
		</table>
		<form method="POST" enctype="multipart/form-data" action="update_brosur_pdf.php">
		<table border=0 width=45% align="left">
			<tr>
				<th colspan="2">Upload Brochure in PDF</th>
			</tr>
			<tr align="center">
				<td colspan="2"><input type=file name="brosur" required></td>
			</tr>
			<tr>
				<td colspan="0" align="right">					
					<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Upload Brosur'><br />
				</td>
		</form>
		<form method="POST" enctype="multipart/form-data" action="index.php">
				<td colspan="0" align="left">					
					<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'><br />
				</td>
			</tr>
		</table>
		</form>
		<form method="POST" enctype="multipart/form-data" action="update_brosur_jpg.php">
		<table border=0 width=45% align="right">
			<tr>
				<th colspan="2">Upload Brochure in Jpg, Jpeg, Png</th>
			</tr>
			<tr align="center">
				<td><input type=file name="brosur" required></td>
				<td><input type=file name="brosur2" required></td>
			</tr>
			<tr>
				<td colspan="0" align="right">					
					<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Upload Brochure'><br />
				</td>
		</form>
		<form method="POST" enctype="multipart/form-data" action="index.php">
				<td colspan="0" align="left">					
					<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'><br />
				</td>
			</tr>
		</table>
		</form>
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