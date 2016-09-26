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
				<td colspan="6">
					<p align="justify">
						<b><font size="+1">SCAN PROOF OF TRANSFER LIST</font></b>
						<?php			
							$link=koneksi_db();	
							$sql = "select * from cms_scan_transfer,cms_peserta,cms_pengguna,cms_tahun
									where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_tahun.id_tahun=cms_peserta.id_tahun
									and cms_tahun.kode_aktif='1'";
						?>	
				</td>			
				<td align="right"><br>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<select name="fieldcari">
										<option value="date_upload" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="date_upload") echo "selected";?>>Date Upload</option>
										<option value="nama_pengguna" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="nama_pengguna") echo "selected";?>>Name</option>
									</select>
									<input type="text" name="keyword" size=10 value="<?php if (isset($_POST["keyword"])) echo $_POST['keyword'];?>">
									<input type="image" src="../gambar/enter.jpg" width="20" align="absmiddle">

								</form>
								<?php
									if(isset($_POST['keyword']))
									{
										$fieldcari=$_POST['fieldcari'];
										$keyword=$_POST['keyword'];
										$sql=$sql." and $fieldcari like '%$keyword%'  
											order by cms_scan_transfer.status_bayar asc";
									}
								?>
				</td>
			</tr>
			<tr>
				<td colspan="8">
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>
			</tr>
			<tr>
				<td colspan="7">
						<?php
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
									$sql2 = "select * from cms_scan_transfer,cms_peserta,cms_pengguna,cms_tahun
											where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
											and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
											and cms_peserta.id_tahun=cms_tahun.id_tahun
											and cms_tahun.kode_aktif='1'
											and status_bayar=1";
									$res2 = mysql_query($sql2);
									$banyakrecord2=mysql_num_rows($res2);
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of scan proof of transfer</div>
								<div align="right">There are <b><?php echo $banyakrecord2;?></b> data of scan proof of transfer that not confirmed yet</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Date Upload</th>
						<th>Name</th>
						<th>Type of Participant</th>
						<th>Total Paper</th>
						<th>Payment Status</th>
						<th colspan="2">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of scan proof of transfer not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id_scan_transfer = $select_result['id_scan_transfer'];
									$id_pengguna = $select_result['id_pengguna'];
									$tgl_upload=$select_result['date_upload'];
									$nama_pengguna=$select_result['nama_pengguna'];
									$ucnama=ucwords($nama_pengguna);
									$kategori_peserta=$select_result['kategori_peserta'];
									$status_bayar=$select_result['status_bayar'];
									
									if ($kategori_peserta=='1') 
									{
										$ket='Participant With Paper';
									}
									else if ($kategori_peserta=='2') 
									{
										$ket='Participant Without Paper';
									}
									
									if ($status_bayar=='1') 
									{
										$ket_2='Not Confirmed Yet';
									}
									else if ($status_bayar=='2') 
									{
										$ket_2='Confirmed';
									}
									
									echo "
									<tr>
										<td align='center'>$id_scan_transfer</td>
										<td align='center'>$tgl_upload</td>
										<td>$ucnama</td>
										<td>$ket</td>
									";
									$sql2 = "select * from cms_paper,cms_abstrak,cms_peserta
											where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
											and cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cms_paper.status_penerimaan_paper=2
											and cms_peserta.id_pengguna='$id_pengguna'";
									$res2 = mysql_query($sql2);
									$banyakrecord=mysql_num_rows($res2);
									
									echo "
										<td align='center'>$banyakrecord</td>
										<td>$ket_2</td>
										<td align='center'>";
										$sql2 = "select * from cms_scan_transfer where id_pengguna='$id_pengguna'";
										$res2 = mysql_query($sql2);
										while($select_result2 = mysql_fetch_array($res2))
										{								
											$foto2=$select_result2['nama_scan'];
											$tipe=$select_result2['tipe_file'];
										}
									echo"		<a href='../scan_bukti_transfer/$foto2.$tipe' target='new'><img src='../gambar/see.png' width='25'  title='Click to Zoom In'></a>
										</td>
										<form method=\"POST\" action=\"publish_scan_transfer.php?id=$id_scan_transfer\">
										<td>
											<input type=\"hidden\" value=\"$id_scan_transfer\" name=\"id_scan_transfer\"><center>
											<input type='image' title='Agree Scan Proof of Transfer' src='../gambar/publish.jpg' width='25'>
										</td>
										</form>
									</tr>";
								}
						?>
					</p>
				</td>
			</tr>
		</table>
		<table align="right">
			<tr align="right">
				<td>
					<div class="backtotop">
						<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top">
							Back to Top
						</a>
					</div>
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