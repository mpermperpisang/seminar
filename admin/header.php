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
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="5">
					<p align="justify">
						<b><font size="+1">HEADER FORM</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>	
			</tr>
		</table>
		<?php
		$res=mysql_query("SELECT * FROM cms_header,cms_tahun
						where cms_header.id_tahun=cms_tahun.id_tahun
						and cms_tahun.kode_aktif='1'");
		$banyakrecord=mysql_num_rows($res);
		if($banyakrecord>0)
		{
		while($data=mysql_fetch_array($res))
		{
			$id_header=$data['id_header'];
			$tema=$data['tema_acara'];
			$uctema=ucwords($tema);
			$nama=$data['nama_acara'];
			$ucnama=ucwords($nama);
			$tempat=$data['tempat_acara'];
			$uctempat=ucwords($tempat);
			$akronim=$data['akronim'];
			$upakronim=ucwords($akronim);
		}
		?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<form method="POST" action="update_theme.php">
		<table border=0 width=100% align="center">			
			<tr>			
				<th colspan="2">Theme of Program</th>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type='text' name='tema' size='100' maxlength='150' required value="<?php echo "$uctema"; ?>"></td>
			</tr>
			<tr>
				<th colspan="2">Name of Program</th>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type='text' name='nama' size='100' maxlength='150' required value="<?php echo "$ucnama"; ?>"></td>								
			</tr>
			<tr>
				<th colspan="2">Acronim of Program</th>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type='text' name='akronim' size='100' maxlength='150' required value="<?php echo "$upakronim"; ?>"></td>								
			</tr>
			<tr>
				<th colspan="2">Venue of Program</th>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type='text' name='venue' size='100' maxlength='150' required value="<?php echo "$uctempat"; ?>"></td>								
			</tr>
			<tr>
				<td align="center" colspan="2">Year</td>
			</tr>
			<tr>
				<td align="center" colspan="2">
						<?php
							$res=mysql_query("SELECT * FROM cms_tahun where kode_aktif='1'");
							while($data=mysql_fetch_array($res))
							{
								$tahun=$data['bil_tahun'];
								$id_tahun=$data['id_tahun'];
								echo "$tahun
									<input type=\"hidden\" value=\"$id_tahun\" name=\"tahun\"><center>";
							}
						?>
				</td>
			</tr>
			<tr>
				<td align="right">					
					<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title="Update Header"><br />
					<?php
						echo "<input type=\"hidden\" value=\"$id_header\" name=\"id_header\">";
					?>
				</td>
		</form>
		<?php
		}
		else
		{
			$uctema='';
			$ucnama='';
			$uctempat='';
			$upakronim='';
		?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<form method="POST" action="insert_theme.php">
		<table border=0 width=100% align="center">			
			<tr>			
				<th colspan="2">Theme of Program</th>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type='text' name='tema' size='100' maxlength='150' required value="<?php echo "$uctema"; ?>"></td>
			</tr>
			<tr>
				<th colspan="2">Name of Program</th>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type='text' name='nama' size='100' maxlength='150' required value="<?php echo "$ucnama"; ?>"></td>								
			</tr>
			<tr>
				<th colspan="2">Acronim of Program</th>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type='text' name='akronim' size='100' maxlength='150' required value="<?php echo "$upakronim"; ?>"></td>								
			</tr>
			<tr>
				<th colspan="2">Venue of Program</th>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type='text' name='venue' size='100' maxlength='150' required value="<?php echo "$uctempat"; ?>"></td>								
			</tr>
			<tr>
				<td align="center" colspan="2">Year</td>
			</tr>
			<tr>
				<td align="center" colspan="2">
						<?php
							$res=mysql_query("SELECT * FROM cms_tahun where kode_aktif='1'");
							while($data=mysql_fetch_array($res))
							{
								$tahun=$data['bil_tahun'];
								$id_tahun=$data['id_tahun'];
								echo "$tahun
									<input type=\"hidden\" value=\"$id_tahun\" name=\"tahun\"><center>";
							}
						?>
				</td>
			</tr>
			<tr>
				<td align="right">					
					<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title="Update Header"><br />
				</td>
		</form>
		<?php
		}
		?>
		<form method="POST" enctype="multipart/form-data" action="index.php">
				<td align="left">	
					<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title="Cancel"><br />
				</td>
		</form>
			</tr>
		</table>
		<form method="POST" enctype="multipart/form-data" action="update_logo_acara.php">
		<table border=0 width=50% align="left">
			<tr>
				<th colspan="2">Logo of Program</th>
			</tr>
			<tr align="center">
				<td colspan="2"><input type=file name="acara" required></td>
			</tr>
			<tr>
				<td colspan="0" align="right">					
					<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title="Upload Logo of Program">
					<?php
						echo "<input type=\"hidden\" value=\"$id_header\" name=\"id_header\">";
					?>
				</td>
		</form>
		<form method="POST" enctype="multipart/form-data" action="index.php">
				<td colspan="0" align="left">	
					<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title="Cancel">
				</td>
		</form>
			</tr>
		</table>
		<form method="POST" enctype="multipart/form-data" action="update_logo_univ.php">
		<table border=0 width=50% align="right">	
			<tr>
				<th colspan="2">Logo of University</th>
			</tr>
			<tr align="center">
				<td colspan="2"><input type=file name="univ" required></td>
			</tr>
			<tr>
				<td colspan="0" align="right">					
					<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title="Upload Logo of University"><br />
					<?php
						echo "<input type=\"hidden\" value=\"$id_header\" name=\"id_header\">";
					?>
				</td>
		</form>
		<form method="POST" enctype="multipart/form-data" action="index.php">
				<td colspan="0" align="left">	
					<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title="Cancel"><br />
				</td>
		</form>
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