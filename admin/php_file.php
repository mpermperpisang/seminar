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
		<?php include ('menu.php'); ?>
		<table border=0 width=75% align="center">	
			<tr>
				<td colspan="6">
					<p align="justify">
						<b><font size="+1">PHP FILE LIST</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>	
			</tr>
			<tr bgcolor="#CCCCCC" align="center">
				<td colspan="3" width=50%><b>In Use Link List</b></td>
				<td colspan="3" width=50%><b>Unused Link List</b></td>
			</tr>
			<tr>
				<td colspan="3">
				<?php
					$sql="select * from cms_menu where kode_aktif='1'";
					$query = mysql_query($sql);
					$banyakrecord=mysql_num_rows($query);
					if($banyakrecord>0)
					{
						while($select_result = mysql_fetch_array($query))
						{
							$link=$select_result['link_file'];
							$nama_menu=$select_result['nama_menu'];
											
							echo "
							<form method=\"POST\" action=\"delete_php.php\">
								&bull;$nama_menu&nbsp;$link<br>
							</form>";
						}
					}
					else
					{
						echo "Not Found";
					}
				?>
				</td>
				<td colspan="3">
				<?php
					$sql2="select distinct * from cms_riwayat_menu,cms_menu
							where cms_riwayat_menu.link_menu<>cms_menu.link_file
							and cms_menu.nama_menu<>'home' 
							and cms_menu.nama_menu<>'call for paper' 
							and cms_menu.nama_menu<>'payment' 
							and cms_menu.nama_menu<>'venue' 
							and cms_menu.nama_menu<>'contact'	
							and cms_menu.nama_menu<>'committee' 
							and cms_menu.nama_menu<>'important date'
							and cms_riwayat_menu.nama_menu<>'home' 
							and cms_riwayat_menu.nama_menu<>'call for paper' 
							and cms_riwayat_menu.nama_menu<>'payment' 
							and cms_riwayat_menu.nama_menu<>'venue' 
							and cms_riwayat_menu.nama_menu<>'contact'	
							and cms_riwayat_menu.nama_menu<>'committee' 
							and cms_riwayat_menu.nama_menu<>'important date'";
					$query2 = mysql_query($sql2);
					$banyakrecord2=mysql_num_rows($query2);
					if($banyakrecord2>0)
					{
						while($select_result2 = mysql_fetch_array($query2))
						{
							$link2=$select_result2['link_menu'];
							$nama_menu2=$select_result2['nama_menu'];
									
							echo "
							<form method=\"POST\" action=\"delete_php.php\">
									<input type=\"hidden\" value=\"$link2\" name=\"link\">
									 &bull;$nama_menu2&nbsp;$link2&nbsp;<input type='image' title='Delete File in Directory' src='../gambar/delete.png' width='25' align='absmiddle' onclick='return confirmSubmit()'>
							</form>";
						}
					}
					else
					{
						echo "Not Found";
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
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>