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
    <body onLoad="self.focus();document.form1.urutan.focus()">	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">ADD SEQUENCE APPEARS</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php	
							$sql = "select * from cms_order_urutan order by id_order_urutan desc limit 1";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['order_urutan'];
								}
							}
							else
							{
								$id=0;
							}
						?>
					</p>
				</td>
			</tr>
		</table>
		<br>
			<form action="insert_urutan.php" method="post" name="form1">
			<table border=0 width=15% align="left">
				<tr>
					<td>Last Sequence</td>
					<td><?php echo "$id"; ?></td>
				</tr>
				<tr>
					<td>Input Sequence</td>
					<td>
					<?php
							$sql = "select * from cms_order_urutan order by id_order_urutan desc limit 1";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['order_urutan'];
								}
								$urutan=$id+1;	
							}
							else
							{
								$urutan=1;
							}		
							echo "$urutan";			
					?>
					<input type="hidden" name="urutan" value="<?php echo $urutan ?>">
					</td>
				</tr>
				<tr align="center">
					<td align="right">
						<input type="image" src="../gambar/add.png" width="25" name="kirim" title="Add Sequence Appears">
		</form>
					</td>
		<form action="index.php">
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