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
				<td colspan="7">
					<p align="justify">
						<b><font size="+1">REVIEWER LIST</font></b>
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_pengguna,cms_reviewer
							where cms_pengguna.id_pengguna=cms_reviewer.id_pengguna";
						?>	
				</td>		
				<td align="right"><br>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<select name="fieldcari">
										<option value="username" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="username") echo "selected";?>>Username</option>
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
											order by cms_reviewer.id_pengguna asc";
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
					<a href="../download_reviewer.php"><img src="../gambar/print.jpg" width="25" title="Print Reviewer"></a>
				</td>
				<td>
						<?php
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of reviewer</div>
				</td>
			</tr>
		</table>
		<table align="left" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Category of Review</th>
						<th>Total Abstract Review</th>
						<th>Total Paper Review</th>
						<th>Account Status</th>
						<th colspan="2">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of reviewer not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_pengguna'];
									$username=$select_result['username'];
									$email=$select_result['email'];
									$nama=$select_result['nama_pengguna'];
									$ucnama=ucwords($nama);
									$kelamin=$select_result['jenis_kelamin'];
									$telp=$select_result['telp'];
									$id_kategori_pengguna=$select_result['kategori_pengguna'];
									
									if ($id_kategori_pengguna=='4')
									{
										$ket='Active';
									}
									else if ($id_kategori_pengguna=='6')
									{
										$ket='Nonactive';
									}
									echo "
									<tr>
										<td align='center'>$id</td>
										<td>$ucnama</td>
										<td>$telp</td>
										<form method=\"POST\" action=\"bidang_kajian.php?id=$id\">
										<td align='center'>
												<input type='image' src='../gambar/bidang_kajian.png' width='25'>
												<input type=\"hidden\" value=\"$id\" name=\"id_pengguna\">
										</td>
										</form>
									";		
										$sql2 = "select * from review_abstrak,cms_reviewer,cms_abstrak,cms_peserta,cms_tahun
												where cms_reviewer.id_pengguna=review_abstrak.id_pengguna
												and review_abstrak.id_pengguna='$id'
												and review_abstrak.id_abstrak=cms_abstrak.id_abstrak
												and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
												and cms_peserta.id_tahun=cms_tahun.id_tahun
												and cms_tahun.kode_aktif='1'";
										$res2 = mysql_query($sql2);
										$banyakrecord2=mysql_num_rows($res2);	
										$sql3 = "select * from review_paper,cms_reviewer,cms_paper,cms_abstrak,cms_peserta,cms_tahun
												where cms_reviewer.id_pengguna=review_paper.id_pengguna
												and review_paper.id_pengguna='$id'
												and review_paper.id_paper=cms_paper.id_paper
												and cms_paper.id_abstrak=cms_abstrak.id_abstrak
												and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
												and cms_peserta.id_tahun=cms_tahun.id_tahun
												and cms_tahun.kode_aktif='1'";
										$res3 = mysql_query($sql3);
										$banyakrecord3=mysql_num_rows($res3);
									
									echo "<td align='center'>$banyakrecord2</td>
										<td align='center'>$banyakrecord3</td>
										<td>$ket</td>";
									if ($id_kategori_pengguna=='4')
									{
									echo "<form method=\"POST\" action=\"unpublish_reviewer.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Nonactive Reviewer' src='../gambar/unpublish.png' width='25'>
										</td>
										</form>";
									}
									else
									{
									echo "<form method=\"POST\" action=\"publish_reviewer.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Active Reviewer' src='../gambar/publish.jpg' width='25'>
										</td>
										</form>";
									}
								echo "</tr>";
								}
						?>
					</p>
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