<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="4"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>REVIEWER PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><h3>REVIEWER'S MENU</h3></b>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php
							$id=$_SESSION['id_pengguna'];
						?>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="profile.php"><img src="../gambar/edit_user.png" width="100" title="Manage Profile"></a><br>Manage<br>Profile</td>
								<td><a href="account.php"><img src="../gambar/edit_account.png" width="100" title="Manage Account"></a><br>Manage<br>Account</td>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">							
								<?php		
									$sql = "select * from cms_reviewer,reviewer_bidang_kajian,cms_peserta,cms_abstrak,cms_bidang_kajian,
									review_abstrak,cms_pengguna,cms_tahun
									where cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
									and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
									and cms_reviewer.id_pengguna=reviewer_bidang_kajian.id_pengguna
									and cms_abstrak.id_bidang_kajian=reviewer_bidang_kajian.id_bidang_kajian
									and cms_reviewer.id_pengguna='$id'
									and cms_abstrak.kode_aktif='1'
									and review_abstrak.id_pengguna='$id'
									and review_abstrak.id_abstrak=cms_abstrak.id_abstrak
									and review_abstrak.id_pengguna=cms_reviewer.id_pengguna
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_tahun.id_tahun=cms_peserta.id_tahun
									and cms_tahun.kode_aktif='1'";
									$res = mysql_query($sql);
									$banyakrecord=mysql_num_rows($res);
									if($banyakrecord>0)
									{
								?>
							<tr align="center">
								<td align="center"><a href="abstract.php"><img src="../gambar/abstract.jpg" width="100" height="100" title="Manage Abstract"></a><br>Abstract Review<br>
								<font size="-1">need to review
								<?php
							$sql2 = "select * from cms_reviewer,reviewer_bidang_kajian,cms_peserta,cms_abstrak,cms_bidang_kajian,
									review_abstrak,cms_pengguna,cms_tahun
									where cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
									and status_review_abstrak=1
									and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
									and cms_reviewer.id_pengguna=reviewer_bidang_kajian.id_pengguna
									and cms_abstrak.id_bidang_kajian=reviewer_bidang_kajian.id_bidang_kajian
									and cms_reviewer.id_pengguna='$id'
									and cms_abstrak.kode_aktif='1'
									and review_abstrak.id_pengguna='$id'
									and review_abstrak.id_abstrak=cms_abstrak.id_abstrak
									and review_abstrak.id_pengguna=cms_reviewer.id_pengguna
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_tahun.id_tahun=cms_peserta.id_tahun
									and cms_tahun.kode_aktif='1'";
							$res2 = mysql_query($sql2);
							$banyakrecord2=mysql_num_rows($res2);
								?>
								[<?php echo $banyakrecord2;?>]</font></td>
								<?php
									}
									else
									{
									}
											
									$sql = "select * from cms_reviewer,reviewer_bidang_kajian,cms_peserta,cms_paper,cms_abstrak,cms_bidang_kajian,review_paper,
											cms_pengguna,cms_tahun
											where cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
											and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
											and cms_reviewer.id_pengguna=reviewer_bidang_kajian.id_pengguna
											and cms_abstrak.id_bidang_kajian=reviewer_bidang_kajian.id_bidang_kajian
											and cms_reviewer.id_pengguna='$id'
											and (cms_paper.kode_aktif='1' or cms_paper.kode_aktif='2')
											and review_paper.id_paper=cms_paper.id_paper
											and review_paper.id_pengguna=cms_reviewer.id_pengguna
											and review_paper.id_pengguna='$id'
											and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
											and cms_peserta.id_tahun=cms_tahun.id_tahun
											and cms_tahun.kode_aktif='1'";
									$res = mysql_query($sql);
									$banyakrecord=mysql_num_rows($res);
									if($banyakrecord>0)
									{
								?>
								<td align="center"><a href="paper.php"><img src="../gambar/paper.png" width="100" height="100" title="Manage Paper"></a><br>Paper Review<br>
								<font size="-1">need to review
								<?php
							$sql2 = "select * from cms_reviewer,reviewer_bidang_kajian,cms_peserta,cms_paper,cms_abstrak,cms_bidang_kajian,review_paper,cms_pengguna,cms_tahun
									where cms_paper.id_abstrak=cms_abstrak.id_abstrak
									and status_review_paper=1
									and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
									and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
									and cms_reviewer.id_pengguna=reviewer_bidang_kajian.id_pengguna
									and cms_abstrak.id_bidang_kajian=reviewer_bidang_kajian.id_bidang_kajian
									and (cms_paper.kode_aktif='1' or cms_paper.kode_aktif='2')
									and review_paper.id_paper=cms_paper.id_paper
									and review_paper.id_pengguna=cms_reviewer.id_pengguna
									and review_paper.id_pengguna='$id'
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_peserta.id_tahun=cms_tahun.id_tahun
									and cms_tahun.kode_aktif='1'";
							$res2 = mysql_query($sql2);
							$banyakrecord2=mysql_num_rows($res2);
								?>
								[<?php echo $banyakrecord2;?>]</font></td>
								<?php
									}
									else
									{
									}
								?>
							</tr>
						</table>
						<table border="0" align="center" cellspacing="25" cellpadding="15">
							<tr align="center">
								<td><a href="bidang_kajian.php"><img src="../gambar/kategori.png" width="100" title="Manage Category of Review"></a><br>Manage<br>Category of Review</td>
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
	  ($_SESSION['aktif']<>"4"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>