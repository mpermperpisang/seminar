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
						<b><font size="+1">TEMPLATE OF PAPER FORM</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>	
			</tr>
			<tr>
			<td>
		<form method="POST" enctype="multipart/form-data" action="update_template.php">
		<table border=0 width=50% align="center">
			<tr>
				<td align="left" colspan="2"><h5>*format upload in doc, docx</h5></td>
			</tr>
			<tr>
				<th>Upload Template*</th>
				<td><input type=file name="template" required></td>
			</tr>
			<tr>
				<td colspan="0" align="right">					
					<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Upload Template of Paper'><br />
				</td>
		</form>
		<form method="POST" enctype="multipart/form-data" action="index.php">
				<td colspan="0" align="left">				
					<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'><br />
				</td>
		</form>
			</tr>
		</table>
		</td>
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