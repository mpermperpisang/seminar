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
						<b><font size="+1">PAPER ARCHIVE</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>	
			</tr>
			<tr>
				<td>
				<?php
				$path = "../paper/";
				$blacklist = array('.','..');
				
				// get everything except hidden files
				$files = preg_grep('/^([^.])/', scandir($path)); 
				
				foreach ($files as $file) 
				{
					if (!in_array($file, $blacklist)) 
					{
						echo "<img src='../gambar/arsip.png' width=25 align='absmiddle'>&nbsp;<a target='_blank' href='".$path.$file."'>".$file."<br>";
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