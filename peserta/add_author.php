<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>PARTICIPANT PAGE</title>
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
						<b><font size="+1">AUTHOR OF YOUR ABSTRAK</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();
							$id_pengguna=$_SESSION['id_pengguna'];
							$id_abstrak=$_REQUEST['id_abstrak'];	
							$sql = "select * from cms_pengguna,cms_peserta,cms_abstrak,cms_penulis
									where cms_pengguna.id_pengguna=cms_peserta.id_pengguna
									and cms_peserta.id_pengguna='$id_pengguna'
									and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
									and cms_penulis.id_abstrak='$id_abstrak'
									and cms_penulis.id_abstrak=cms_abstrak.id_abstrak";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>=1)
							{
						?>	
				</td>	
			</tr>
		</table>
		<table align="left" border="0" cellpadding="5" width=25%>
						<?php
								echo "
										<tr>
											<td>Author</td>
										</tr>
										<tr>
											<td>
											&bull;<font size='-1'>".ucwords($nama_pengguna)."</font>
											</td>
										</tr>";
								while($select_result = mysql_fetch_array($res))
								{
									$nama_pengguna = $select_result['nama_pengguna'];
									$ucnama_pengguna=ucwords($nama_pengguna);
									$id_abstrak = $select_result['id_abstrak'];
									$nama_penulis = $select_result['nama_penulis'];	
									$ucnama_penulis=ucwords($nama_penulis);
									$id_penulis = $select_result['id_penulis'];	
																
									echo "
										<tr>
											<form method=\"POST\" action=\"edit_penulis.php?id=$id_penulis\">
												<input type=\"hidden\" value=\"$id_penulis\" name=\"id_penulis\">
												<input type=\"hidden\" value=\"$id_abstrak\" name=\"id_abstrak\">
											<td>
											&bull;<font size='-1'>$ucnama_penulis</font>
											</td>
											<td>
												<input type='image' title='Edit Author' src='../gambar/edit.png' width='25' align='absmiddle'>&nbsp;
											</td>
											</form>
											<form method=\"POST\" action=\"delete_penulis.php?id=$id_penulis\">
												<input type=\"hidden\" value=\"$id_penulis\" name=\"id_penulis\">
												<input type=\"hidden\" value=\"$id_abstrak\" name=\"id_abstrak\">
											<td>
												<input type='image' title='Delete Author' src='../gambar/delete.png' width='25' align='absmiddle' onclick='return confirmSubmit()'>&nbsp;
											</td>
											</form>
										</tr>";
								}
								$id_abstrak=$_REQUEST['id_abstrak'];		
								$sql2 = "select * from cms_abstrak,cms_peserta,cms_pengguna
										where cms_peserta.id_pengguna=cms_abstrak.id_pengguna
										and cms_abstrak.id_abstrak='$id_abstrak'
										and cms_peserta.id_pengguna='$id_pengguna'
										and cms_peserta.id_pengguna=cms_pengguna.id_pengguna";
								$res2 = mysql_query($sql2);
								while($select_result2 = mysql_fetch_array($res2))
								{
									$nama_pengguna = $select_result2['nama_pengguna'];
									$judul = strtoupper($select_result2['judul']);
								}
								echo "
									  <h3>ID Abstract : $id_abstrak</h3>
									  <h3>Title : $judul</h3>
										<form method=\"POST\" action=\"add_penulis.php?id=$id_abstrak\">
											<input type=\"hidden\" value=\"$id_abstrak\" name=\"id\">
											<input type='image' title='Add Author' src='../gambar/add.png' width='25'>&nbsp;
										</form>
										<form method=\"POST\" action=\"upload_abstrak.php\">
											<input type='image' title='Cancel' src='../gambar/cancel.jpg' width='25'>
										</form>";					
							} 
							else
							{			
								$id_abstrak=$_REQUEST['id_abstrak'];	
								$sql2 = "select * from cms_abstrak,cms_peserta,cms_pengguna
										where cms_peserta.id_pengguna=cms_abstrak.id_pengguna
										and cms_abstrak.id_abstrak='$id_abstrak'
										and cms_peserta.id_pengguna='$id_pengguna'
										and cms_peserta.id_pengguna=cms_pengguna.id_pengguna";
								$res2 = mysql_query($sql2);
								while($select_result2 = mysql_fetch_array($res2))
								{
									$nama_pengguna = $select_result2['nama_pengguna'];
									$ucnama_pengguna=ucwords($nama_pengguna);
									$id_abstrak = $select_result2['id_abstrak'];
									$judul = $select_result2['judul'];
									
									echo"
								<tr>
										<form method=\"POST\" action=\"add_penulis.php?id=$id_abstrak\">
											<td align='right'>
												<input type=\"hidden\" value=\"$id_abstrak\" name=\"id\">
												<input type='image' title='Add Author' src='../gambar/add.png' width='25'>
											</td>
										</form>
										<form method=\"POST\" action=\"upload_abstrak.php\">
											<td align='left'>
												<input type='image' title='Cancel' src='../gambar/cancel.jpg' width='25'>
											</td>
										</form>
								</tr>";
									
									echo "Your Abstract's Code is $id_abstrak<br><br>Title $judul<br><br>The Author is only $ucnama_pengguna";
								}
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
	  ($_SESSION['aktif']<>"1"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>