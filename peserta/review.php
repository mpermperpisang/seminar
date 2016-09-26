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
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="5">
					<p align="justify">
						<b><font size="+1">PAPER'S REVIEW</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();
							$id_paper=$_REQUEST['id_paper'];			
							$sql = "select * from cms_paper,cms_abstrak,cms_bidang_kajian
									where id_paper='$id_paper'
									and cms_paper.id_abstrak=cms_abstrak.id_abstrak
									and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian";
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
									$id_paper = $select_result['id_paper'];
									$id_abstrak = $select_result['id_abstrak'];
									$judul = $select_result['judul'];	
									$ucjudul=strtoupper($judul);
									$bidang = $select_result['nama_bidang_kajian'];
									$review = $select_result['review'];
									echo "
										</tr>";
								}
								echo "
									  <h3>ID Paper : $id_paper</h3>
									  <h3>Title : $judul</h3>
									  <h3>Category of Paper : $bidang</h3>
									  <h3>Review : </h3>$review";
									  			
								$sql2 = "select * from cms_paper where review<>''";
								$res2 = mysql_query($sql2);
								$banyakrecord2=mysql_num_rows($res2);
								if($banyakrecord2>=1)
								{
									echo "<tr><td>";
								
									$sql3 = "select * from cms_paper
											where id_paper='$id_paper'";
									$query3 = mysql_query($sql3);
									$banyakrecord3=mysql_num_rows($query3);
									if($banyakrecord3>0)
									{
										while($select_result = mysql_fetch_array($query3))
										{
											$tgl_akhir = $select_result['akhir_review'];
										}
										$tgl_now=date('Y-m-d'); 
										if ($tgl_now<>$tgl_akhir)
										{
								?>
								<form action="update_revisi_paper.php" method="post" enctype="multipart/form-data">
									<table width="1000" align="center" border="0" cellpadding="5" cellspacing="0">
										<tr>
											<td colspan="2"><h5>*upload revision in pdf, doc, docx</h5></td>
										</tr>
										<tr>
											<td>ID</td>
											<td>
											<?php echo "$id_paper"; ?>
											<input type="hidden" name="kode" size="30" value="<?php echo $id_paper ; ?>"/>
											<input type="hidden" name="id_abstrak" size="30" value="<?php echo $id_abstrak ; ?>"/>
											</td>
										</tr>
										<tr>
											<td>Title</td>
											<td>
												<?php echo "$ucjudul"; ?>
												<input type="hidden" name="judul" size="30" value="<?php echo $judul ; ?>" maxlength="50"/>
											</td>
										</tr>
										<tr>
											<td>Choose File*</td>
											<td><input type="file" name="paper" required/></td>
										</tr>
										<tr>
											<td align="right">
												<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Upload Revision'>
											</td>
								</form>
								<form action="upload_paper.php">							
											<td align="left">
												<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'>
											</td>
								</form>
										</tr>
									</table>
								<?php
										}
										else
										{
											echo "<h3>Your revision time is over</h3>";
										}
									}
									echo"</td></tr>";
								}
								else
								{
								}
							}							
							else
							{
								echo "<h4>Your paper not yet reviewed</h4>";
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