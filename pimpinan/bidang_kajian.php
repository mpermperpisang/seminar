<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>HEADSHIP PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="5">
					<p align="justify">
						<b><font size="+1">CATEGORY REVIEWER</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();
							$id=$_REQUEST['id_pengguna'];			
							$sql = "select * from cms_pengguna,cms_reviewer,cms_bidang_kajian,reviewer_bidang_kajian
							where cms_pengguna.id_pengguna='$id' and
							cms_pengguna.id_pengguna=cms_reviewer.id_pengguna and
							cms_reviewer.id_pengguna=reviewer_bidang_kajian.id_pengguna and
							reviewer_bidang_kajian.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian";
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
									$bidang = $select_result['nama_bidang_kajian'];									
									echo "<td>&bull;<font size='-1'>$bidang</font></td></tr>";
								}
								echo "
									  <h3>ID Reviewer : $id</h3>
									  <h3>Name of Reviewer : $nama</h3>
									  <h3>Category Review :</h3>";
							} 
							else
							{
								echo "
									  <h4>Category Review : Reviewer does not have a category of review</h4>";
							}
						?>
					</p>
		</table>
		<?php include('../footer.php'); ?>
	</body>
</html>
<?php
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"5"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>