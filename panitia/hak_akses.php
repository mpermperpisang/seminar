<?php
	include('../include/library.php');
	$id_pengguna=$_SESSION['id_pengguna'];
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>FORBIDDEN PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><h3>FORBIDDEN ACCESS OF COMMITTEE PAGE</h3></b>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
							<?php
								if(($_SESSION['login_member']==true)&& 
								  ($_SESSION['aktif']=="1"))
								 {
							?>
								<td><a href="../peserta/index.php"><img src="../gambar/peserta.png" width="100" title="Return to participant page"></a><br>You're Login as Participant</td>
							<?php
								}
								else if(($_SESSION['login_member']==true)&& 
								  ($_SESSION['aktif']=="2"))
								{
							?>
								<td><a href="../admin/index.php"><img src="../gambar/admin.png" width="100" title="Return to admin page"></a><br>You're Login as Admin</td>
							<?php
								}
								else if(($_SESSION['login_member']==true)&& 
								  ($_SESSION['aktif']=="4"))
								{
							?>
								<td><a href="../reviewer/index.php"><img src="../gambar/reviewer.png" width="100" title="Return to reviewer page"></a><br>You're Login as Reviewer</td>
							<?php
								}
								else if(($_SESSION['login_member']==true)&& 
								  ($_SESSION['aktif']=="5"))
								{
							?>
								<td><a href="../pimpinan/index.php"><img src="../gambar/pimpinan.jpg" width="100" title="Return to headship page"></a><br>You're Login as Headship</td>
							<?php
								}
							?>
							</tr>
						</table>
		<?php include('../footer.php'); ?>
	</body>
</html>