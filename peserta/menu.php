<?php
	$link=koneksi_db();
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
	$id=$_SESSION['id_pengguna'];
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
	$query="select * from cms_peserta 
		where cms_peserta.id_pengguna='$id'
		and kategori_peserta is not null";
	$res_query = mysql_query($query);
	$banyakrecord=mysql_num_rows($res_query);
	if($banyakrecord>0)
	{
	$sql = "select * from cms_pengguna,cms_peserta
			where cms_pengguna.kategori_pengguna=1
			and cms_pengguna.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.kategori_peserta=1
			and cms_pengguna.id_pengguna='$id'";
	$query = mysql_query($sql,$link);
	$banyakrecord=mysql_num_rows($query);
	if($banyakrecord>0)
	{
	$sqla = "select * from cms_abstrak,cms_peserta
			where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'
			and (cms_abstrak.status_penerimaan_abstrak=1 or cms_abstrak.status_penerimaan_abstrak=2)";
	$querya = mysql_query($sqla,$link);
	$banyakrecorda=mysql_num_rows($querya);
	if($banyakrecorda<1)
	{
	?>
	<tr>
		<td><a href="upload_abstrak.php"><b><img src="../gambar/upload.png" width="20"  align="absmiddle"/>Upload Abstract</b></a></td>				
	</tr>
	<?php
	}
	$sqla = "select * from cms_abstrak,cms_peserta
			where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'
			and (cms_abstrak.status_penerimaan_abstrak=2 or cms_abstrak.status_penerimaan_abstrak=1)";
	$querya = mysql_query($sqla,$link);
	$banyakrecorda=mysql_num_rows($querya);
	if($banyakrecorda>0)
	{
	?>
	<tr>
		<td><a href="upload_abstrak.php"><b><img src="../gambar/info.png" width="20" align="absmiddle" />Info Abstract</b></a></td>				
	</tr>
	<?php
	}									
	$sql = "select * from cms_abstrak,cms_peserta
			where cms_abstrak.status_penerimaan_abstrak=2
			and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'";
	$query = mysql_query($sql,$link);
	$banyakrecord=mysql_num_rows($query);											
	$sqla = "select * from cms_paper,cms_abstrak,cms_peserta
			where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'
			and (cms_paper.status_penerimaan_paper=1 or cms_paper.status_penerimaan_paper=2 or cms_paper.status_penerimaan_paper=4)
			and cms_abstrak.id_abstrak=cms_paper.id_abstrak";
	$querya = mysql_query($sqla,$link);
	$banyakrecorda=mysql_num_rows($querya);
	if(($banyakrecord>0) && ($banyakrecorda<1))
	{
	?>
	<tr>
		<td><a href="upload_paper.php"><b><img src="../gambar/upload.png" width="20" align="absmiddle" />Upload Paper</b></a></td>				
	</tr>
	<?php
	}
	$sqla = "select * from cms_abstrak,cms_peserta,cms_paper
			where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'
			and cms_paper.id_abstrak=cms_abstrak.id_abstrak
			and (cms_paper.status_penerimaan_paper=2 or cms_paper.status_penerimaan_paper=1 or cms_paper.status_penerimaan_paper=4)";
	$querya = mysql_query($sqla,$link);
	$banyakrecorda=mysql_num_rows($querya);
	if($banyakrecorda>0)
	{
	?>
	<tr>
		<td><a href="upload_paper.php"><b><img src="../gambar/info.png" width="20" align="absmiddle" />Info Paper</b></a></td>				
	</tr>
	<?php
	}	
						$id=$_SESSION['id_pengguna'];								
						$sql = "select * from cms_paper,cms_abstrak,cms_peserta
								where (cms_paper.status_penerimaan_paper=1 or cms_paper.status_penerimaan_paper=2)
								and cms_paper.id_abstrak=cms_abstrak.id_abstrak
								and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.id_pengguna='$id'";
						$query = mysql_query($sql,$link);
						$banyakrecord=mysql_num_rows($query);									
						$sqla = "select * from cms_abstrak,cms_peserta
								where cms_abstrak.status_penerimaan_abstrak=1
								and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.id_pengguna='$id'";
						$querya = mysql_query($sqla,$link);
						$banyakrecorda=mysql_num_rows($querya);										
						$sqlb = "select * from cms_abstrak,cms_peserta
								where cms_abstrak.status_penerimaan_abstrak=2
								and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.id_pengguna='$id'";
						$queryb = mysql_query($sqlb,$link);
						$banyakrecordb=mysql_num_rows($queryb);
						if (($banyakrecord>0) || (($banyakrecorda<=2) && ($banyakrecordb<1)))
						{									
						$sqlz = "select * from cms_abstrak,cms_peserta
								where cms_abstrak.status_penerimaan_abstrak=1
								and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.id_pengguna='$id'";
						$queryz = mysql_query($sqlz,$link);
						$banyakrecordz=mysql_num_rows($queryz);									
						$sqlr = "select * from cms_paper,cms_abstrak,cms_peserta
								where cms_paper.id_abstrak=cms_abstrak.id_abstrak
								and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.id_pengguna='$id'
								and (cms_paper.status_penerimaan_paper=1 or cms_paper.status_penerimaan_paper=2)";
						$queryr = mysql_query($sqlr,$link);
						$banyakrecordr=mysql_num_rows($queryr);
						if (($banyakrecordz>0) || ($banyakrecordr>0))
						{		
	$sqla = "select * from cms_scan_transfer,cms_peserta
			where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'
			and cms_scan_transfer.status_bayar=2";
	$querya = mysql_query($sqla,$link);
	$banyakrecorda=mysql_num_rows($querya);
	if($banyakrecorda<1)
	{
	?>
	<tr>
		<td><a href="upload_scan_transfer.php"><b><img src="../gambar/upload.png" width="20" align="absmiddle" />Upload Scan Payment</b></a></td>				
	</tr>
	<?php
	}
	}
	}
	$sqla = "select * from cms_scan_transfer,cms_peserta
			where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'
			and cms_scan_transfer.status_bayar=2";
	$querya = mysql_query($sqla,$link);
	$banyakrecorda=mysql_num_rows($querya);
	if($banyakrecorda>0)
	{
	?>
	<tr>
		<td><a href="upload_scan_transfer.php"><b><img src="../gambar/info.png" width="20" align="absmiddle" />Info Payment</b></a></td>				
	</tr>
	<?php
	}											
	$sql = "select * from cms_jadwal,cms_paper,cms_abstrak,cms_peserta
		where cms_jadwal.id_paper=cms_paper.id_paper
		and cms_paper.id_abstrak=cms_abstrak.id_abstrak
		and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
		and cms_peserta.id_pengguna='$id'";
	$query = mysql_query($sql,$link);
	$banyakrecord=mysql_num_rows($query);
	if($banyakrecord>0)
	{
	?>
	<tr>
		<td><a href="jadwal.php"><b><img src="../gambar/info.png" width="20" align="absmiddle" />Info Presentation</b></a></td>	
	</tr>
	<?php
	}
	$sql = "select * from cms_paper,cms_peserta,cms_abstrak
			where cms_paper.status_penerimaan_paper=2
			and cms_abstrak.id_abstrak=cms_paper.id_abstrak
			and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'";
	$query = mysql_query($sql,$link);
	$banyakrecord=mysql_num_rows($query);
	if($banyakrecord>0)
	{
	?>
	<tr>
		<td><a href="download_letter.php"><b><img src="../gambar/download.png" width="20" align="absmiddle" />Download Letter</b></a></td>	
	</tr>
	<?php
	}
	}
	else
	{
	$sqla = "select * from cms_scan_transfer,cms_peserta
			where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'
			and cms_scan_transfer.status_bayar=2";
	$querya = mysql_query($sqla,$link);
	$banyakrecorda=mysql_num_rows($querya);
	if($banyakrecorda<1)
	{
	?>
	<tr>
		<td><a href="upload_scan_transfer.php"><b><img src="../gambar/upload.png" width="20" align="absmiddle" />Upload Scan Payment</b></a></td>				
	</tr>
	<?php
	}
	$sqla = "select * from cms_scan_transfer,cms_peserta
			where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
			and cms_peserta.id_pengguna='$id'
			and cms_scan_transfer.status_bayar=2";
	$querya = mysql_query($sqla,$link);
	$banyakrecorda=mysql_num_rows($querya);
	if($banyakrecorda>0)
	{
	?>
	<tr>
		<td><a href="upload_scan_transfer.php"><b><img src="../gambar/info.png" width="20" align="absmiddle" />Info Payment</b></a></td>				
	</tr>
	<?php
	}
	}
	?>
	<tr>
		<td><a href="kuesioner.php?id_urutan_pertanyaan=1"><b><img src="../gambar/kuesioner.png" width="20" align="absmiddle" />Fill Questionnaire</b></a></td>					
	</tr>
</table>
<?php
	}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"1"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>