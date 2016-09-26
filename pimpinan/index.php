<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>HEADSHIP PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><h3>HEADSHIP'S MENU</h3></b>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="profile.php"><img src="../gambar/edit_user.png" width="100" title="Manage Profile"></a><br>Manage<br>Profile</td>
								<td><a href="account.php"><img src="../gambar/edit_account.png" width="100" title="Manage Account"></a><br>Manage<br>Account</td>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="panitia.php"><img src="../gambar/panitia.png" width="100" title="View Committee"></a><br>View<br>Committee</td>
								<td><a href="peserta.php"><img src="../gambar/peserta.png" width="100" title="View Participant"></a><br>View<br>Participant</td>
								<td><a href="reviewer.php"><img src="../gambar/reviewer.jpg" width="100" title="View Reviewer"></a><br>View<br>Reviewer</td>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
						<?php		
							$sql = "select * from cms_abstrak,cms_peserta,cms_pengguna,cms_bidang_kajian,cms_tahun
									where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
									and cms_peserta.id_tahun=cms_tahun.id_tahun
									and cms_tahun.kode_aktif='1'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
							<tr align="center">
								<td><a href="abstract.php"><img src="../gambar/abstract.jpg" width="100" title="View Abstract"></a><br>View<br>Abstract</td>
						<?php
							}	
							$sql = "select * from cms_abstrak,cms_peserta,cms_pengguna,cms_bidang_kajian,cms_paper,cms_tahun
									where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
									and cms_paper.id_abstrak=cms_abstrak.id_abstrak
									and cms_tahun.id_tahun=cms_peserta.id_tahun
									and cms_tahun.kode_aktif='1'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<td><a href="paper.php"><img src="../gambar/paper.png" width="100" title="View Paper"></a><br>View<br>Paper</td>
						<?php
							}
						?>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="dashboard_peserta.php"><img src="../gambar/dashboard.png" width="100" title="View Participant Dashboard"></a><br>View<br>Participant</td>
								<td><a href="dashboard_kategori.php"><img src="../gambar/dashboard.png" width="100" title="View Paper Category Dashboard"></a><br>View<br>Paper Category</td>
								<td><a href="dashboard_paper.php"><img src="../gambar/dashboard.png" width="100" title="View Selection Paper Dashboard"></a><br>View<br>Selection Paper</td>
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
	  ($_SESSION['aktif']<>"5"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>