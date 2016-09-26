<?php
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="4"))
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
	<?php
		$id=$_SESSION['id_pengguna'];
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
	<tr>
		<td><a href="abstract.php"><b><img src="../gambar/abstract.jpg" width="20" align="absmiddle" />Manage Abstract</b></a></td>				
	</tr>
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
	<tr>
		<td><a href="paper.php"><b><img src="../gambar/paper.png" width="20" align="absmiddle" />Manage Paper</b></a></td>	
	</tr>
	<?php
		}
	?>
	<tr>
		<td><a href="bidang_kajian.php"><b><img src="../gambar/bidang_kajian.png" width="20" align="absmiddle" />Manage Category Review</b></a></td>	
	</tr>
</table>
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