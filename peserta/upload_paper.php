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
		<?php include ('menu.php'); ?>
			<table border=0 width=75% align="center">	
				<tr>
					<td>
						<p align="justify">
							<b><font size="+1">UPLOAD PAPER</font></b>
							<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
							<?php
								$link=koneksi_db();	
								$id=$_SESSION['id_pengguna'];
								$sql = "select id_paper from cms_paper order by id_paper desc limit 1";
								$query = mysql_query($sql,$link);
								$jumlah = mysql_num_rows($query);
	
								//Jika data kosong akan tampil A0001
								if($jumlah==0)
								{
									$kode = "P0001";   
								}
								else
								{
									//Jika ada , ambil data terakhir sesuai query diatas dan ambil angka terahir dari data diatas
									$data  =  mysql_fetch_array($query);
									$kodedatabase = $data[0];
		
									//menghitung jumlah karakter kode
									$hitung  =  strlen($kodedatabase);
		
									//Jika data lebih dari sepuluh dan jika jumlah karakter dari data terakhir sama dengan 5 (A0001)
									if ((substr($kodedatabase,$hitung-1,1)<9) && (substr($kodedatabase,$hitung-2,1)==0))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-1,1);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "P000".$add;
									}
									else if ((substr($kodedatabase,$hitung-1,1)>8) && (substr($kodedatabase,$hitung-2,1)==0))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-1,1);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "P00".$add;
									}
									else if ((substr($kodedatabase,$hitung-2,2)<100) && (substr($kodedatabase,$hitung-3,1)==0))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-2,2);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "P00".$add;
									}
									else if ((substr($kodedatabase,$hitung-3,3)<1000) && (substr($kodedatabase,$hitung-4,1)==0))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-3,3);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "P0".$add; 
									}
									else if ((substr($kodedatabase,$hitung-4,4)<10000) && (substr($kodedatabase,$hitung-5,1)=='P'))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-4,4);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "P".$add; 
									} 
								}
								
							?>      
								<?php
									$sql2 = "select * from cms_paper,cms_abstrak,cms_bidang_kajian
									where cms_paper.id_abstrak=cms_abstrak.id_abstrak
									and cms_abstrak.id_pengguna='$id'
									and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian";
									$query2 = mysql_query($sql2,$link);
									$banyakrecord=mysql_num_rows($query2);
									if($banyakrecord>0)
									{
								?>
											<table align='center' border='0' width=100% cellpadding='5'>
												<tr>
													<td colspan="4">
													<font size="-1">**paper review result will automatic sent to you by email</font>
													</td>
													<td colspan="3" valign="top">
														<div align="right">There are <b><?php echo $banyakrecord;?></b> data of paper</div>	
													</td>
												</tr>
												<tr align="center" bgcolor="#CCCCCC">
													<th>ID Paper</th>
													<th>Date Upload</th>
													<th>Title</th>
													<th>Category of Paper</th>
													<th>Status Review</th>
													<th>See Review</th>
													<th>Acceptance Status</th>
												</tr>									
								<?php 
										while($select_result = mysql_fetch_array($query2))
										{
											$id_paper = $select_result['id_paper'];
											$id_abstrak = $select_result['id_abstrak'];
											$tgl = $select_result['tgl_upload_paper'];
											$judul = $select_result['judul'];
											$ucjudul=strtoupper($judul);
											$bidang_kajian = $select_result['nama_bidang_kajian'];
											$status_review = $select_result['status_review_paper'];
											$status_penerimaan = $select_result['status_penerimaan_paper'];
											
											echo "
												<tr>
													<td align='center'>$id_paper</td>
													<td align='center'>$tgl</td>
													<td>$ucjudul</td>
													<td>$bidang_kajian</td>
											";
											if ($status_review=='1')
											{
												$ket='Unreviewed';
											}
											else if ($status_review=='2')
											{
												$ket='Been Reviewed';
											}
											echo "
													<td align='center'>$ket**</td>";	
																			
											$sql = "select review from cms_paper
													where review<>' '
													and review is not null
													and id_paper='$id_paper'";
											$res = mysql_query($sql);
											$banyakrecord=mysql_num_rows($res);
											if($banyakrecord>=1)
											{
											echo"
													<form method=\"POST\" action=\"review.php?id=$id_paper\">
													<td align='center'>
														<input type='image' src='../gambar/bidang_kajian.png' width='25' title='See Review'>
														<input type=\"hidden\" value=\"$id_paper\" name=\"id_paper\">
													</td>
													</form>";
											}
											else
											{
												echo"
														<td align='center'>
															No review for this paper
														</td>";
											}
											if ($status_penerimaan=='1')
											{
												$ket_2='Rejected';
											}
											else if ($status_penerimaan=='2')
											{
												$ket_2='Accepted';
											}
											else if ($status_penerimaan=='3')
											{
												$ket_2='Please Wait The Review';
											}
											else if ($status_penerimaan=='4')
											{
												$ket_2='Revision';
											}
											
											if ($status_penerimaan=='1')
											{
													echo"<td align='center'>$ket_2</td>";
											}
											else if ($status_penerimaan=='2')
											{
													echo"<td align='center'><a href='upload_scan_transfer.php' title='Click To Pay' id='link'>$ket_2</a></td>";
											}
											else
											{
													echo"<td align='center'>$ket_2</td>";
											}
												echo "</tr>";
										}
									}
									else
									{
								?>
										<div align="right">Your data of paper not found. Please upload your paper</div>	
								<?php
									};
									?>
							</table>
							<br>
								<?php
									$sql2 = "select * from cms_paper,cms_abstrak,cms_bidang_kajian
											where cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cms_abstrak.id_pengguna='$id'
											and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian";
									$query2 = mysql_query($sql2,$link);
									$banyakrecord=mysql_num_rows($query2);
									if($banyakrecord<2)
									{
									
									$sql3 = "select * from cms_tahun
											where kode_aktif='1'";
									$query3 = mysql_query($sql3);
									$banyakrecord3=mysql_num_rows($query3);
									if($banyakrecord3>0)
									{
										while($select_result = mysql_fetch_array($query3))
										{
											$tgl_akhir = $select_result['tgl_akhir'];
										}
										$tgl_now=date('Y-m-d'); 
										if ($tgl_now<>$tgl_akhir)
										{
								?>
									<table width=50% align="center" border="0" cellpadding="5" cellspacing="0">
										<tr>
											<td colspan="2"><h5>*format upload in pdf, doc, docx and size no more than 2 MB</h5></td>
										</tr>
										<tr>
											<td width=30%>ID</td>
											<td>
											<?php echo "$kode"; ?>
											</td>
										</tr>
										<?php
										if(isset($_POST['abstrak']))
										{
											$abstrak=$_POST['abstrak'];
											if ($abstrak<>'')
											{
												$sql = "select * from cms_abstrak where id_abstrak='$abstrak'";
												$res = mysql_query($sql);
												while($select_result = mysql_fetch_array($res))
												{
													$judul=$select_result['judul'];
													$upjudul=strtoupper($judul);
													$ket=$select_result['id_abstrak'];
												}
											}
											else
											{
												$upjudul='There is no abstract';
												$ket='Choose';
											}
										}	
										else
										{
												$upjudul='-';
												$ket='Choose';
										}
										?>
										<tr>
											<td>ID Abstract</td>
											<td>
											<form method='POST' action='<?php echo $_SERVER['PHP_SELF'];?>'>
												<select name="abstrak" onchange='this.form.submit()' required>
													<option value="" required><?php echo @$ket ?></option>
													<option value="" required>----------</option>
													<?php
														$link=koneksi_db();
														$id=$_SESSION['id_pengguna'];
														$cekdata="select * from cms_abstrak,cms_paper
																where cms_abstrak.id_pengguna='$id'
																and cms_abstrak.id_abstrak=cms_paper.id_abstrak"; 
														$ada=mysql_query($cekdata);
														if(mysql_num_rows($ada)>0) 
														{														
															while($select_result = mysql_fetch_array($ada))
															{
																$id_abstrak=$select_result['id_abstrak'];
															}
																$cekdata2="select * from cms_abstrak
																		where cms_abstrak.id_abstrak<>'$id_abstrak'
																		and cms_abstrak.id_pengguna='$id'
																		and cms_abstrak.status_penerimaan_abstrak=2"; 
																$ada2=mysql_query($cekdata2);
																if(mysql_num_rows($ada2)>0) 
																{
																	while($select_result2 = mysql_fetch_array($ada2))
																	{																	
																		echo "<option required value=\"".$select_result2['id_abstrak']."\">".$select_result2['id_abstrak']."</option>";
																	}
																}
														}
														else
														{
																$cekdata2="select * from cms_abstrak
																			where id_pengguna='$id'
																			and cms_abstrak.status_penerimaan_abstrak=2"; 
																$ada2=mysql_query($cekdata2);
																if(mysql_num_rows($ada2)>0) 
																{
																	while($select_result2 = mysql_fetch_array($ada2))
																	{																	
																		echo "<option required value=\"".$select_result2['id_abstrak']."\">".$select_result2['id_abstrak']."</option>";
																	}
																}
														}
													?>
												</select>
											</form>
											</td>
										</tr>
									<form action="insert_paper.php" method="post" enctype="multipart/form-data">
										<tr>
											<td width=30%>Title</td>
											<td>
											<?php echo "$upjudul"; ?>
											<input type="hidden" name="kode" size="30" value="<?php echo $kode ; ?>" maxlength="50"/>
											<input type="hidden" value="<?php echo @$abstrak ?>" name="abstrak">
											</td>
										</tr>
										<tr>
											<td>Choose File*</td>
											<td><input type="file" name="paper_file" required /></td>
										</tr>
										<tr>
											<td align="right">
												<input type='image' src='../gambar/add.png' width='25' name='kirim' title='Upload Paper'>
											</td>
									</form>
									<form action="upload_abstrak.php">							
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
								  	echo "
							<br><table align='center' border='0' width=75% cellpadding='5'><tr><td align='center'>You can not upload paper because seminar is over. You can try it in next seminar. Thank you</td></tr>
							</table>";
								  }
							}
									?>
							<?php 
								  } ?>
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
	  ($_SESSION['aktif']<>"1"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>