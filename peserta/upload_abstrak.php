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
		<script type="text/javascript" src="../rich_text_editor/ckeditor.js"></script>
		<link href="../rich_text_editor/content.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onLoad="self.focus();document.form1.judul.focus()">	
		<?php include ('../header.php'); ?>
		<?php include ('menu.php'); ?>
		<?php
		  if (isset($_REQUEST['ok'])){
			$judul = $_REQUEST['judul'];
			$content = $_REQUEST['news'];
			echo "Judul:<b>$judul</b><br/>";
			echo "Isi berita:<br/>$content<br/>";
		  }
		?>
			<table border=0 width=75% align="center">	
				<tr>
					<td>
						<p align="justify">
							<b><font size="+1">UPLOAD ABSTRACT</font></b>
							<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
							<?php
								$link=koneksi_db();	
								$id_pengguna=$_SESSION['id_pengguna'];
								$sql = "select id_abstrak from cms_abstrak order by id_abstrak desc limit 1";
								$query = mysql_query($sql,$link);
								$jumlah = mysql_num_rows($query);
	
								//Jika data kosong akan tampil A0001
								if($jumlah==0)
								{
									$kode = "A0001";   
								}
								else
								{
									//Jika ada , ambil data terakhir sesuai query diatas dan ambil angka terahir dari data diatas
									$data  =  mysql_fetch_array($query);
									$kodedatabase = $data[0];
		
									//menghitung jumlah karakter kode
									$hitung  =  strlen($kodedatabase);
		
									//Jika data lebih dari sepuluh dan jika jumlah karakter dari data terakhir sama dengan 5 (A0001)
									if ((substr($kodedatabase,$hitung-1,1)<10) && (substr($kodedatabase,$hitung-2,1)==0))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-1,1);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "A000".$add;
									}
									else if ((substr($kodedatabase,$hitung-2,2)<100) && (substr($kodedatabase,$hitung-3,1)==0))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-2,2);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "A00".$add; 
									}
									else if ((substr($kodedatabase,$hitung-3,3)<1000) && (substr($kodedatabase,$hitung-4,1)==0))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-3,3);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "A0".$add; 
									}
									else if ((substr($kodedatabase,$hitung-4,4)<10000) && (substr($kodedatabase,$hitung-5,1)=='A'))
									{
										//untuk memotong karakter terakhir pada kode motor       
										$ambil = substr($kodedatabase,$hitung-4,4);
										//hasil dari pecah string adalah angka , maka angka tersebut kita tambah satu
										$add  =  $ambil+1; 
										$kode  =  "A".$add; 
									} 
								}
								
									$sql2 = "select * from cms_abstrak,cms_bidang_kajian
									where id_pengguna='$id_pengguna'
									and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian";
									$query2 = mysql_query($sql2,$link);
									$banyakrecord=mysql_num_rows($query2);
									if($banyakrecord>0)
									{
								?>
											<table align='center' border='0' width=100% cellpadding='5'>
												<tr>
													<td colspan="4">
													<font size="-1">**abstract review result will automatic sent to you by email</font>
													</td>
													<td colspan="3" valign="top">
														<div align="right">There are <b><?php echo $banyakrecord;?></b> data of abstract</div>	
													</td>
												</tr>
												<tr align="center" bgcolor="#CCCCCC">
													<th>ID Abstract</th>
													<th>Date Upload</th>
													<th>Title</th>
													<th>Add Author</th>
													<th>Category of Abstract</th>
													<th>Status Review</th>
													<th>Acceptance Status</th>
												</tr>									
								<?php 
										while($select_result = mysql_fetch_array($query2))
										{
											$id_abstrak = $select_result['id_abstrak'];
											$tgl = $select_result['tgl_upload_abstrak'];
											$judul = $select_result['judul'];
											$abstrak = $select_result['abstrak'];
											$id_bidang_kajian = $select_result['id_bidang_kajian'];
											$bidang_kajian = $select_result['nama_bidang_kajian'];
											$status_review = $select_result['status_review_abstrak'];
											$status_penerimaan = $select_result['status_penerimaan_abstrak'];
											
											echo "
												<tr>
													<td align='center'>$id_abstrak</td>
													<td align='center'>$tgl</td>
													<td>";echo strtoupper($judul); echo"</td>
													<form method=\"POST\" action=\"add_author.php?id=$id_abstrak\">
													<td align='center'>
														<input type='image' src='../gambar/add.png' width='25' title='Add Author'>
														<input type=\"hidden\" value=\"$id_abstrak\" name=\"id_abstrak\">
													</td>
													</form>
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
											echo "
													<td align='center'>$ket**</td>";
											if ($status_penerimaan=='1')
											{
													echo"<td align='center'>$ket_2</td>";
											}
											else if ($status_penerimaan=='2')
											{
													echo"<td align='center'>
													<a href='upload_paper.php' title='Click To Upload Paper' id='link'>$ket_2</a>
													"; ?>
													<?php echo"</td>";
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
										<div align="right">Your data of abstract not found. Please upload your abstract</div>	
								<?php
									};
								?>
											</table>
							<br>
								<?php
									$sql2 = "select * from cms_abstrak,cms_bidang_kajian
									where id_pengguna='$id'
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
							<form action='insert_abstrak.php' method='POST' name="form1">
							<table align="center" border="0" width=75% cellpadding="5">
								<tr>
									<td>ID</td>
									<td>
									<?php echo "$kode"; ?>
									<input type="hidden" name="kode" size="30" value="<?php echo $kode ; ?>"/>
									</td>
								</tr>
								<tr>
									<td>Title</td>
									<td><input type='text' name='judul' size='33' maxlength='500' required ></td>
								</tr>
								<tr>
									<td>Category</td>
									<td>
										<select name="kategori" required>
											<option value="">Choose Category of Abstract</option>
											<option value="">-----------------------</option>
											<?php
												$link=koneksi_db();
												$res=mysql_query("SELECT * FROM cms_bidang_kajian where kode_aktif='1' order by nama_bidang_kajian");
												while($data=mysql_fetch_array($res))
												{
													echo "<option required value=\"".$data['id_bidang_kajian']."\">".$data['nama_bidang_kajian']."</option>";
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Content</td>
									<td>
										<textarea cols="80" id="news" name="abstrak" rows="50" required></textarea>
										<script type="text/javascript">
											var editor = CKEDITOR.replace('news');
										</script>
									</td>
								</tr>
								<tr>
									<td>Keywords</td>
									<td><input type='text' name='keyword' size='33' maxlength='150' required></td>
								</tr>
								<tr height="10">
									<td></td>
								</tr>
								<tr>
									<td align="right">
										<input type='image' title='Upload Abstrak' src='../gambar/add.png' width='25' name='kirim' title='Upload Abstract'>
									</td>
							</form>
							<form action="index.php">							
									<td align="left">
										<input type='image' title="Cancel" src='../gambar/cancel.jpg' width='25' name='kirim' title='Cancel'>
									</td>
							</form>
								</tr>
							</table>
							<?php 
								}
								  else
								  {
								  	echo "
							<br><table align='center' border='0' width=75% cellpadding='5'><tr><td align='center'>You can not upload abstract because seminar is over. You can try it in next seminar. Thank you</td></tr>
							</table>";
								  }
							}
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
	  ($_SESSION['aktif']<>"1"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>