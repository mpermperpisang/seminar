<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>HEADSHIP PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="center">	
			<tr>
				<td colspan="7">
					<p align="justify">
						<b><font size="+1">PAPER LIST</font></b>
						<?php			
							$link=koneksi_db();		
							$id=$_SESSION['id_pengguna'];		
							$sql = "select * from cms_abstrak,cms_peserta,cms_pengguna,cms_bidang_kajian,cms_paper,cms_tahun
									where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
									and cms_paper.id_abstrak=cms_abstrak.id_abstrak
									and cms_tahun.id_tahun=cms_peserta.id_tahun
									and cms_tahun.kode_aktif='1'";
						?>	
					</p>
				</td>
				<td align="right"><br>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<select name="fieldcari">
										<option value="nama_pengguna" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="nama_pengguna") echo "selected";?>>Presenter's Name</option>
										<option value="judul" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="judul") echo "selected";?>>Title of Paper</option>
										<option value="nama_bidang_kajian" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="nama_bidang_kajian") echo "selected";?>>Paper's Category</option>
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
										order by cms_paper.status_review_paper,cms_paper.nilai desc";
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
				<td colspan="8">
						<?php
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of paper</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Date</th>
						<th>Name</th>
						<th>Title</th>
						<th>Category of Paper</th>
						<th>Acceptance Status</th>
						<th>Value</th>
						<th>Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of paper not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id_paper = $select_result['id_paper'];
									$nama_pengguna = $select_result['nama_pengguna'];
									$ucnama=ucwords($nama_pengguna);
									$tgl = $select_result['tgl_upload_paper'];
									$judul = $select_result['judul'];
									$upjudul=strtoupper($judul);
									$bidang_kajian = $select_result['nama_bidang_kajian'];
									$status_penerimaan=$select_result['status_penerimaan_paper'];
									$nilai=$select_result['nilai'];
									
									if ($status_penerimaan=='1')
									{
										$status_penerimaan_paper='Rejected';
									}
									else if ($status_penerimaan=='2')
									{
										$status_penerimaan_paper='Accepted';
									}
									else if ($status_penerimaan=='3')
									{
										$status_penerimaan_paper='Please Wait The Review';
									}
									
									echo "
									<tr>
										<td align='center'>$id_paper</td>
										<td>$tgl</td>
										<td>$ucnama</td>
										<td>$upjudul</td>
										<td>$bidang_kajian</td>
										<td>$status_penerimaan_paper</td>
										<td>$nilai</td>
										<form method=\"POST\" action=\"lihat_paper.php?id=$id_paper\" target='new'>
										<td align='center'>
											<input type=\"hidden\" value=\"$id_paper\" name=\"id_paper\"><center>
											<input type='image' title='Download Paper' src='../gambar/download.png' width='25'>
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
	  ($_SESSION['aktif']<>"5"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>