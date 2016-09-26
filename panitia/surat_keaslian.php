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
						<b><font size="+1">AUTHENTICATION LETTER LIST</font></b>
						<?php			
							$link=koneksi_db();	
							$sql = "select * from cms_peserta,cms_pengguna,cms_tahun,cms_abstrak,cms_paper
									where cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_tahun.id_tahun=cms_peserta.id_tahun
									and cms_tahun.kode_aktif='1'
									and cms_peserta.kategori_peserta=1
									and (cms_peserta.ttd<>' ' or cms_peserta.ttd is not null)
									and cms_abstrak.id_pengguna=cms_pengguna.id_pengguna
									and cms_paper.id_abstrak=cms_abstrak.id_abstrak";
						?>	
				</td>			
				<td align="right"><br>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<select name="fieldcari">
										<option value="nama_pengguna" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="nama_pengguna") echo "selected";?>>Name</option>
										<option value="judul" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="judul") echo "selected";?>>Title</option>
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
											order by cms_peserta.id_pengguna asc";
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
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of authentication letter</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Name</th>
						<th>ID Paper</th>
						<th>Title</th>
						<th>Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of authentication letter not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id_pengguna=$select_result['id_pengguna'];
									$nama_pengguna=$select_result['nama_pengguna'];
									$ucnama=ucwords($nama_pengguna);
									$id_paper=$select_result['id_paper'];
									$judul=$select_result['judul'];
									$upjudul=strtoupper($judul);
									echo "
									<tr>
										<td align='center'>$id_pengguna</td>
										<td>$ucnama</td>
										<td align='center'>$id_paper</td>
										<td>$upjudul</td>
										<form method=\"POST\" action=\"download_surat_keaslian.php?id=$id_pengguna\" target='new'>
										<td align='center'>
											<input type=\"hidden\" value=\"$id_pengguna\" name=\"id_pengguna\">
											<input type=\"hidden\" value=\"$id_paper\" name=\"id_paper\">
											<input type='image' title='See Authentication Letter' src='../gambar/see.png' width='25'>
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