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
    <body onLoad="self.focus();document.form1.username.focus()">	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">ADD COMMITTEE</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>
			</tr>
		</table>
		<br>
			<form action="insert_panitia.php" method="post" name="form1">
			<table border=0 width=25% align="left">
				<tr>
					<td>Username</td><font size="-2">*do not use space or weird character</font>
					<td><input type="text" name="username" size="25" maxlength="20" required></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" size="25" maxlength="50" required></td>
				</tr>
				<tr>
					<td>Name of Committee</td>
					<td><input type="text" name="name" size="25" maxlength="100" required></td>
				</tr>
				<tr align="center">
					<td align="right">
						<input type="image" src="../gambar/add.png" width="25" name="kirim" title="Add Panitia">
		</form>
					</td>
		<form action="panitia.php">
					<td align="left">
						<input type="image" src="../gambar/cancel.jpg" width="25" name="batal" title="Cancel">
		</form>
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