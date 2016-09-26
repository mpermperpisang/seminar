<?php
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
?>
<table border=0 width=20% align="left">	
	<tr bgcolor="#CCCCCC" align="center">
		<td bgcolor="#CC3300" height="35" style="border-top:inset #FFFF00; border-bottom:outset #FFFF00;"><font color="white"><b>MENU</b></font></td>
	</tr>
	<tr>			
		<td><a href="profile.php"><b><img src="../gambar/edit_user.png" width="20" align="absmiddle">Manage Profile</b></a></td>	
	</tr>
	<tr>			
		<td><a href="account.php"><b><img src="../gambar/edit_account.png" width="20" align="absmiddle" />Manage Account</b></a></td>
	</tr>
	<tr>
		<td><a href="panitia.php"><b><img src="../gambar/panitia.png" width="20" align="absmiddle" />View Committee</b></a></td>	
	</tr>
	<tr>
		<td><a href="peserta.php"><b><img src="../gambar/peserta.png" width="20" align="absmiddle" />View Participant</b></a></td>				
	</tr>
	<tr>
		<td><a href="reviewer.php"><b><img src="../gambar/reviewer.jpg" width="20" align="absmiddle" />View Reviewer</b></a></td>	
	</tr>
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
	<tr>
		<td><a href="abstract.php"><b><img src="../gambar/abstract.jpg" width="20" align="absmiddle" />View Abstract</b></a></td>	
	</tr>
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
	<tr>
		<td><a href="paper.php"><b><img src="../gambar/paper.png" width="20" align="absmiddle" />View Paper</b></a></td>	
	</tr>
	
						<?php
							}
						?>
	<tr>
		<td><a href="dashboard_peserta.php"><b><img src="../gambar/dashboard.png" width="20" align="absmiddle" />View Participant</b></a></td>	
	</tr>
	<tr>
		<td><a href="dashboard_kategori.php"><b><img src="../gambar/dashboard.png" width="20" align="absmiddle" />View Paper Category</b></a></td>	
	</tr>
	<tr>
		<td><a href="dashboard_paper.php"><b><img src="../gambar/dashboard.png" width="20" align="absmiddle" />View Selection Paper</b></a></td>	
	</tr>
	<tr>
		<td><a href="dashboard_kuesioner.php"><b><img src="../gambar/dashboard.png" width="20" align="absmiddle" />View Questionnaire</b></a></td>	
	</tr>
</table>
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