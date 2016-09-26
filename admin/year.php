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
						<b><font size="+1">MONTH & YEAR LIST</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_tahun order by bil_tahun desc";
							$res = mysql_query($sql);
							$sql2 = "select * from cms_bulan order by id_bulan";
							$res2 = mysql_query($sql2);
						?>	
				</td>	
			</tr>
			<tr>
				<td colspan="5">
					<a href="add_year.php"><img src="../gambar/add.png" width="25" title="Add Year"></a>
				</td>
				<td>
						<?php
							$banyakrecord=mysql_num_rows($res);
							$banyakrecord2=mysql_num_rows($res2);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord2;?></b> data of month and <b><?php echo $banyakrecord;?></b> data of year</div>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of year not found</div>	
						<?php
							};
						?>
				</td>
			</tr>
		</table>
		<table align="left" border="0" cellpadding="5" width=25%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Year</th>
						<th>Active Status</th>
						<th colspan="3">Action</th>
					</tr>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_tahun'];
									$tahun = $select_result['bil_tahun'];
									$kode = $select_result['kode_aktif'];
									
									if ($kode=='1')
									{
										$ket='Active';
									}
									else if ($kode=='0')
									{	
										$ket='Nonactive';
									}
									echo "
									<tr>
										<td align='center'>$id</td>
										<td>$tahun</td>
										<td align='center'>$ket</td>
										<form method=\"POST\" action=\"edit_year.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Edit Year' src='../gambar/edit.png' width='25'>
										</td>
										</form>";
									if ($kode=='0')
									{
									echo "<form method=\"POST\" action=\"publish_tahun.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
											<input type='image' title='Active Year' src='../gambar/publish.jpg' width='25'>
										</td>
										</form>";
									}
								echo "</tr>";
								}	
						?>
					</p>
				</td>
			</tr>
		</table>
		<table align="right" border="0" cellpadding="5" width=25%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Month</th>
						<th>Active Status</th>
						<th colspan="3">Action</th>
					</tr>
						<?php		
								while($select_result2 = mysql_fetch_array($res2))
								{
									$id_bulan = $select_result2['id_bulan'];
									$bulan = $select_result2['nama_bulan'];
									$kode = $select_result2['kode_aktif'];
									
									if ($kode=='1')
									{
										$ket='Active';
									}
									else if ($kode=='0')
									{	
										$ket='Nonactive';
									}
									echo "
									<tr>
										<td align='center'>$id_bulan</td>
										<td>$bulan</td>
										<td align='center'>$ket</td>";
									if ($kode=='0')
									{
									echo "<form method=\"POST\" action=\"publish_bulan.php?id=$id_bulan\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_bulan\" name=\"id_bulan\"><center>
											<input type='image' title='Active Month' src='../gambar/publish.jpg' width='25'>
										</td>
										</form>";
									}
								echo "</tr>";
								}	
						?>
					</p>
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
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>