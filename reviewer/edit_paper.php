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
		<script type="text/javascript" src="../rich_text_editor/ckeditor.js"></script>
		<script type="text/javascript" src="../kalender/agenda.js"></script>
		<link href="../rich_text_editor/content.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<?php
		  if (isset($_REQUEST['ok'])){
			$judul = $_REQUEST['judul'];
			$content = $_REQUEST['news'];
			echo "Judul:<b>$judul</b><br/>";
			echo "Isi berita:<br/>$content<br/>";
		  }
		?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">PAPER REVIEW</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();	
							$id=$_SESSION['id_pengguna'];
							$id_paper=@$_REQUEST['id_paper'];
							$id_bidang_kajian=@$_REQUEST['id_bidang_kajian'];
							if (ctype_alnum($id_paper))
							{		
							$sql = "select * from cms_paper,cms_abstrak,cms_bidang_kajian
							where cms_abstrak.id_abstrak=cms_paper.id_abstrak
							and cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
							and cms_paper.id_paper='$id_paper'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_paper = $select_result['id_paper'];
									$tgl = $select_result['tgl_upload_abstrak'];
									$judul = $select_result['judul'];
									$upjudul=strtoupper($judul);
									$nama_bidang = $select_result['nama_bidang_kajian'];
									$review = $select_result['review'];
									$status_penerimaan = $select_result['status_penerimaan_paper'];
								}
								echo"
								<form action='update_paper.php' method='POST' name='paper' >
								<table border=\"0\" width=\"75%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\"  id=\"tabeledit\">
								";
							?>
								<input type="hidden" name="id_paper" size="30" value="<?php echo $id_paper ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>ID Paper</td>
										<td>
											$id_paper
										</td>
									</tr>
									<tr>
										<td>Title</td>
										<td>
											$upjudul
										</td>
									</tr>
									<tr>
										<td>Write a Review*</td>
										<td>
											<textarea cols=30 id='news' rows=10 name='review'>$review</textarea>
											<script type='text/javascript'>
												var editor = CKEDITOR.replace('news');
											</script>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<font size=-2>*empty review if you not need a revision from presenter</font>
										</td>
									</tr>";
								?>
									<tr>
										<td>Choose Due Date</td>
										<td>
										<?php		
											$sql = "select * from cms_paper where id_paper='$id_paper'";
											$res = mysql_query($sql);
											while($select_result = mysql_fetch_array($res))
											{
												$tgl = $select_result['akhir_review'];
											}
										?>
											<input type="text" value="<?php echo $tgl; ?>" id="akhir" name="akhir" onClick="if(self.gfPop)gfPop.fPopCalendar(document.paper.akhir);return false;"/>
											<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.paper.akhir);return false;">
												<img name="popcal" align="absmiddle" style="border:none" src="../calender/calender.jpeg" width="34" height="29" border="0" alt="">
											</a>
										</td>
									</tr>
									<tr>
										<td>Value</td>
										<td>
											<select name="nilai" required>
											<?php		
												$sql = "select nilai from cms_paper where id_paper='$id_paper' and nilai is not null";
												$res = mysql_query($sql);
												$banyakrecord=mysql_num_rows($res);
												if($banyakrecord>0)
												{
													while($select_result = mysql_fetch_array($res))
													{
														$nilai = $select_result['nilai'];
													}
											?>
												<option value="<?php echo $nilai ?>" required><?php echo $nilai ?></option>
											<?php
												}
												else
												{
											?>
												<option value="" required>Choose</option>
											<?php
												}
											?>
												<option value="" required>-----</option>
												<option value="10" required>10</option>
												<option value="15" required>15</option>
												<option value="20" required>20</option>
												<option value="25" required>25</option>
												<option value="30" required>30</option>
												<option value="35" required>35</option>
												<option value="40" required>40</option>
												<option value="45" required>45</option>
												<option value="50" required>50</option>
												<option value="55" required>55</option>
												<option value="60" required>60</option>
												<option value="65" required>65</option>
												<option value="70" required>70</option>
												<option value="75" required>75</option>
												<option value="80" required>80</option>
												<option value="85" required>85</option>
												<option value="90" required>90</option>
												<option value="95" required>95</option>
												<option value="100" required>100</option>
											</select>
										</td>
									</tr>
									<tr>
								<?php
								echo "
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
												<option value='4'>Revision</option>
											";
											}
											else if ($status_penerimaan=='1')
											{
											echo "
												<option value='1'>Rejected</option>
												<option value=''>----------</option>
												<option value='2'>Accepted</option>
												<option value='4'>Revision</option>
											";
											}
											else if ($status_penerimaan=='2')
											{
											echo "
												<option value='2'>Accepted</option>
												<option value=''>----------</option>
												<option value='4'>Revision</option>
												<option value='1'>Rejected</option>
											";
											}
											else if ($status_penerimaan=='4')
											{
											echo "
												<option value='2'>Revision</option>
												<option value=''>----------</option>
												<option value='1'>Rejected</option>
												<option value='4'>Accepted</option>
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
												$res2=mysql_query("SELECT * FROM review_paper,cms_reviewer,cms_pengguna
																where id_paper='$id_paper'
																and review_paper.id_pengguna=cms_reviewer.id_pengguna
																and cms_reviewer.id_pengguna=cms_pengguna.id_pengguna
																and cms_reviewer.id_pengguna not in ('$id')");
												$banyakrecord2=mysql_num_rows($res2);
												if($banyakrecord2>0)
												{
													while($select_result2 = mysql_fetch_array($res2))
													{
														$id_reviewer=$select_result2['nama_pengguna'];	
														$id_pengguna=$select_result2['id_pengguna'];	
													
													$res3=mysql_query("select * from review_paper,cms_reviewer,cms_paper,cms_abstrak,cms_peserta,cms_tahun
																	where cms_reviewer.id_pengguna=review_paper.id_pengguna
																	and review_paper.id_pengguna='$id_pengguna'
																	and review_paper.id_paper=cms_paper.id_paper
																	and cms_paper.id_abstrak=cms_abstrak.id_abstrak
																	and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
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
														$res3=mysql_query("select * from review_paper,cms_reviewer,cms_paper,cms_abstrak,cms_peserta,cms_tahun
												where cms_reviewer.id_pengguna=review_paper.id_pengguna
												and review_paper.id_pengguna='$id_pengguna2'
												and review_paper.id_paper=cms_paper.id_paper
												and cms_paper.id_abstrak=cms_abstrak.id_abstrak
												and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
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
												<input type='image' src='../gambar/update.jpg' width='25' title='Update Paper'>
										</td>
								</form>
								<form action='paper.php'>
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
			<iframe width=174 height=189 name="gToday:normal:../calender/agenda.js" id="gToday:normal:../calender/agenda.js" src="../calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
			</iframe>
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