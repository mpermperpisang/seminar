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
		<table border=0 width=100% align="center">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">THE AUTHOR OF MENU</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$id=$_SESSION['id_pengguna'];
							$sql = "select * from cms_menu,cms_pengguna,cms_admin
									where cms_menu.id_pengguna=cms_admin.id_pengguna
									and cms_pengguna.id_pengguna=cms_admin.id_pengguna";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								echo "<table border=\"0\" width=\"100%\" cellpadding=\"2\" cellspacing=\"2\" align=\"center\" bgcolor=\"#FFFFF\">
									<tr align='center' bgcolor='#CCCCCC'>
										<th>Name</th>
										<th>Name of Menu</th>
										<th>Title</th>
										<th>Content</th>
										<th>Date Change</th>
									</tr>";
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_pengguna'] ;
									$nama_pengguna=$select_result['nama_pengguna'];
									$ucnama=ucwords($nama_pengguna);
									$id_postingan=$select_result['id_menu'] ;
									$nama_postingan=$select_result['nama_menu'] ;
									$ucnama_postingan=ucwords($nama_postingan);
									$judul=$select_result['title'];
									$upjudul=ucwords($judul);
									$content=$select_result['isi'] ;
									$date=$select_result['date'] ;
								echo"
									<tr>
										<td>
											$ucnama
										</td>
										<td>
											$ucnama_postingan
										</td>
										<td align='center'>
											$upjudul
										</td>
										<td>
											$content
										</td>
										<td align='center'>
											$date
										</td>
									</tr>";
								}								
								echo "</table>";
							}
							else
							{
								echo "There is none that posting the menu";
							}
						?>
					</p>
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