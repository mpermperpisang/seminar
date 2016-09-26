<?php
	include('include/library.php');
if(isset($_SESSION['login_member']))
{
	if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="1"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=peserta/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="2"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=admin/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="3"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=panitia/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="4"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=reviewer/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="5"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=pimpinan/index.php'>";
	}
}
else
{
?>
<html>
<head>
	<link type="text/css" href="css/css.css" rel="stylesheet">	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>CREATE FIRST ADMIN</title>
</head>
<body onLoad="self.focus();document.form1.username.focus()">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/js_form_admin.js"></script>
	<div id="header">
		<div class="inHeaderLogin"></div>
	</div>
	<br /><br /><br />
	<table background="gambar/headerbg_2.jpg" align="center" border="0" width=25% style="border-bottom:solid 1px #dcdcdc; border-top:solid 1px #dcdcdc;">
		<tr align="center">
			<td align="left" colspan="2"><font size="+1"><b>CREATE ADMINISTRATOR</b></font></td>
		</tr>
		<tr align="center">
			<td colspan="2" align="center">
				<div class="tampil_info2"></div>
			</td>
		</tr>
		<tr align="center">
			<td align="left" rowspan="4" width=25%><img src="gambar/admin.png" width="150" /></td>
			<td align="left">
				<form action="daftar_admin.php" name="form1" method="post">
					<table border="0" width=50% align="center">
						<tr>
							<td align="left"><font size="-1">Username</font></td>
						</tr>
						<tr>
							<td align="center">
								<input type="text" name="username" maxlength="20" class="input_username" required>
							</td>
						</tr>
						<tr>
							<td align="left"><font size="-1">Password</font></td>
						</tr>
						<tr>
							<td align="center">
								<input type="password" maxlength="50" name="password" class="input_password" required>
							</td>
						</tr>
						<tr>
							<td align="left"><font size="-1">Email</font></td>
						</tr>
						<tr>
							<td align="center">
								<input type="text" name="email" maxlength="50" class="input_email" required>
							</td>
						</tr>
						<tr>
							<td align="left"><font size="-1">Name</font></td>
						</tr>
						<tr>
							<td align="center">
								<input type="text" name="nama" maxlength="100" class="input_nama" required>
							</td>
						</tr>
						
						<tr>
							<td align="center">
							</td>
						</tr>
						<tr>
							<td align="center" background="gambar/green.jpg" style="background-repeat:repeat-x">
								<input type="submit" class="button" value="Create Admin" onClick="return aksi_daftar();">
							</td>
						</tr>
						<tr>
							<td align="center" background="gambar/green.jpg">
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>
<?php
}
?>