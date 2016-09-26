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
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="7">
					<p align="justify">
						<b><font size="+1">USER LIST</font></b>
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_pengguna
									where kode_masalah='1' or kode_masalah='2'";
						?>	
				</td>			
				<td align="right"><br>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<select name="fieldcari">
										<option value="username" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="username") echo "selected";?>>Username</option>
										<option value="email" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="email") echo "selected";?>>Email</option>
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
											order by cms_pengguna.id_pengguna";
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
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of user</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Name</th>
						<th>Problem</th>
						<th colspan="3">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of user not found</div>	
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
									$kode_masalah=$select_result['kode_masalah'];
									
									if ($kode_masalah=='1')
									{
										$ket='Not accepted email account confirmation';
									}
									else if ($kode_masalah=='2')
									{
										$ket='Not accepted email password confirmation';
									}
									
									echo "
									<tr>
										<td align='center'>$id</td>
										<td>$username</td>
										<td>$email</td>
										<td>$ucnama</td>
										<td>$ket</td>";
									if ($kode_masalah=='1')
									{
									echo "<form method=\"POST\" action=\"publish_pengguna.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Activated User Account' src='../gambar/publish.jpg' width='25'>
										</td>
										</form>";
									}
									else if ($kode_masalah=='2')
									{
									echo "
										<form method=\"POST\" action=\"edit_pengguna.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Look User Password' src='../gambar/edit.png' width='25'>
										</td>
										</form>";
									}
									echo "
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