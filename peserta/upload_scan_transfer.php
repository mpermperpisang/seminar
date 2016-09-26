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
			<table border=0 width=75% align="center">	
				<tr>
					<td>
						<p align="justify">
							<b><font size="+1">UPLOAD SCAN OF TRANSFER</font></b>
							<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
							<form action='insert_scan_transfer.php' enctype="multipart/form-data" method='POST'>
								<?php
									$id=$_SESSION['id_pengguna'];
									$sql = "select * from cms_peserta,cms_abstrak,cms_paper
											where cms_peserta.kategori_peserta=1
											and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
											and cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cms_paper.status_penerimaan_paper=2
											and cms_peserta.id_pengguna='$id'";
									$query = mysql_query($sql,$link);
									$banyakrecord=mysql_num_rows($query);
									$sqla = "select * from cms_peserta
											where cms_peserta.kategori_peserta=2
											and cms_peserta.id_pengguna='$id'";
									$querya = mysql_query($sqla,$link);
									$banyakrecorda=mysql_num_rows($querya);
									if (($banyakrecord>0) || ($banyakrecorda>0))
									{
									$sql2 = "select * from cms_scan_transfer,cms_peserta
										where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
										and cms_scan_transfer.id_pengguna='$id'
										and (cms_scan_transfer.status_bayar=2 or cms_scan_transfer.status_bayar=1)";
									$query2 = mysql_query($sql2,$link);
									$banyakrecord2=mysql_num_rows($query2);
									if($banyakrecord2>0)
									{
								?>
										<div align="right">There are <b><?php echo $banyakrecord2;?></b> data of scan proof of transfer</div>	
											<table align='center' border='0' width=100% cellpadding='5'>
												<tr align="center" bgcolor="#CCCCCC">
													<th>ID Payment</th>
													<th>Date Upload</th>
													<th>Name of File</th>
													<th>Confirmation Status</th>
												</tr>									
								<?php 
										while($select_result = mysql_fetch_array($query2))
										{
											$id_scan_transfer = $select_result['id_scan_transfer'];
											$date = $select_result['date_upload'];
											$nama_scan = $select_result['nama_scan'];
											$tipe_file = $select_result['tipe_file'];
											$status_bayar = $select_result['status_bayar'];
											$id_pengguna = $select_result['id_pengguna'];
											
											echo "
												<tr>
													<td align='center'>$id_scan_transfer</td>
													<td align='center'>$date</td>
													<td align='center'>$nama_scan.$tipe_file</td>
											";
											if ($status_bayar=='1')
											{
												$ket='Not Confirmed Yet';
											}
											else if ($status_bayar=='2')
											{
												$ket='Confirmed';
											}
											
											if ($status_bayar=='1')
											{
													echo"<td align='center'>$ket</td>";
											}
											else if ($status_bayar=='2')
											{
													echo"<td align='center'><a href='download_name_tag.php' title='Click to Download Name Tag' id='link'>$ket</a></td>";
											}
											else
											{
													echo"<td align='center'>$ket</td>";
											}
												echo "</tr>";
										}
									}
									else
									{
								?>
										<div align="right">Your scan proof of transfer not found. Please upload your scan proof of transfer</div>	
								<?php
									};
									
									$id=$_SESSION['id_pengguna'];
									$sql2 = "select * from cms_scan_transfer,cms_peserta
										where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
										and cms_scan_transfer.id_pengguna='$id'
										and (cms_scan_transfer.status_bayar=2 or cms_scan_transfer.status_bayar=1)";
									$query2 = mysql_query($sql2,$link);
									$banyakrecord=mysql_num_rows($query2);
									if($banyakrecord<1)
									{
									$sql3 = "select * from cms_tahun
											where kode_aktif='1'";
									$query3 = mysql_query($sql3);
									$banyakrecord3=mysql_num_rows($query3);
									if($banyakrecord3>0)
									{
										while($select_result = mysql_fetch_array($query3))
										{
											$tgl_akhir = $select_result['tgl_akhir'];
										}
										$tgl_now=date('Y-m-d'); 
										if ($tgl_now<>$tgl_akhir)
										{
								?>
							<table align="center" border="0" width=50% cellpadding="5">
								<tr>
									<td colspan="2"><h5>*format upload in jpg, jpeg, png</h5></td>
								</tr>
								<tr>
									<td>Upload*</td>
									<td><input type=file name="scan_transfer" required></td>
								</tr>
								<tr>
									<td align="right">
										<input type='image' src='../gambar/add.png' width='25' name='kirim' title='Upload Scan Proof of Transfer'>
									</td>
							</form>
							<?php
									$sql2 = "select * from cms_peserta
											where cms_peserta.id_pengguna='$id'";
									$query2 = mysql_query($sql2,$link);
									while($select_result = mysql_fetch_array($query2))
									{
										$id_peserta = $select_result['kategori_peserta'];
									}
									if ($id_peserta=='1')
									{
							?>
							<form action="upload_paper.php">
									<td align="left">
										<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'>
									</td>
							</form>
							<?php
									}
									else
									{
							?>
							<form action="index.php">							
									<td align="left">
										<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'>
									</td>
							</form>
							<?php
									}
							?>
								</tr>
							</table>
							<?php } 
							else
							{
								  	echo "
							<br><table align='center' border='0' width=75% cellpadding='5'><tr><td align='center'>You can not upload scan proof of transfer because seminar is over. You can try it in next seminar. Thank you</td></tr>
							</table>";
							}
							} 
							} ?>
						</p>
					</td>
				</tr>
			</table><br>
			<?php
								$id=$_SESSION['id_pengguna'];
								$sqlb = "select * from cms_scan_transfer,cms_peserta
										where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
										and cms_peserta.id_pengguna='$id'
										and cms_scan_transfer.status_bayar=2";
								$queryb = mysql_query($sqlb);
								while($select_resultb = mysql_fetch_array($queryb))
								{
									$id_peserta=$select_resultb['kategori_peserta'];
								if ($id_peserta=='1')
								{
			?>
			<p align="right"><font size="-1">Click the link above to download name tag for presenter that present at the seminar.<br>You don't need to download name tag if you aren't present at the seminar. Thank you.</font><font size="-2"><br><br>
			note : download the name tag is an automatic representation of your present at seminar</font></p>
			<?php
								}
								else if ($id_peserta=='2')
								{
			?>
			<p align="right"><font size="-1">Click the link above to download name tag for participant. Thank you.</font><font size="-2"><br><br>
			<?php
								}
								}			
								}
								else
								{
					echo"
					<table border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
					<tr align='center'>
					<td>
									Please update your type of participant first in manage profile menu
					</td>
					</tr>
					</table>";
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