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
				<td>
					<p align="justify">
						<b><h3>ADMINISTRATOR'S MENU</h3></b>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php
							$sql="select * from cms_pengguna
									where kode_masalah='1' or kode_masalah='2'";
							$res=mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if ($banyakrecord>0)
							{
						?>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
								<td><a href="masalah.php"><img src="../gambar/email.gif" width="100" title="Manage Mail Problem"></a><br>Manage<br>Mail Problem</td>
							</tr>
						</table>
						<?php
							}
						?>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
								<td><a href="profile.php"><img src="../gambar/edit_user.png" width="100" title="Manage Profile"></a><br>Manage<br>Profile</td>
								<td><a href="account.php"><img src="../gambar/edit_account.png" width="100" title="Manage Account"></a><br>Manage<br>Account</td>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
								<td><a href="admin.php"><img src="../gambar/admin.png" width="100" title="Manage Administrator"></a><br>Manage<br>Administrator</td>
								<td><a href="panitia.php"><img src="../gambar/panitia.png" width="100" title="Manage Committee"></a><br>Manage<br>Committee</td>
								<td><a href="peserta.php"><img src="../gambar/peserta.png" width="100" title="Manage Participant"></a><br>Manage<br>Participant</td>
								<td><a href="reviewer.php"><img src="../gambar/reviewer.jpg" width="100" title="Manage Reviewer"></a><br>Manage<br>Reviewer</td>
								<?php
								/*
								echo "<td><a href="pimpinan.php"><img src="../gambar/pimpinan.jpg" width="100" title="Manage Headship"></a><br>Manage<br>Headship</td>";
								*/
								?>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
								<td><a href="year.php"><img src="../gambar/year.png" width="100" title="Manage Month and Year"></a><br>Manage<br>Month and Year</td>
								<td><a href="acara.php"><img src="../gambar/due_date.png" width="100" title="Manage Due Date of Seminar"></a><br>Manage<br>Due Date of Seminar</td>
								<td><a href="front_end.php"><img src="../gambar/post.png" width="100" height="110" title="Manage Front End Post"></a><br>Manage<br>Front End Post</td>
								<td><a href="google_maps.php"><img src="../gambar/maps.png" width="100" height="110" title="Manage Google Maps"></a><br>Manage<br>Location Maps</td>
								<td><a href="brosur.php"><img src="../gambar/brosur.png" width="100" height="110" title="Manage Brochure"></a><br>Manage<br>Brochure</td>
								<td><a href="template_paper.php"><img src="../gambar/template_paper.jpg" width="100" height="110" title="Manage Template of Paper"></a><br>Manage<br>Template of Paper</td>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
								<td><a href="template.php"><img src="../gambar/template.png" width="150" height="100" title="Manage Template"></a><br>Manage<br>Template</td>
								<td><a href="header.php"><img src="../gambar/header.png" width="100" title="Manage Header"></a><br>Manage<br>Header</td>
								<td><a href="footer.php"><img src="../gambar/footer.png" width="100" title="Manage Footer"></a><br>Manage<br>Footer</td>
								<td><a href="menu_list.php"><img src="../gambar/menu.png" width="80" height="100" title="Manage Menu"></a><br>Manage<br>Menu</td>
							</tr>
						</table>
					</p>
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