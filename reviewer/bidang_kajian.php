<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="4"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>REVIEWER PAGE</title>
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
						<b><font size="+1">CATEGORY REVIEWER</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();
							$id=$_SESSION['id_pengguna'];			
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
									$id_reviewer_kajian = $select_result['id_reviewer_bidang_kajian'];
									$id = $select_result['id_pengguna'];
									$nama = $select_result['nama_pengguna'];	
									$id_bidang = $select_result['id_bidang_kajian'];	
									$bidang = $select_result['nama_bidang_kajian'];	
									$ucbidang=ucwords($bidang);								
									echo "
											<form method=\"POST\" action=\"edit_bidang_reviewer.php?id=$id\">
											<td width=20%>&bull;<font size='-1'>$bidang</font></td>
											<td width=5% align='center'>
											<input type=\"hidden\" value=\"$id_bidang\" name=\"id_bidang\">
											<input type='image' title='Edit Category of Review' src='../gambar/edit.png' width='25' align='absmiddle'>
											</td>
											</form>
											<form method=\"POST\" action=\"delete_bidang_reviewer.php?id=$id\">
											<td>
											<input type=\"hidden\" value=\"$id_reviewer_kajian\" name=\"id_bidang\">
											<input type='image' title='Delete Category of Review' src='../gambar/delete.png' width='25' align='absmiddle' onclick='return confirmSubmit()'>
											</td>
											</form>
										</tr>&nbsp;";
								}
								echo "
									  <h3>ID Reviewer : $id</h3>
									  <h3>Name of Reviewer : $nama</h3>
									  <h3>Category Review :</h3>
										<form method=\"POST\" action=\"add_bidang_reviewer.php?id=$id\">
											<input type='image' title='Add Category of Review' src='../gambar/add.png' width='25' title='Add Category of Review'>&nbsp;
										</form>
										<form method=\"POST\" action=\"index.php\">
											<input type='image' title='Cancel' src='../gambar/cancel.jpg' width='25' title='Cancel'>
										</form>";
							} 
							else
							{
								echo "
										<form method=\"POST\" action=\"add_bidang_reviewer.php?id=$id\">
								<tr>
										<td align='right'>
											<input type=\"hidden\" value=\"$id\" name=\"id\">
											<input type='image' title='Add Category of Review' src='../gambar/add.png' width='25' title='Add Category of Review'>
										</td>
										</form>
										<form method=\"POST\" action=\"index.php\">
										<td align='left'>
											<input type='image' title='Cancel' src='../gambar/cancel.jpg' width='25' title='Cancel'>
										</td>
										</form>
								</tr>
										<h4>Category of Review : you don't have a category of review yet</h4>";
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
	  ($_SESSION['aktif']<>"4"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>