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
		<script type="text/javascript" src="../rich_text_editor/ckeditor.js"></script>
		<link href="../rich_text_editor/content.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<?php
		  if (isset($_REQUEST['ok'])){
			$judul = $_REQUEST['judul'];
			$content = $_REQUEST['news'];
			echo "Judul:<b>$judul</b><br/>";
			echo "Isi berita:<br/>$content<br/>";
		  }
		?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">EDIT MENU</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$id=@$_REQUEST['id_menu'];
							if (($id>0) && (ctype_alnum($id)))
							{
							$sql = "select * from cms_menu where id_menu='$id'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_menu'] ;
									$nama_menu=$select_result['nama_menu'] ;
									$link=$select_result['link_file'];
									$title=$select_result['title'];
									$isi=$select_result['isi'];
									$ext=$select_result['ext'];
									$order_urutan=$select_result['id_order_urutan'];
								}
								echo"
								<form action='update_menu.php' method='POST' enctype='multipart/form-data'>
								<table border=\"0\" width=\"75%\" cellpadding=\"5\" cellspacing=\"5\" align=\"left\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id_menu" size="30" value="<?php echo $id ; ?>"/>
								<input type="hidden" name="link" size="30" value="<?php echo $link ; ?>"/>
							<?php
								echo"
									<tr>
										<td width=20%>Name of Menu</td>
										<td>";
											if (($nama_menu<>'home') && ($nama_menu<>'payment') && ($nama_menu<>'call for paper') && ($nama_menu<>'venue') && ($nama_menu<>'committee') && ($nama_menu<>'important date') && ($nama_menu<>'contact'))
											{
												echo "<input type='text' name='nama' size='25' value='$nama_menu' maxlength='20' required>";
											}
											else
											{
												echo "$nama_menu
											<input type=\"hidden\" value=\"$nama_menu\" name=\"nama\"><center>";
											}
										echo "</td>
									</tr>
									<tr>
										<td>Link*</td>
										<td>";
											if (($nama_menu<>'home') && ($nama_menu<>'payment') && ($nama_menu<>'call for paper') && ($nama_menu<>'venue') && ($nama_menu<>'committee') && ($nama_menu<>'important date') && ($nama_menu<>'contact'))
											{
												echo"<input type='text' name='link' size='25' value='$link' maxlength='100' required>
													<font size='-2'>*automatic extention .php</font>
													<br>
													<font size='-2'>note : please do not use space for link</font>";
											}
											else
											{
												echo "$link.$ext
											<input type=\"hidden\" value=\"$link\" name=\"link\"><center>";
											}
										echo"</td>
									</tr>
									<tr>
										<td>Sequence Appears</td>
										<td>
											<select name='urutan' required>
												<option value='$order_urutan' required>$order_urutan</option>
												<option value=''>---------</option>
								";
												$link=koneksi_db();
												$res=mysql_query("SELECT * FROM cms_order_urutan order by id_order_urutan");
												while($data=mysql_fetch_array($res))
												{
													echo "<option required value=\"".$data['id_order_urutan']."\">".$data['order_urutan']."</option>";
												}
								echo "
											</select>
										</td>
									</tr>";
									$sql2 = "select * from cms_menu where id_menu='$id'";
									$res2 = mysql_query($sql2);
										while($select_result2 = mysql_fetch_array($res2))
										{
											$menu=$select_result2['nama_menu'];
											
											if (($menu<>'home') && ($menu<>'payment') && ($menu<>'call for paper') && ($menu<>'venue') && ($menu<>'committee') && ($menu<>'important date') && ($menu<>'contact'))
											{
								echo "<tr>
										<td>Title of Page</td>
										<td><input type='text' name='judul' size='25' value='$title' maxlength='200' required></td>
									</tr>
									<tr>
										<td>Content of Page</td>
										<td><textarea name='isi' cols='50' id='news' rows='20' value='$isi' required>$isi</textarea>
											<script type='text/javascript'>
												var editor = CKEDITOR.replace('news');
											</script>
										</td>
									</tr>";
											}
										}
								echo "<tr>
										<td align='right'>
												<input type='image' src='../gambar/update.jpg' width='25' title='Update Menu'>
										</td>
								</form>
								<form action='menu_list.php'>
										<td align='left'>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'>
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
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>