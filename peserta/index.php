<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>PARTICIPANT PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="center">	
			<tr>
						<?php			
							$link=koneksi_db();			
							$id=$_SESSION['id_pengguna'];
							$sql = "select foto,tipe_file,jenis_kelamin from cms_peserta,cms_pengguna,cms_tahun
									where cms_peserta.id_pengguna='$id'
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_peserta.id_tahun=cms_tahun.id_tahun
									and cms_tahun.kode_aktif='1'";
							$query = mysql_query($sql,$link);
							$banyakrecord=mysql_num_rows($query);
							if($banyakrecord>0)
							{
							?>
				<td width="90%" valign="top">
							<?php
							}
							else
							{
							?>
				<td width="100%" valign="top">
							<?php
							}
							?>
					<p align="justify">
				  <b><h3>PARTICIPANT'S MENU</h3></b>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>
				<td>
						<?php			
							$link=koneksi_db();			
							$id=$_SESSION['id_pengguna'];
							$sql = "select foto,tipe_file,jenis_kelamin from cms_peserta,cms_pengguna,cms_tahun
									where cms_peserta.id_pengguna='$id'
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_peserta.id_tahun=cms_tahun.id_tahun
									and cms_tahun.kode_aktif='1'";
							$query = mysql_query($sql,$link);
							$banyakrecord=mysql_num_rows($query);
							if($banyakrecord>0)
							{
							while($select_result = mysql_fetch_array($query))
							{
								$foto=$select_result['foto'];
								$tipe_file=$select_result['tipe_file'];
								$kelamin=$select_result['jenis_kelamin'];
							}
							if ($foto==NULL)
							{
								if ($kelamin=='Female')
								{
						?>
						<a href="profile.php">
							<img src="../foto/female.jpg" width="150" height="150" title="Click to Change Photo"/>
						</a>
						<?php
								}
								else if ($kelamin=='Male')
								{
						?>
						<a href="profile.php">
							<img src="../foto/male.jpg" width="150" height="150" title="Click to Change Photo"/>
						</a>
						<?php
								}
							}
							else
							{
						?>
						<a href="profile.php">
								<img src="../foto/<?php echo "$foto.$tipe_file"; ?>" width="150" height="150" title="Click to Change Photo"/>
						</a>
						<?php
							}
						?>
				</td>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
								<td><a href="profile.php"><img src="../gambar/edit_user.png" width="100" title="Manage Profile"></a><br>Manage<br>Profile</td>
								<td><a href="account.php"><img src="../gambar/edit_account.png" width="100" title="Manage Account"></a><br>Manage<br>Account</td>
							</tr>
						</table>
						<?php											
						$sql = "select * from cms_pengguna,cms_peserta
								where cms_pengguna.kategori_pengguna='1'
								and cms_pengguna.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.kategori_peserta='1'
								and cms_pengguna.id_pengguna='$id'";
						$query = mysql_query($sql,$link);
						$banyakrecord=mysql_num_rows($query);
						if($banyakrecord>0)
						{
						?>			
						<table border='0' align='center' cellspacing='25' cellpadding='5'>	
						<?php											
						$sql = "select * from cms_abstrak,cms_peserta
								where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.id_pengguna='$id'
								and (cms_abstrak.status_penerimaan_abstrak=1 or cms_abstrak.status_penerimaan_abstrak=2)";
						$query = mysql_query($sql,$link);
						$banyakrecord=mysql_num_rows($query);
						if($banyakrecord>0)
						{
						?>	
							<tr align='center'>
								<td align="center"><a href='upload_abstrak.php'><img src='../gambar/info.png' width='100' title='Info Abstract'></a><br>Info<br>Abstract</td>
						<?php
						}											
						$sql = "select * from cms_paper,cms_abstrak,cms_peserta
								where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.id_pengguna='$id'
								and (cms_paper.status_penerimaan_paper=1 or cms_paper.status_penerimaan_paper=2 or cms_paper.status_penerimaan_paper=4)
								and cms_abstrak.id_abstrak=cms_paper.id_abstrak";
						$query = mysql_query($sql,$link);
						$banyakrecord=mysql_num_rows($query);
						if($banyakrecord>0)
						{
						?>
								<td align="center"><a href='upload_paper.php'><img src='../gambar/info.png' width='100' title='Info Paper'></a><br>Info<br>Paper</td>
						<?php
						}											
						$sql = "select * from cms_scan_transfer,cms_peserta
								where cms_scan_transfer.id_pengguna='$id'
								and cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
								and cms_scan_transfer.status_bayar=2";
						$query = mysql_query($sql,$link);
						$banyakrecord=mysql_num_rows($query);
						if($banyakrecord>0)
						{
						?>
								<td align="center"><a href='upload_scan_transfer.php'><img src='../gambar/info.png' width='100' title='Info Payment'></a><br>Info<br>Payment</td>
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
								<td align="center"><a href='jadwal.php'><img src='../gambar/info.png' width='100' title='Info Presentation Schedule'></a><br>Info<br>Presentation</td>
						<?php
						}
						?>
							</tr>
						</table>	
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
								<td><a href="upload_abstrak.php"><img src="../gambar/upload.png" width="100" title="Upload Abstract"></a><br>Upload<br>Abstract</td>
						<?php									
						$sql = "select * from cms_abstrak,cms_peserta
								where cms_abstrak.status_penerimaan_abstrak=2
								and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.id_pengguna='$id'";
						$query = mysql_query($sql,$link);
						$banyakrecord=mysql_num_rows($query);
						if($banyakrecord>0)
						{
						?>
								<td><a href='upload_paper.php'><img src='../gambar/upload.png' width='100' title='Upload Paper'></a><br>Upload<br>Paper</td>
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
						?>
								<td><a href='upload_scan_transfer.php'><img src='../gambar/upload.png' width='100' title='Upload Payment'></a><br>Upload<br>Scan Payment</td>	
						<?php
						}
						}
						?>
							</tr>
						</table>		
						<?php							
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
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr>
								<td align='center' colspan='3'>
									<a href='download_letter.php'><img src='../gambar/download.png' width='100' title='Download Authenticity and Acceptance Letter'></a>
									<br>Download<br>Letter
								</td>
							</tr>
						</table>	
						<?php
						}
						}
						$sqlh = "select * from cms_scan_transfer,cms_peserta
								where cms_scan_transfer.id_pengguna='$id'
								and cms_scan_transfer.status_bayar=2
								and cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
								and cms_peserta.kategori_peserta=2";
						$queryh = mysql_query($sqlh,$link);
						$banyakrecordh=mysql_num_rows($queryh);
						if($banyakrecordh>0)
						{
						?>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr>												
								<td align="center">
									<a href='upload_scan_transfer.php'>
										<img src='../gambar/info.png' width='100' title='Info Payment'>
									</a>
								<br>Info<br>Payment
								</td>	
							</tr>
						</table>
						<?php	
						}
						$sqla = "select * from cms_pengguna,cms_peserta
								where cms_peserta.kategori_peserta=2
								and cms_peserta.id_pengguna='$id'";								
				
						$querya = mysql_query($sqla,$link);
						$banyakrecorda=mysql_num_rows($querya);
						if($banyakrecorda>0)
						{
						?>
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr>												
								<td align="center">
									<a href='upload_scan_transfer.php'>
										<img src='../gambar/upload.png' width='100' title='Upload Payment'>
									</a>
								<br>Upload<br>Scan Payment
								</td>	
							</tr>
						</table>
						<?php	
						}
						?>			
						<table border="0" align="center" cellspacing="25" cellpadding="5">
							<tr align="center">
										<form method="POST" action="kuesioner.php?id_urutan_pertanyaan=1">
										<td>
											<input type="hidden" value="1" name="id_urutan_pertanyaan"><center>
											<input type='image' title="Fill Questionnaire" src='../gambar/kuesioner.png' width='100'><br>Fill<br>Questionnaire
										</td>
										</form>
							</tr>
						</table>
					</p>
				</td>
			</tr>
						<?php
							}
							else
							{		
						?>
							<tr>
								<td align="center" height="50">
									Please create a new account to participate in this year's research seminar
								</td>
							</td>
						<?php
							}
						?>
		</table>
		<?php include('../footer.php'); ?>
	</body>
</html>
<?php
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