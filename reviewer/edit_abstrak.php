<?php
	include('../include/library.php');
	$link=koneksi_db();	
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="4"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>REVIEWER PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">ABSTRACT REVIEW</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$id=$_SESSION['id_pengguna'];
							$id_abstrak=@$_REQUEST['id_abstrak'];
							$id_bidang_kajian=@$_REQUEST['id_bidang_kajian'];
							if (ctype_alnum($id_abstrak))
							{		
							$sql = "select * from cms_abstrak,cms_bidang_kajian
							where cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
							and cms_abstrak.id_abstrak='$id_abstrak'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_abstrak = $select_result['id_abstrak'];
									$tgl = $select_result['tgl_upload_abstrak'];
									$judul = $select_result['judul'];
									$upjudul=strtoupper($judul);
									$abstrak = $select_result['abstrak'];
									$ucabstrak=ucfirst($abstrak);
									$bidang_kajian = $select_result['nama_bidang_kajian'];
									$status_penerimaan = $select_result['status_penerimaan_abstrak'];
									$keyword = $select_result['keyword'];
									$uckeyword=strtoupper($keyword);
								}
								echo"
								<form action='update_abstrak.php' method='POST'>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id_abstrak" size="30" value="<?php echo $id_abstrak ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>ID Abstract</td>
										<td>
											$id_abstrak
										</td>
									</tr>
									<tr>
										<td>Title</td>
										<td>
											$upjudul
										</td>
									</tr>
									<tr>
										<td>Content</td>
										<td>
											$ucabstrak
										</td>
									</tr>
									<tr>
										<td>Keyword</td>
										<td>
											$uckeyword
										</td>
									</tr>
									<tr>
										<td>Acceptance Status</td>
										<td>
											<select name='status_penerimaan' required>
											";
											if ($status_penerimaan=='3')
											{
											echo "
												<option value=''>Choose</option>
												<option value=''>----------</option>
												<option value='1'>Rejected</option>
												<option value='2'>Accepted</option>
											";
											}
											else if ($status_penerimaan=='1')
											{
											echo "
												<option value='1'>Rejected</option>
												<option value=''>----------</option>
												<option value='2'>Accepted</option>
											";
											}
											else if ($status_penerimaan=='2')
											{
											echo "
												<option value='2'>Accepted</option>
												<option value=''>----------</option>
												<option value='1'>Rejected</option>
											";
											}
											echo "
											</select>
										</td>
									</tr>
									<tr>
										<td>Another Reviewer</td>
										<td>
											<select name='reviewer'>
								";
												$res2=mysql_query("SELECT * FROM review_abstrak,cms_reviewer,cms_pengguna
																where id_abstrak='$id_abstrak'
																and review_abstrak.id_pengguna=cms_reviewer.id_pengguna
																and cms_reviewer.id_pengguna=cms_pengguna.id_pengguna
																and cms_reviewer.id_pengguna not in ('$id')");
												$banyakrecord2=mysql_num_rows($res2);
												if($banyakrecord2>0)
												{
													while($select_result2 = mysql_fetch_array($res2))
													{
														$id_reviewer=$select_result2['nama_pengguna'];	
														$id_pengguna=$select_result2['id_pengguna'];	
													
													$res3=mysql_query("select * from review_abstrak,cms_reviewer,cms_abstrak,cms_peserta,cms_tahun
																		where cms_reviewer.id_pengguna=review_abstrak.id_pengguna
																		and review_abstrak.id_pengguna='$id_pengguna'
																		and review_abstrak.id_abstrak=cms_abstrak.id_abstrak
																		and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
																		and cms_peserta.id_tahun=cms_tahun.id_tahun
																		and cms_tahun.kode_aktif='1'");
													$banyakrecord3=mysql_num_rows($res3);
									echo"
													<option value='$id_pengguna'>$id_reviewer ($banyakrecord3)</option>
													<option value=''>----------</option>
									";
													}
												}
												else
												{
								echo"
												<option value=''>Choose</option>
												<option value=''>----------</option>
								";
												}
												$res=mysql_query("SELECT * FROM cms_pengguna,cms_reviewer,reviewer_bidang_kajian
												where cms_pengguna.kategori_pengguna=4
												and cms_reviewer.id_pengguna not in ('$id')
												and cms_reviewer.id_pengguna=cms_pengguna.id_pengguna
												and reviewer_bidang_kajian.id_bidang_kajian='$id_bidang_kajian'
												and reviewer_bidang_kajian.id_pengguna=cms_reviewer.id_pengguna");
												$banyakrecord=mysql_num_rows($res);
												if($banyakrecord>0)
												{
													while($data=mysql_fetch_array($res))
													{	
														$id_pengguna2=$data['id_pengguna'];	
														$res3=mysql_query("select * from review_abstrak,cms_reviewer,cms_abstrak,cms_peserta,cms_tahun
																		where cms_reviewer.id_pengguna=review_abstrak.id_pengguna
																		and review_abstrak.id_pengguna='$id_pengguna2'
																		and review_abstrak.id_abstrak=cms_abstrak.id_abstrak
																		and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
																		and cms_peserta.id_tahun=cms_tahun.id_tahun
																		and cms_tahun.kode_aktif='1'");
														$banyakrecord3=mysql_num_rows($res3);
														echo "<option value=\"".$data['id_pengguna']."\">".$data['nama_pengguna']." ($banyakrecord3)"."</option>";
													}
												}
												else
												{														
													echo "<option value=''>No reviewer found</option>";
												}
								echo "
											</select>
										</td>
									</tr>
									<tr>
										<td align='right'>
												<input type='image' src='../gambar/update.jpg' width='25' title='Update Abstract'>
										</td>
								</form>
								<form action='abstract.php'>
										<td align='left'>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'>
										</td>
								</form>
									</tr>
								</table>";
							}
				}
				else
				{
					echo"
					<table border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
					<tr align='center'>
					<td>
									<img src='../gambar/forbidden.jpg'>
					</td>
					</tr>
					</table>
				";
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
	  ($_SESSION['aktif']<>"4"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>