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
    <body onLoad="self.focus();document.form1.menu.focus()">	
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
						<b><font size="+1">ADD MENU</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>
			</tr>
		</table>
		<br>
			<form action="insert_menu.php" method="post" name="form1">
			<table border=0 width=75% align="left">
				<tr>
					<td>Name of Menu</td>
					<td><input type="text" name="menu" size="25" maxlength="20" required></td>
				</tr>
				<tr>
					<td>Link*</td>
					<td>
						<input type="text" name="link" size="25" maxlength="100" required>
						<font size="-2">*automatic extention .php</font>
						<br>
						<font size="-2">note : please do not use space for link</font>
					</td>
				</tr>
				<tr>
					<td>Sequence Appears</td>
					<td>										
						<select name='urutan' required>
							<option value=''>Choose</option>
							<option value=''>-------</option>
							<?php
								$link=koneksi_db();
									$res2=mysql_query("SELECT * from cms_order_urutan
														order by cms_order_urutan.id_order_urutan");
									while($data2=mysql_fetch_array($res2))
									{
										echo "<option value=\"".$data2['id_order_urutan']."\">".$data2['order_urutan']."</option>";
									}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of Page</td>
					<td><input type="text" name="judul" size="25" maxlength="200" required></td>
				</tr>
				<tr>
					<td>Content of Page</td>
					<td><textarea name="isi" id="news" cols="50" rows="20" required></textarea>
						<script type="text/javascript">
							var editor = CKEDITOR.replace('news');
						</script>
					</td>
				</tr>
				<tr align="center">
					<td align="right">
						<input type="image" src="../gambar/add.png" width="25" name="kirim" title="Add Menu">
		</form>
					</td>
		<form action="menu_list.php">
					<td align="left">
						<input type="image" src="../gambar/cancel.jpg" width="25" name="batal" title="Cancel">
		</form>
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