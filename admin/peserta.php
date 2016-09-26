<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>ADMIN PAGE</title>
		<script>
		function confirmSubmit() 
		{
			var msg;
			msg= "Are you sure want to delete this data ?";
			var agree=confirm(msg);
			if (agree)
			return true ;
			else
			return false ;
		}
		</script>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="7">
					<p align="justify">
						<b><font size="+1">PARTICIPANT LIST</font></b>
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_pengguna,cms_peserta,cms_tahun
							where cms_pengguna.id_pengguna=cms_peserta.id_pengguna 
							and cms_tahun.id_tahun=cms_peserta.id_tahun
							and cms_tahun.kode_aktif='1'";
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
											order by cms_peserta.id_pengguna";
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
					<a href="add_peserta.php"><img src="../gambar/add.png" width="25" title="Add Peserta"></a>
				</td>
				<td>
						<?php
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of participant</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Phone Number</th>
						<th>Type of Participant</th>
						<th>Account Status</th>
						<th colspan="3">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of participant not found</div>	
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
									$kategori_pengguna = $select_result['kategori_pengguna'];
									$level=$select_result['kategori_peserta'];
									
									if ($kategori_pengguna=='1')
									{
										$ket='Active';
									}
									else if ($kategori_pengguna=='6')
									{
										$ket='Nonactive';
									}
									
									if ($level=='1')
									{
										$ket_2='Participant With Paper';
									}
									else if ($level=='2')
									{
										$ket_2='Participant Without Paper';
									}
									echo "
									<tr>
										<td align='center'>$id</td>
										<td>$username</td>
										<td>$email</td>
										<td>$ucnama</td>
										<td>$kelamin</td>
										<td>$telp</td>
										<td>$ket_2</td>
										<td align='center'>$ket</td>";
									if ($kategori_pengguna=='1')
									{
									echo "<form method=\"POST\" action=\"unpublish_peserta.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Nonactive Participant' src='../gambar/unpublish.png' width='25'>
										</td>
										</form>";
									}
									else
									{
									echo "<form method=\"POST\" action=\"publish_peserta.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Active Participant' src='../gambar/publish.jpg' width='25'>
										</td>
										</form>";
									}
									echo "<form method=\"POST\" action=\"delete_peserta.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Delete Participant' src='../gambar/delete.png' width='25' onclick='return confirmSubmit()'>
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
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>