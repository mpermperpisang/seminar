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
				<td>
					<p align="justify">
						<b><font size="+1">EDIT CATEGORY OF REVIEWER</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php		
							$link=koneksi_db();			
							$id=$_REQUEST['id'];		
							if (($id>0) && (ctype_alnum($id)))
							{
							$id_bidang=@$_REQUEST['id_bidang'];
							$sql = "select * from cms_pengguna,cms_reviewer,cms_bidang_kajian,reviewer_bidang_kajian
							where cms_reviewer.id_pengguna='$id'
							and cms_bidang_kajian.id_bidang_kajian='$id_bidang'
							and reviewer_bidang_kajian.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
							and cms_pengguna.id_pengguna=cms_reviewer.id_pengguna";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_pengguna = $select_result['id_pengguna'] ;
									$nama = $select_result['nama_pengguna'] ;
									$nama_bidang = $select_result['nama_bidang_kajian'] ;
									$id_bidang = $select_result['id_bidang_kajian'] ;
								}
								echo"
								<form action='update_bidang_reviewer.php' method='POST'>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
								";
							?>
								<input name="id" size="30" type="hidden" value="<?php echo $id ; ?>" maxlength="50"/>
								<input  name="id_bidang" type="hidden" size="30" value="<?php echo $id_bidang ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>Name of Reviewer</td>
										<td>
											$nama
										</td>
									</tr>
									<tr>
										<td>Category of Review</td>
										<td>
											<select name='bidang' required>
												<option value='$id_bidang' required>$nama_bidang</option>
												<option value=''>----------</option>
								";
												$link=koneksi_db();
												$res=mysql_query("SELECT * FROM cms_bidang_kajian order by nama_bidang_kajian");
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
												<input type='image' src='../gambar/update.jpg' width='25' title='Edit Category of Review'>
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
				}
				else
				{
					echo"
					<table border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
					<tr align='center'>
					<td>
									<img src='../gambar/forbidden.jpg'>
					</td>
					</tr>
					</table>
				";
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
	  ($_SESSION['aktif']<>"3"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>