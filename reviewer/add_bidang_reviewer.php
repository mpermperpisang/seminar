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
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">ADD CATEGORY OF REVIEWER</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php		
							$link=koneksi_db();			
							$id=$_SESSION['id_pengguna'];
							$sql = "select * from cms_pengguna,cms_reviewer
							where cms_reviewer.id_pengguna='$id'
							and cms_pengguna.id_pengguna=cms_reviewer.id_pengguna";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_pengguna = $select_result['id_pengguna'] ;
									$nama = $select_result['nama_pengguna'] ;
									$ucnama=ucwords($nama);
								}
								echo"
								<form action='insert_bidang_kajian.php' method='POST'>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id" size="30" value="<?php echo $id ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>Name of Reviewer</td>
										<td>
											$ucnama
										</td>
									</tr>
									<tr>
										<td>Category of Review</td>
										<td>
											<select name='bidang' required>
												<option value=''>Choose</option>
												<option value=''>----------</option>
								";
												$link=koneksi_db();
												$res=mysql_query("SELECT * FROM cms_bidang_kajian where kode_aktif='1' order by nama_bidang_kajian");
												while($data=mysql_fetch_array($res))
												{
													echo "<option required value=\"".$data['id_bidang_kajian']."\">".$data['nama_bidang_kajian']."</option>";
												}
								echo "
											</select>
										</td>
									</tr>
									<tr>
										<td align='right'>
												<input type='image' src='../gambar/add.png' width='25' title='Add Category of Review'>
										</td>
								</form>
								<form action='bidang_kajian.php?id=$id'>
										<td align='left'>
											<input type='hidden' name='id_pengguna' size='30' value='$id' maxlength='50'/>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='cancel' title='Cancel'>
										</td>
								</form>
									</tr>
								</table>";
							}
						?>
					</p>
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