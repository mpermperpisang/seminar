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
						<b><font size="+1">FOOTER FORM</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>	
			</tr>
		</table>
		<br>
		<?php
			$res=mysql_query("SELECT * FROM cms_footer,cms_tahun
							where cms_footer.id_tahun=cms_tahun.id_tahun
							and cms_tahun.kode_aktif='1'");
			$banyakrecord=mysql_num_rows($res);
			if($banyakrecord>0)
			{
				while($select_result=mysql_fetch_array($res))
				{
					$copy=$select_result['copyright'];		
					$id_footer=$select_result['id_footer'];						
				}
		?>
		<br><br>
		<form method="POST" enctype="multipart/form-data" action="update_footer.php">	
		<table border=0 width=35% align="center">
			<tr>
				<td>Copyright by</td>
				<td><input type='text' name='copy' size='25' maxlength='50' required value="<?php echo "$copy"; ?>"></td>
			</tr>
			<tr>
				<td>Year</td>
				<td>
						<?php
							$res=mysql_query("SELECT * FROM cms_tahun where kode_aktif='1'");
							while($select_result=mysql_fetch_array($res))
							{
								$id_tahun=$select_result['id_tahun'];	
								$tahun=$select_result['bil_tahun'];									
							}
							
								echo "$tahun";
						?>
						<input type="hidden" name="tahun" size="30" value="<?php echo $id_tahun ; ?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="0" align="right">				
						<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Update Footer'><br />
					<?php
						echo "<input type=\"hidden\" value=\"$id_footer\" name=\"id_footer\">";
					?>
				</td>
		</form>
		<form method="POST" enctype="multipart/form-data" action="index.php">
				<td align="left">	
					<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title="Cancel"><br />
				</td>
		</form>
			</tr>
		</table>
		<?php
			}
			else
			{
				$copy='';
		?>
		<br><br>
		<form method="POST" enctype="multipart/form-data" action="insert_footer.php">	
		<table border=0 width=35% align="center">
			<tr>
				<td>Copyright by</td>
				<td><input type='text' name='copy' size='25' maxlength='50' required value="<?php echo "$copy"; ?>"></td>
			</tr>
			<tr>
				<td>Year</td>
				<td>
						<?php
							$res=mysql_query("SELECT * FROM cms_tahun where kode_aktif='1'");
							while($select_result=mysql_fetch_array($res))
							{
								$id_tahun=$select_result['id_tahun'];	
								$tahun=$select_result['bil_tahun'];								
							}
							
								echo "$tahun";
						?>
						<input type="hidden" name="tahun" size="30" value="<?php echo $id_tahun ; ?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="0" align="right">				
						<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Update Footer'><br />
				</td>
		</form>
		<form method="POST" enctype="multipart/form-data" action="index.php">
				<td align="left">	
					<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title="Cancel"><br />
				</td>
		</form>
			</tr>
		</table>
		<?php
			}
		?>
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