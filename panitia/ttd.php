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
		<?php
			$id=$_SESSION['id_pengguna'];
			$sqlf="select * from cms_stempel_ttd
					where id_pengguna='$id'";
			$queryf = mysql_query($sqlf);
		?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="5">
					<p align="justify">
						<b><font size="+1">SIGNATURE FORM</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>	
			</tr>
			<tr>
				<td>
		<?php
			$banyakrecordf=mysql_num_rows($queryf);
			if($banyakrecordf>0)
			{
				while($data=mysql_fetch_array($queryf))
				{
					$id_ttd=$data['id_stempel_ttd'];
				}
		?>
					<form method="POST" enctype="multipart/form-data" action="update_ttd.php">
					<table border=0 width=50% align="center">
						<tr>
							<td align="left" colspan="2"><h5>*format upload in jpg, jpeg, png</h5></td>
						</tr>
						<tr>
							<th>Upload Scan of Signature and Stamp*</th>
							<td><input type=file name="ttd" required></td>
						</tr>
						<tr>
							<td colspan="0" align="right">					
								<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Upload Signature and Stamp'><br />
								<?php
									echo "<input type=\"hidden\" value=\"$id_ttd\" name=\"id_ttd\">";
								?>
							</td>
					</form>
					<form method="POST" enctype="multipart/form-data" action="index.php">
							<td colspan="0" align="left">				
								<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'><br />
							</td>
					</form>
						</tr>
					</table>
		<?php
			}
			else
			{
		?>
					<form method="POST" enctype="multipart/form-data" action="insert_ttd.php">
					<table border=0 width=50% align="center">
						<tr>
							<td align="left" colspan="2"><h5>*format upload in jpg, jpeg, png</h5></td>
						</tr>
						<tr>
							<th>Upload Scan of Signature and Stamp*</th>
							<td><input type=file name="ttd" required></td>
						</tr>
						<tr>
							<td colspan="0" align="right">					
								<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Upload Signature and Stamp'><br />
							</td>
					</form>
					<form method="POST" enctype="multipart/form-data" action="index.php">
							<td colspan="0" align="left">				
								<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'><br />
							</td>
					</form>
						</tr>
					</table>
		<?php
			}
		?>
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