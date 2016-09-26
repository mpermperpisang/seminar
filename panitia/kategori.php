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
						<b><font size="+1">CATEGORY OF PAPER LIST</font></b>
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_bidang_kajian";
						?>	
				</td>		
				<td align="right"><br>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<select name="fieldcari">
										<option value="nama_bidang_kajian" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="nama_bidang_kajian") echo "selected";?>>Name of Category</option>
									</select>
									<input type="text" name="keyword" size=10 value="<?php if (isset($_POST["keyword"])) echo $_POST['keyword'];?>">
									<input type="image" src="../gambar/enter.jpg" width="20" align="absmiddle">

								</form>
								<?php
									if(isset($_POST['keyword']))
									{
										$fieldcari=$_POST['fieldcari'];
										$keyword=$_POST['keyword'];
										$sql=$sql." where $fieldcari like '%$keyword%'  
											order by cms_bidang_kajian.id_bidang_kajian";
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
					<a href="add_bidang_kajian.php"><img src="../gambar/add.png" width="25" title="Add Bidang Kajian"></a>
				</td>
				<td>
						<?php
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of category paper</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=75%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Name of Category</th>
						<th>Active Status</th>
						<th>Total Reviewer</th>
						<th colspan="4">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of category paper not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id_bidang=$select_result['id_bidang_kajian'];
									$nama_bidang=ucwords($select_result['nama_bidang_kajian']);
									$kode_aktif=$select_result['kode_aktif'];
									
									if ($kode_aktif=='1')
									{
										$ket='Active';
									}
									else
									{
										$ket='Nonactive';
									}
									
									echo "
									<tr>
										<td align='center'>$id_bidang</td>
										<td>$nama_bidang</td>
										<td align='center'>$ket</td>";
											$sqla = "select count(reviewer_bidang_kajian.id_pengguna) from reviewer_bidang_kajian,cms_bidang_kajian
													where reviewer_bidang_kajian.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
													and reviewer_bidang_kajian.id_bidang_kajian='$id_bidang'
													group by reviewer_bidang_kajian.id_pengguna";
											$resa = mysql_query($sqla);
											$banyakrecorda=mysql_num_rows($resa);
									echo "
										<td align='center'>$banyakrecorda</td>
										<form method=\"POST\" action=\"edit_kategori.php?id=$id_bidang\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_bidang\" name=\"id_bidang\"><center>
											<input type='image' title='Edit Category of Ppaer' src='../gambar/edit.png' width='25'>
										</td>
										</form>";
									if ($kode_aktif=='1')
									{
									echo "<form method=\"POST\" action=\"unpublish_kategori.php?id=$id_bidang\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_bidang\" name=\"id_bidang\"><center>
											<input type='image' title='Nonactive Category of Paper' src='../gambar/unpublish.png' width='25'>
										</td>
										</form>";
									}
									else if ($kode_aktif=='0')
									{
									echo "<form method=\"POST\" action=\"publish_kategori.php?id=$id_bidang\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_bidang\" name=\"id_bidang\"><center>
											<input type='image' title='Active Category of Paper' src='../gambar/publish.jpg' width='25'>
										</td>
										</form>";
									}
									echo "<form method=\"POST\" action=\"delete_kategori.php?id=$id_bidang\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_bidang\" name=\"id_bidang\"><center>
											<input type='image' title='Delete Category of Paper' src='../gambar/delete.png' width='25' onclick='return confirmSubmit()'>
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