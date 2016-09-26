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
    <body onLoad="self.focus();document.kuesioner.pertanyaan.focus()">	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">ADD QUESTION</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>
			</tr>
		</table>
		<br>
			<form action="insert_kuesioner.php" name="kuesioner" method="post">
			<table border=0 width=50% align="left">
				<tr>
					<td>Question</td>
					<td><input type="text" name="pertanyaan" size="75" maxlength="200" required></td>
				</tr>
				<tr>
					<td>Sequence Appears</td>
					<td>
						<select name='urutan' required>
							<option value=''>Choose</option>
							<option value=''>----------</option>
							<?php
								$resa=mysql_query("SELECT * FROM cms_kuesioner,cms_tahun
													where cms_kuesioner.id_tahun=cms_tahun.id_tahun
													and cms_tahun.kode_aktif='1'
													order by id_urutan_pertanyaan desc limit 1");
								$banyakrecord=mysql_num_rows($resa);
								if($banyakrecord>0)
								{
									while($dataa=mysql_fetch_array($resa))
									{
										$terakhir=$dataa['id_urutan_pertanyaan'];
									}
								}
								else
								{
									$terakhir=0;
								}
										$res2=mysql_query("SELECT * FROM cms_order_urutan where id_order_urutan>$terakhir");
										while($data=mysql_fetch_array($res2))
										{
											echo "<option required value=\"".$data['id_order_urutan']."\">".$data['order_urutan']."</option>";
										}
							?>
						</select>
					</td>
				</tr>
				<tr align="center">
					<td align="right">
						<input type="image" src="../gambar/add.png" width="25" name="kirim" title="Add Questionnaire">
		</form>
					</td>
		<form action="kuesioner.php">
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
	  ($_SESSION['aktif']<>"3"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>