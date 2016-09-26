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
		<table border=0 width=100% align="center">	
			<tr>
				<td colspan="7">
					<p align="justify">
						<b><font size="+1">PAPER LIST</font></b>
						<?php			
							$link=koneksi_db();		
							$id=$_SESSION['id_pengguna'];		
							$sql = "select * from cms_reviewer,reviewer_bidang_kajian,cms_peserta,cms_paper,cms_abstrak,cms_bidang_kajian,review_paper,cms_pengguna,cms_tahun
							where cms_paper.id_abstrak=cms_abstrak.id_abstrak
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
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of paper on your category of review</div>
								<div align="right">There are <b><?php echo $banyakrecord2;?></b> data of paper that not reviewed yet</div>
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
						<th>Status Review</th>
						<th>Acceptance Status</th>
						<th>Value</th>
						<th colspan="3">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of paper on your category of review not found</div>	
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
									$nilai = $select_result['nilai'];
									$upjudul=strtoupper($judul);
									$id_bidang_kajian = $select_result['id_bidang_kajian'];
									$bidang_kajian = $select_result['nama_bidang_kajian'];
									$status_review = $select_result['status_review_paper'];
									$status_penerimaan = $select_result['status_penerimaan_paper'];
									
									if ($status_review=='1')
									{
										$ket='Unreviewed';
									}
									else if ($status_review=='2')
									{
										$ket='Been Reviewed';
									}
									
									if ($status_penerimaan=='1')
									{
										$ket_2='Rejected';
									}
									else if ($status_penerimaan=='2')
									{
										$ket_2='Accepted';
									}
									else if ($status_penerimaan=='3')
									{
										$ket_2='Please Wait The Review';
									}
									else if ($status_penerimaan=='4')
									{
										$ket_2='Revision';
									}
									
									echo "
									<tr>
										<td align='center'>$id_paper</td>
										<td>$tgl</td>
										<td>$ucnama</td>
										<td>$upjudul</td>
										<td>$bidang_kajian</td>
										<td>$ket</td>
										<td>$ket_2</td>
										<td align='center'>$nilai</td>
										<form method=\"POST\" action=\"lihat_paper.php?id=$id_paper\" target='new'>
										<td align='center'>
											<input type=\"hidden\" value=\"$id_paper\" name=\"id_paper\"><center>
											<input type='image' title='Download Paper' src='../gambar/download.png' width='25'>
										</td>
										</form>
										<form method=\"POST\" action=\"edit_paper.php?id=$id_paper\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_bidang_kajian\" name=\"id_bidang_kajian\">
											<input type=\"hidden\" value=\"$id_paper\" name=\"id_paper\"><center>
											<input type='image' title='Write Review' src='../gambar/edit.png' width='25'>
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
	  ($_SESSION['aktif']<>"4"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>