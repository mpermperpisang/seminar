<?php
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
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
		<td><a href="panitia.php"><b><img src="../gambar/panitia.png" width="20" align="absmiddle" />Manage Committee</b></a></td>				
	</tr>
	<tr>
		<td><a href="peserta.php"><b><img src="../gambar/peserta.png" width="20" align="absmiddle" />Manage Participant</b></a></td>				
	</tr>
	<tr>
		<td><a href="reviewer.php"><b><img src="../gambar/reviewer.jpg" width="20" align="absmiddle" />Manage Reviewer</b></a></td>				
	</tr>
	<tr>
		<td><a href="kategori.php"><b><img src="../gambar/kategori.png" width="20" align="absmiddle" />Manage Category of Paper</b></a></td>	
	</tr>
	<tr>
		<td><a href="scan_transfer.php"><b><img src="../gambar/scan_transfer.png" width="20" align="absmiddle" />Manage Scan Proof of Payment</b></a></td>	
	</tr>	
	<tr>
		<td><a href="jadwal.php"><b><img src="../gambar/year.png" width="20" align="absmiddle" />Manage Presentation Schedule</b></a></td>	
	</tr>	
	<tr>
		<td><a href="ttd.php"><b><img src="../gambar/sign.png" width="20" align="absmiddle" />Manage Signature</b></a></td>	
	</tr>
	<tr>
		<td><a href="add_urutan.php"><b><img src="../gambar/sequence.png" width="20" align="absmiddle" />Manage Sequence</b></a></td>	
	</tr>
	<tr>
		<td><a href="kuesioner.php"><b><img src="../gambar/kuesioner.png" width="20" align="absmiddle" />Manage Questionnaire</b></a></td>	
	</tr>
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
	<tr>
		<td><a href="dashboard_peserta.php"><b><img src="../gambar/dashboard.png" width="20"  align="absmiddle"/>View Participant</b></a></td>	
	</tr>
	<tr>
		<td><a href="dashboard_kategori.php"><b><img src="../gambar/dashboard.png" width="20"  align="absmiddle"/>View Paper Category</b></a></td>	
	</tr>
	<tr>
		<td><a href="dashboard_paper.php"><b><img src="../gambar/dashboard.png" width="20"  align="absmiddle"/>View Participant Paper</b></a></td>	
	</tr>
	<tr>
		<td><a href="dashboard_kuesioner.php"><b><img src="../gambar/dashboard.png" width="20"  align="absmiddle"/>View Questionnaire</b></a></td>	
	</tr>
	<?php
		}
	?>
	<tr>
		<td><a href="arsip_peserta.php"><b><img src="../gambar/arsip.png" width="20"  align="absmiddle"/>Participant Archive</b></a></td>	
	</tr>
	<tr>
		<td><a href="arsip_paper.php"><b><img src="../gambar/arsip.png" width="20"  align="absmiddle"/>Paper Archive</b></a></td>	
	</tr>
</table>
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