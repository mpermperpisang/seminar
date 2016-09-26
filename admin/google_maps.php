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
		<script>
		function confirmSubmit() 
		{
			var msg;
			msg= "Are you sure want to delete this data ?";
			var agree=confirm(msg);
			if (agree)
			return true ;
			else
			return false ;
		}
		</script>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="5">
					<p align="justify">
						<b><font size="+1">GOOGLE MAPS FORM</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
					</p>
				</td>	
			</tr>
		</table>
		<form method="POST" enctype="multipart/form-data" action="insert_google_maps.php">	
		<br>
		<table border=0 width=35% align="center">
			<tr>
				<td>Name of Place</td>
				<td><input type='text' name='tempat' size='25' maxlength='50' required></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type='text' name='alamat' size='25' maxlength='100' required></td>
			</tr>
			<tr>
				<td>Coordinat Lattitude</td>
				<td><input type='text' name='satu' size='25' maxlength='50' required></td>
			</tr>
			<tr>
				<td>Coordinat Longitude</td>
				<td><input type='text' name='dua' size='25' maxlength='50' required></td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<select name="tipe" required>
						<option value="">Choose</option>
						<option value="">------</option>
						<option value="University" required>University</option>
						<option value="Hotel" required>Hotel</option>
						<option value="Mall" required>Mall</option>
						<option value="Restaurant" required>Restaurant</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="0" align="right">				
						<input type='image' src='../gambar/add.png' width='25' name='kirim' title='Add Google Maps Location'><br />
				</td>
		</form>
		<form method="POST" enctype="multipart/form-data" action="index.php">	
				<td colspan="0" align="left">				
						<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'><br />
				</td>
		</form>
			</tr>
		</table>
		<br><br>
		<?php
				$sql = "select * from cms_google_maps";
				$res = mysql_query($sql);
				$banyakrecord=mysql_num_rows($res);
				if($banyakrecord>0)
				{
		?>
		<table width="100%" align="center">
			<tr bgcolor="#CCCCCC">
				<th>ID</th>
				<th>Name of Place</th>
				<th>Address</th>
				<th>Lattitude Coordinat</th>
				<th>Longitude Coordinat</th>
				<th>Type</th>
				<th>Status</th>
				<th colspan="3">Action</th>
			</tr>
			<?php
				while($select_result = mysql_fetch_array($res))
				{
					$id = $select_result['id_google_maps'];
					$lat=$select_result['lat'];
					$lon=$select_result['lon'];
					$nama=$select_result['nama'];
					$alamat=$select_result['alamat'];
					$tipe=$select_result['tipe'];
					$kode=$select_result['kode_aktif'];
					
					if ($kode=='1')
					{
						$ket='Center';
					}
					else
					{
						$ket='';
					}
					
					echo "
					<tr>
						<td align='center'>$id</td>
						<td>$nama</td>
						<td>$alamat</td>
						<td align='center'>$lat</td>
						<td align='center'>$lon</td>
						<td align='center'>$tipe</td>
						<td align='center'>$ket</td>
						<form method=\"POST\" action=\"edit_lokasi.php?id=$id\">
						<td align='center'>
							<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
							<input type='image' title='Edit Google Maps Location' src='../gambar/edit.png' width='25'>
						</td>
						</form>";
					if ($kode=='0')
					{
					echo "
						<form method=\"POST\" action=\"publish_lokasi.php?id=$id\">
						<td align='center'>
							<input type=\"hidden\" value=\"$id\" name=\"id\">
							<input type='image' title='Publish Google Maps Location' src='../gambar/publish.jpg' width='25'>
						</td>
						</form>";
					}
					else
					{
					echo "
						<td align='center'>
						</td>";
					}
					echo "
						<form method=\"POST\" action=\"delete_lokasi.php?id=$id\">
						<td align='center'>
							<input type=\"hidden\" value=\"$id\" name=\"id\">
							<input type='image' title='Delete Google Maps Location' src='../gambar/delete.png' width='25' onclick='return confirmSubmit()'>
						</td>
						</form>
					</tr>";
				}
			?>
			<?php
			}
			else
			{
			?>
								<div align="right">Data of admin not found</div>	
			<?php
			}
			?>
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