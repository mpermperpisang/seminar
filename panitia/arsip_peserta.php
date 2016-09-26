<?php
	include('../include/library.php');
	$link=koneksi_db();
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
		<?php include ('menu.php'); ?>
		<table border=0 width=75% align="center">	
			<tr>
				<td colspan="6">
					<p align="justify">
						<b><font size="+1">PARTICIPANT ARCHIVE</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>	
			</tr>
			<tr>
				<td>
				<?php					
					$sql="select * from cms_tahun order by id_tahun asc";
					$query = mysql_query($sql,$link);
					$banyakrecord=mysql_num_rows($query);
					if($banyakrecord>0)
					{
						while($select_result = mysql_fetch_array($query))
						{
							$tahun=$select_result['bil_tahun'];
							
							echo "<img src='../gambar/arsip.png' width=25 align='absmiddle'>&nbsp;<a target='_blank' href=daftar_peserta.php?bil_tahun=$tahun>$tahun<br>";
						}
					}
				?>
				</td>	
			</tr>
		</table>
		<table align="right">
			<tr align="right">
				<td>
					<div class="backtotop">
						<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top">
							Back to Top
						</a>
					</div>
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