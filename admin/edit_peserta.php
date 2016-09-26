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
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">EDIT PARTICIPANT</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$id=$_REQUEST['id'];
							if (($id>0) && (ctype_alnum($id)))
							{
							$sql = "select * from cms_pengguna,cms_peserta
							where cms_pengguna.id_pengguna='$id'
							and cms_pengguna.id_pengguna=cms_peserta.id_pengguna";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_pengguna'] ;
									$username=$select_result['username'] ;
									$password=$select_result['pw'];
									$nama=$select_result['nama_pengguna'];
									$kelamin=$select_result['jenis_kelamin'];
									$alamat=$select_result['alamat'];
									$telp=$select_result['telp'];
									$email=$select_result['email'];
									$no_identitas=$select_result['no_identitas'];
									$institusi=$select_result['institusi'];
									$jabatan=$select_result['jabatan'];
									$kategori_peserta=$select_result['kategori_peserta'];
								}
								echo"
								<form action='update_peserta.php' method='POST'>
								<font size='-2'>*do not use space or weird character</font><br>
								<font size='-2'>**do not use other character than numeral</font>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id" size="30" value="<?php echo $id ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>Username*</td>
										<td>
											<input type='text' name='username' size='30' maxlength='20' value='$username' required/>
										</td>
									</tr>
									<tr>
										<td>Password</td>
										<td>
											<input type='password' name='password' size='30' maxlength='50' value='$password' required/>
										</td>
									</tr>
									<tr>
										<td>Email*</td>
										<td>
											<input type='text' name='email' size='30' maxlength='50' value='$email' required/>
										</td>
									</tr>
									<tr>
										<td>Name of Participant</td>
										<td>
											<input type='text' name='nama' size='30' maxlength='100' value='$nama' required/>
										</td>
									</tr>
									<tr>
										<td>Gender</td>
										<td>											
											<select name='kelamin' class='input_date' required>
												<option value='$kelamin'>$kelamin</option>
												<option value=''>-------</option>
								";
												if ($kelamin=='Female')
												{
												echo"
													<option value='Male'>Male</option>";
												}
												else if ($kelamin=='Male')
												{	
												echo"												
													<option value='Female'>Female</option>";
												}
								echo"
											</select>
      									</tr>
									<tr>
										<td>Address</td>
										<td>
											<input type='text' name='alamat' size='30' maxlength='150' value='$alamat' required/>
										</td>
									</tr>
									<tr>
										<td>Phone Number**</td>
										<td>
											<input type='text' name='telp' size='30' maxlength='12' value='$telp' required/>
										</td>
									</tr>
									<tr>
										<td>Identity Card Number**</td>
										<td>
											<input type='text' name='no_identitas' size='30' maxlength='50' value='$no_identitas' required/>
										</td>
									</tr>
									<tr>
										<td>Institusi</td>
										<td>
											<input type='text' name='institusi' size='30' maxlength='150' value='$institusi' required/>
										</td>
									</tr>
									<tr>
										<td>Position in Institusi</td>
										<td>
											<input type='text' name='jabatan' size='30' maxlength='50' value='$jabatan' required/>
										</td>
									</tr>
									<tr>
										<td>Type of Participant</td>
										<td>
											<select name='participant' required>
											";
											if ($kategori_peserta=='')
											{
											echo "
												<option value=''>Choose Type of Participant</option>
												<option value=''>----------</option>
												<option value='1'>Participant With Paper</option>
												<option value='2'>Participant Without Paper</option>
											";
											}
											else if ($kategori_peserta=='1')
											{
											echo "
												<option value='1'>Participant With Paper</option>
												<option value=''>----------</option>
												<option value='2'>Participant Without Paper</option>
											";
											}
											else if ($kategori_peserta=='2')
											{
											echo "
												<option value='2'>Participant Without Paper</option>
												<option value=''>----------</option>
												<option value='1'>Participant With Paper</option>
											";
											}
											echo "
											</select>
										</td>
									</tr>
									<tr>
										<td align='right'>
												<input type='image' src='../gambar/update.jpg' width='25' title='Update Peserta'>
										</td>
								</form>
								<form action='peserta.php'>
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
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>