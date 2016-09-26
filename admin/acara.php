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
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="6">
					<p align="justify">
						<b><font size="+1">DUE DATE OF SEMINAR</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">	
				</td>	
			</tr>
		</table>
		<form name="acara" action="update_akhir.php" method="post">
		<table align="left" border="0" cellpadding="5" width=50%>
			<tr>
				<td>Choose Due Date</td>
				<td>
				<?php		
					$sql = "select * from cms_tahun where kode_aktif='1'";
					$res = mysql_query($sql);
					while($select_result = mysql_fetch_array($res))
					{
						$tgl = $select_result['tgl_akhir'];
					}
				?>
					<input type="text" value="<?php echo $tgl; ?>" id="akhir" name="akhir" onClick="if(self.gfPop)gfPop.fPopCalendar(document.acara.akhir);return false;" required/>
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.acara.akhir);return false;">
						<img name="popcal" align="absmiddle" style="border:none" src="../calender/calender.jpeg" width="34" height="29" border="0" alt="">
					</a>
				</td>
			</tr>
			<tr>
				<td align="right">
					<input type='image' title='Update Due Date' src='../gambar/update.jpg' width='25'>
				</td>
		</form>
		<form action="index.php" method="post">
				<td align="left">
					<input type='image' title='Cancel' src='../gambar/cancel.jpg' width='25'>
				</td>
		</form>
			</tr>
		</table>
		<?php include('../footer.php'); ?>
			<iframe width=174 height=189 name="gToday:normal:../calender/agenda.js" id="gToday:normal:../calender/agenda.js" src="../calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
			</iframe>
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