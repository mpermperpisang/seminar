<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>COMMITTEE PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><h3>COMMITTEE'S MENU</h3></b>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<br>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
								<td><a href="profile.php"><img src="../gambar/edit_user.png" width="100" title="Manage Profile"></a><br>Manage<br>Profile</td>
								<td><a href="account.php"><img src="../gambar/edit_account.png" width="100" title="Manage Account"></a><br>Manage<br>Account</td>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="panitia.php"><img src="../gambar/panitia.png" width="100" title="Manage Committee"></a><br>Manage<br>Committee</td>
								<td><a href="peserta.php"><img src="../gambar/peserta.png" width="100" title="Manage Participant"></a><br>Manage<br>Participant</td>
								<td><a href="reviewer.php"><img src="../gambar/reviewer.jpg" width="100" title="Manage Reviewer"></a><br>Manage<br>Reviewer</td>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
						<?php
							$id=$_SESSION['id_pengguna'];
							$sql="select * from cms_panitia
								 where cms_panitia.kategori_panitia=1
								 and cms_panitia.id_pengguna='$id'";
							$query = mysql_query($sql,$link);
							$banyakrecord=mysql_num_rows($query);
							if($banyakrecord>0)
							{
						?>
								<?php
									$sql = "select * from cms_abstrak,cms_peserta,cms_tahun
											where cms_abstrak.kode_aktif='0'
											and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
											and cms_peserta.id_tahun=cms_tahun.id_tahun
											and cms_tahun.kode_aktif='1'";
									$res = mysql_query($sql);
									$banyakrecord=mysql_num_rows($res);
									if($banyakrecord>0)
									{
								?>
							<tr align="center">
								<td align="center"><a href="abstrak.php"><img src="../gambar/abstract.jpg" width="100" height="100" title="Manage Abstract"></a><br>Manage<br>Reviewer Abstract
								<?php	
									$sql = "select * from cms_abstrak,cms_bidang_kajian,cms_peserta,cms_tahun
											where cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
											and cms_abstrak.kode_aktif='0'
											and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
											and cms_tahun.id_tahun=cms_peserta.id_tahun
											and cms_tahun.kode_aktif='1'";
									$res = mysql_query($sql);
									$banyakrecord=mysql_num_rows($res);
								?>
								[<?php echo $banyakrecord ?>]</td>
								<?php
									}
									$sql2 = "select * from cms_paper,cms_abstrak,cms_peserta,cms_tahun
											where cms_paper.kode_aktif='0'
											and cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
											and cms_tahun.id_tahun=cms_peserta.id_tahun
											and cms_tahun.kode_aktif='1'";
									$res2 = mysql_query($sql2);
									$banyakrecord2=mysql_num_rows($res2);
									if($banyakrecord2>0)
									{
								?>
								<td align="center"><a href="paper.php"><img src="../gambar/paper.png" width="100" height="100" title="Manage Paper"></a><br>Manage<br>Reviewer Paper
								<?php
									$sqlpaper = "select * from cms_abstrak,cms_bidang_kajian,cms_paper,cms_peserta,cms_tahun
											where cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
											and cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cms_paper.kode_aktif='0'
											and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
											and cms_tahun.id_tahun=cms_peserta.id_tahun
											and cms_tahun.kode_aktif='1'";
									$respaper = mysql_query($sqlpaper);
									$banyakrecordpaper=mysql_num_rows($respaper);
								?>
								[<?php echo $banyakrecordpaper ?>]</td>
								<?php
									}
								}
								?>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">						
								<?php		
									$sql = "select * from cms_abstrak,cms_peserta,cms_tahun
											where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
											and cms_peserta.id_tahun=cms_tahun.id_tahun
											and cms_tahun.kode_aktif='1'";
									$res = mysql_query($sql);
									$banyakrecord=mysql_num_rows($res);
									if($banyakrecord>0)
									{
								?>
							<tr>							
								<td align="center"><a href="lihat_abstrak.php"><img src="../gambar/abstract.jpg" width="100" height="100" title="View Abstract"></a><br>View<br>Abstract</td>
								<?php
									}		
									$sql = "select * from cms_abstrak,cms_peserta,cms_tahun,cms_paper
											where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
											and cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cms_peserta.id_tahun=cms_tahun.id_tahun
											and cms_tahun.kode_aktif='1'";
									$res = mysql_query($sql);
									$banyakrecord=mysql_num_rows($res);
									if($banyakrecord>0)
									{
								?>
								<td align="center"><a href="lihat_paper_2.php"><img src="../gambar/paper.png" width="100" height="100" title="View Paper"></a><br>View<br>Paper</td>
							</tr>
								<?php
									}
								?>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="kategori.php"><img src="../gambar/kategori.png" width="100" title="Manage Category of Paper"></a><br>Manage<br>Category of Paper</td>
								<?php
									$sql = "select * from cms_scan_transfer,cms_peserta,cms_pengguna,cms_tahun
											where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
											and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
											and cms_peserta.id_tahun=cms_tahun.id_tahun
											and cms_tahun.kode_aktif='1'";
									$res = mysql_query($sql);
									$banyakrecord=mysql_num_rows($res);
									if($banyakrecord>0)
									{
								?>
								<td><a href="scan_transfer.php"><img src="../gambar/scan_transfer.png" width="100" title="Manage Scan Proof of Payment"></a><br>Manage<br>Scan Proof of Payment
								<?php
									$sql2 = "select * from cms_scan_transfer,cms_peserta,cms_pengguna,cms_tahun
											where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
											and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
											and cms_peserta.id_tahun=cms_tahun.id_tahun
											and cms_tahun.kode_aktif='1'
											and status_bayar=1";
									$res2 = mysql_query($sql2);
									$banyakrecord2=mysql_num_rows($res2);
								?>
								[<?php echo $banyakrecord2 ?>]</td>
								<?php
									}
									
									$sql = "select * from cms_paper,cms_abstrak,cms_peserta,cms_tahun
										where cms_paper.id_abstrak=cms_abstrak.id_abstrak
										and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
										and cms_peserta.hadir_presentasi='1'
										and (cms_paper.kode_aktif='1' or cms_paper.kode_aktif='2')
										and cms_peserta.id_tahun=cms_tahun.id_tahun
										and cms_tahun.kode_aktif='1'";
									$res = mysql_query($sql);
									$banyakrecord=mysql_num_rows($res);
									if($banyakrecord>0)
									{
								?>
								<td><a href="jadwal.php"><img src="../gambar/presentation.png" width="100" title="Manage Presentation Schedule"></a><br>Manage<br>Presentation Schedule</td>
								<?php
									}
									$id=$_SESSION['id_pengguna'];
									$sqlf="select * from cms_panitia
										where cms_panitia.kategori_panitia=1
										and cms_panitia.id_pengguna='$id'";
									$queryf = mysql_query($sqlf);
									$banyakrecordf=mysql_num_rows($queryf);
									if($banyakrecordf>0)
									{
								?>
								<td><a href="ttd.php"><img src="../gambar/sign.png" width="100" title="Manage Signature"></a><br>Manage<br>Signature</td>
								<?php
									}
								?>
								<td><a href="kuesioner.php"><img src="../gambar/kuesioner.png" width="100" title="Manage Questionnaire"></a><br>Manage<br>Questionnaire</td>
							</tr>
						</table>
						<?php
							$sql="select ttd from cms_peserta,cms_tahun
									where cms_tahun.id_tahun=cms_peserta.id_tahun
									and cms_tahun.kode_aktif='1'
									and (ttd<>' ' or ttd is not null)";
							$query = mysql_query($sql,$link);
							$banyakrecord=mysql_num_rows($query);
							if($banyakrecord>0)
							{
						?>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="surat_keaslian.php"><img src="../gambar/download.png" width="100" title="Download Authentication Letter"></a><br>Download<br>Authentication Letter</td>
							</tr>
						</table>
						<?php
							}
							$id=$_SESSION['id_pengguna'];
							$sql="select * from cms_panitia
								 where cms_panitia.kategori_panitia=1
								 and cms_panitia.id_pengguna='$id'";
							$query = mysql_query($sql,$link);
							$banyakrecord=mysql_num_rows($query);
							if($banyakrecord>0)
							{
						?>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="dashboard_peserta.php"><img src="../gambar/dashboard.png" width="100" title="View Participant Dashboard"></a><br>View<br>Participant</td>
								<td><a href="dashboard_kategori.php"><img src="../gambar/dashboard.png" width="100" title="View Paper Category Dashboard"></a><br>View<br>Paper Category</td>
								<td><a href="dashboard_paper.php"><img src="../gambar/dashboard.png" width="100" title="View Selection Paper Dashboard"></a><br>View<br>Selection Paper</td>
								<td><a href="dashboard_kuesioner.php"><img src="../gambar/dashboard.png" width="100" title="View Questionnaire Dashboard"></a><br>View<br>Questionnaire</td>
							</tr>
						</table>
						<?php
							}
						?>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="arsip_peserta.php"><img src="../gambar/arsip.png" width="100" title="Open Participant Archive"></a><br>Participant<br>Archive</td>
								<td><a href="arsip_paper.php"><img src="../gambar/arsip.png" width="100" title="Open Paper Archive"></a><br>Paper<br>Archive</td>
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
	  ($_SESSION['aktif']<>"3"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>