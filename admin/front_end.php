<?php
	include('../include/library.php');			
	$link=koneksi_db();	
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>ADMIN PAGE</title>
		<script type="text/javascript" src="../rich_text_editor/ckeditor.js"></script>
		<link href="../rich_text_editor/content.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<?php include ('menu.php'); ?>
		<?php
		  if (isset($_REQUEST['ok'])){
			$judul = $_REQUEST['judul'];
			$content = $_REQUEST['news'];
			echo "Judul:<b>$judul</b><br/>";
			echo "Isi berita:<br/>$content<br/>";
		  }
		?>
		<table border=0 width=75% align="center">
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">FRONT END PAGE POST</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$id=$_SESSION['id_pengguna'];
							$sql2 = "select * from cms_pengguna where id_pengguna='$id'";
							$res2 = mysql_query($sql2);
							while($select_result2 = mysql_fetch_array($res2))
							{
								$nama=$select_result2['nama_pengguna'] ;
								$ucnama=ucwords($nama);
							}
								echo"
								<table align='center' border=0 width=100% cellpadding='5'>";
								
							$sql3 = "select * from cms_admin
									where cms_admin.level_admin='1'
									and cms_admin.id_pengguna='$id'";
							$res3 = mysql_query($sql3);
							$banyakrecord=mysql_num_rows($res3);
							if($banyakrecord>0)
							{
								echo "<tr>
										<td colspan='2'><a href='posting.php'><img src='../gambar/who.png' title='View anyone who posting front end post' width=25></a></td>
									</tr>";
							}
							else
							{
								echo "<tr>
										<td colspan='2'></td>
									</tr>";
							}
								echo "<tr>
										<td width=20%>Author</td>
										<td>
											$ucnama
										</td>
									</tr>";
									
							if(isset($_POST['postingan']))
							{
								$postingan=$_POST['postingan'];
								$sql = "select * from cms_postingan
										where cms_postingan.kategori_posting='$postingan'";
								$res = mysql_query($sql);
								while($select_result = mysql_fetch_array($res))
								{
									$judul=$select_result['judul'];
									$upjudul=strtoupper($judul);
									$content=$select_result['content'];
									$uccontent=ucfirst($content);
									$kategori_posting=$select_result['kategori_posting'];
								}
								if ($kategori_posting=='1')
								{
									$nama_posting='Announcement';
								}
								else if ($kategori_posting=='2')
								{
									$nama_posting='Introduction';
								}
								else if ($kategori_posting=='3')
								{
									$nama_posting='Theme';
								}
								else if ($kategori_posting=='4')
								{
									$nama_posting='Category of Paper';
								}
								else if ($kategori_posting=='5')
								{
									$nama_posting='Keynote Speakers';
								}
								else if ($kategori_posting=='6')
								{
									$nama_posting='Invite Speakers';
								}
								else if ($kategori_posting=='7')
								{
									$nama_posting='Chairman';
								}
								else if ($kategori_posting=='8')
								{
									$nama_posting='Secretary';
								}
								else if ($kategori_posting=='9')
								{
									$nama_posting='Organizing Committees';
								}
								else if ($kategori_posting=='10')
								{
									$nama_posting='Advisory Board';
								}
								else if ($kategori_posting=='11')
								{
									$nama_posting='Important Date';
								}
								else if ($kategori_posting=='12')
								{
									$nama_posting='Venue';
								}
								else if ($kategori_posting=='13')
								{
									$nama_posting='Registration Fee';
								}
								else if ($kategori_posting=='14')
								{
									$nama_posting='Payment';
								}
								else if ($kategori_posting=='15')
								{
									$nama_posting='Contact';
								}
							}	
							else
							{
									$nama_posting='Choose to reload title and content';
							}
						?>
							<tr>
								<td>Category of Post</td>
								<form method='POST' action='<?php echo $_SERVER['PHP_SELF'];?>'>
								<td>
									<select name='postingan' required onchange='this.form.submit()'>
										<option value='<?php @$kategori_posting ?>'><?php echo @$nama_posting ?></option>
										<option value=''>----------</option>
										<option value='1'>Announcement</option>
										<option value='2'>Introduction</option>
										<option value='3'>Theme</option>
										<option value='4'>Category of Paper</option>
										<option value='5'>Keynote Speakers</option>
										<option value='6'>Invite Speakers</option>
										<option value='7'>Chairman</option>
										<option value='8'>Secretary</option>
										<option value='9'>Organizing Committees</option>
										<option value='10'>Advisory Board</option>
										<option value='11'>Important Date</option>
										<option value='12'>Venue</option>
										<option value='13'>Registration Fee</option>
										<option value='14'>Payment</option>
										<option value='15'>Contact</option>
									</select>
								</td>
								</form>
								<form action='update_posting.php' method='POST'>
								<input type="hidden" value="<?php echo @$kategori_posting ?>" name="postingan">
							</tr>
							<tr>
								<td>Title</td>
								<td><input type="text" name="judul" value='<?php echo @$judul ?>' required></td>
							</tr>
							<tr>
								<td>Content</td>
								<td><textarea cols="50" id="news" rows="20" name="isi" value='<?php @$content ?>' required><?php echo @$uccontent ?></textarea>
										<script type="text/javascript">
											var editor = CKEDITOR.replace('news');
										</script>
								</td>
							</tr>
							<tr>
								<td align='right'>									
									<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Update Front End Post'>
								</td>
								</form>
								<form action='index.php'>
								<td>
									<input type='image' src='../gambar/cancel.jpg' width='25' name='cancel' title='Cancel'>
								</td>
								</form>
							</tr>
							</table>
						</table>
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
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>