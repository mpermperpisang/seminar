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
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="7">
					<p align="justify">
						<b><font size="+1">COMMITTEE LIST</font></b>
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_pengguna,cms_panitia
							where cms_pengguna.id_pengguna=cms_panitia.id_pengguna";
						?>	
				</td>		
				<td align="right"><br>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<select name="fieldcari">
										<option value="username" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="username") echo "selected";?>>Username</option>
										<option value="nama_pengguna" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="nama_pengguna") echo "selected";?>>Name</option>
									</select>
									<input type="text" name="keyword" size=10 maxlength="30" value="<?php if (isset($_POST["keyword"])) echo $_POST['keyword'];?>">
									<input type="image" src="../gambar/enter.jpg" width="20" align="absmiddle">
								</form>
								<?php
									if(isset($_POST['keyword']))
									{
										$fieldcari=$_POST['fieldcari'];
										$keyword=$_POST['keyword'];
										$sql=$sql." and $fieldcari like '%$keyword%'";
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
				</td>
				<td>
						<?php
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of committee</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>NIK</th>
						<th>Username</th>
						<th>Email</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Phone</th>
						<th>Type of Committee</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of committee not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_pengguna'];
									$username=$select_result['username'];
									$nik=$select_result['nik'];
									$email=$select_result['email'];
									$nama=ucwords($select_result['nama_pengguna']);
									$kelamin=$select_result['jenis_kelamin'];
									$telp=$select_result['telp'];
									$level=$select_result['kategori_panitia'];
									
									if ($level=='1')
									{
										$ket='Chairman';
									}
									else if ($level=='2')
									{
										$ket='Member';
									}
									
									echo "
									<tr>
										<td align='center'>$id</td>
										<td align='center'>$nik</td>
										<td>$username</td>
										<td>$email</td>
										<td>$nama</td>
										<td>$kelamin</td>
										<td>$telp</td>
										<td>$ket</td>
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