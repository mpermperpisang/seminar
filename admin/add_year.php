<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>PARTICIPATION PAGE</title>
    </head>
    <body onLoad="self.focus();document.form1.tahun.focus()">	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">ADD YEAR</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php		
							$sql = "select * from cms_tahun order by bil_tahun desc limit 1";
							$res = mysql_query($sql);
							while($select_result = mysql_fetch_array($res))
							{
								$tahun=$select_result['bil_tahun'];
							}
						?>
					</p>
				</td>
			</tr>
		</table>
		<br>
			<form action="insert_year.php" method="post" name="form1">
			<table border=0 width=25% align="left">
			<?php
				$banyakrecord=mysql_num_rows($res);
				if($banyakrecord>0)
				{
			?>
				<tr>
					<td>Lastest Year</td>
					<td><?php echo "$tahun"; ?></td>
				</tr>
			<?php 
				} 
				else
				{
			?>
				<tr>
					<td>Lastest Year</td>
					<td>No year found</td>
				</tr>
			<?php
				}
			?>
				<tr>
					<td>Year</td>
					<td><input type="text" name="tahun" size="25" maxlength="4" required></td>
				</tr>
				<tr align="center">
					<td align="right">
						<input type="image" src="../gambar/add.png" width="25" name="kirim" title="Add Year">
		</form>
					</td>
		<form action="year.php">
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