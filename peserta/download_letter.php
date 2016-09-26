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
		<?php include ('menu.php'); ?>
		<?php				
			$id=$_SESSION['id_pengguna'];	
			$sqla = "select ttd from cms_peserta
					where id_pengguna='$id'
					and (ttd<>' ' or ttd is not null)";
			$resa = mysql_query($sqla);
			$banyakrecorda=mysql_num_rows($resa);
			if($banyakrecorda>0)
			{
		?>	
			<table border=0 width=75% align="center">	
				<tr>
					<td>
						<p align="justify">
							<b><font size="+1">DOWNLOAD LETTER</font></b>
							<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
							<?php				
								$sql = "select * from cms_peserta,cms_abstrak,cms_paper
								where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
								and cms_paper.id_abstrak=cms_abstrak.id_abstrak
								and cms_abstrak.id_pengguna='$id'
								and cms_paper.status_penerimaan_paper='2'";
								$res = mysql_query($sql);
							?>	
					</td>		
				</tr>
				<tr>
					<td>
							<?php
								$banyakrecord=mysql_num_rows($res);
								if($banyakrecord>0)
								{
							?>
									<div align="right">There are <b><?php echo $banyakrecord;?></b> data of paper</div>
							<?php 
								}
								else
								{
							?>
									<div align="right">Data of paper not found</div>	
							<?php
								};
							?>
					</td>
				</tr>
			</table>
			<table align="center" border="0" cellpadding="5" width=75%>
						<tr align="center" bgcolor="#CCCCCC">
							<th>Code</th>
							<th>Paper Title</th>
							<th>Authentication Letter</th>
							<th>Acceptance Letter</th>
						</tr>
							<?php
									while($select_result = mysql_fetch_array($res))
									{
										$kode=$select_result['id_paper'];
										$judul=$select_result['judul'];
										$upjudul=strtoupper($judul);
										echo "
										<tr>
											<td align='center'>$kode</td>
											<td>$upjudul</td>
											<form method=\"POST\" action=\"download_surat_keaslian.php?id=$kode\" target='new'>
											<td align='center'>
												<input type=\"hidden\" value=\"$kode\" name=\"id_paper\">
												<input type='image' title='Download Authentication Letter' src='../gambar/print.jpg' width='25'>&nbsp;
											</td>
											</form>
											<form method=\"POST\" action=\"download_surat_penerimaan.php?id=$kode\" target='new'>
											<td align='center'>
												<input type=\"hidden\" value=\"$kode\" name=\"id_paper\">
												<input type='image' title='Download Acceptance Letter' src='../gambar/print.jpg' width='25'>&nbsp;
											</td>
											</form>
										</tr>";
									}	
							?>
						</p>
					</td>
				</tr>
			</table>
			<?php
				}
				else
				{
			?>
			<table border=0 width=75% align="center">	
				<tr>
					<td>
						<p align="justify">
							<b><font size="+1">UPLOAD SIGNATURE</font></b>
							<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</td>
				</tr>
			</table>
			<form action='update_ttd.php' enctype="multipart/form-data" method='POST'>
			<table align="center" border="0" width=50% cellpadding="5">
				<tr>
					<td colspan="2"><h5>*format upload in jpg, jpeg, png</h5></td>
				</tr>
				<tr>
					<td>Upload*</td>
					<td><input type=file name="ttd" required></td>
				</tr>
				<tr>
					<td align="right">
						<input type='image' src='../gambar/add.png' width='25' name='kirim' title='Upload Signature'>
					</td>
			</form>
			<form action='index.php' enctype="multipart/form-data" method='POST'>
					<td align="left">
						<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'>
					</td>
			</form>
				</tr>
			</table>
			<p align="right"><font size="-1">Before download the authentication or acceptance letter, please upload your signature first.</font><font size="-2">
			<?php
				}
			?>
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