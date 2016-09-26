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
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="5">
					<p align="justify">
						<b><font size="+1">PAPER LIST</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();
							$id=$_REQUEST['id_pengguna'];			
							$sql = "select * from cms_peserta,cms_pengguna,cms_abstrak,cms_paper
									where cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_peserta.id_pengguna='$id'
									and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
									and cms_paper.id_abstrak=cms_abstrak.id_abstrak";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>=1)
							{
						?>	
				</td>	
			</tr>
		</table>
		<table align="left" border="0" cellpadding="5" width=100%>
					<tr>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_pengguna'];
									$nama = $select_result['nama_pengguna'];
									$judul = $select_result['judul'];
									$id_paper=$select_result['id_paper'];
									
									echo "<td width=10%>&bull;ID $id_paper
										 with title <a href='lihat_paper.php?id_paper=$id_paper' target='_blank'>$judul</a>
										</tr>";
								}
								echo "
									  <h3>ID Participant : $id</h3>
									  <h3>Name : $nama</h3>
									  <h3>Paper Detail : </h3>";
							} 
							else
							{
								echo "<h4>Participant does not have a paper</h4>";
							}
						?>
					</p>
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