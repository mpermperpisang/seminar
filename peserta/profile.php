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
    <body onLoad="self.focus();document.form1.nama.focus()">	
		<?php include ('../header.php'); ?>
		<?php include ('menu.php'); ?>
		<table border=0 width=75% align="center">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">PROFILE</font></b>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$id=$_SESSION['id_pengguna'];
							$sql = "select * from cms_pengguna,cms_peserta where cms_peserta.id_pengguna='$id'
							and cms_pengguna.id_pengguna=cms_peserta.id_pengguna";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>=0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_pengguna'] ;
									$kategori_peserta = $select_result['kategori_peserta'] ;
									$nama=$select_result['nama_pengguna'] ;
									$ucnama=ucwords($nama);
									$kelamin=$select_result['jenis_kelamin'] ;
									$alamat=$select_result['alamat'] ;
									$telp=$select_result['telp'] ;
									$identitas=$select_result['no_identitas'] ;
									$institusi=$select_result['institusi'] ;
									$ucinstitusi=ucwords($institusi);
									$jabatan=$select_result['jabatan'] ;
									$ucjabatan=ucwords($jabatan);
									$foto=$select_result['foto'];
								}
								echo"
								<form action='update_profile.php' name='form1' enctype='multipart/form-data' method='POST'><font size='-2'>*do not use other character than numeral</font>
								<table border=\"0\" width=\"50%\" cellpadding=\"2\" cellspacing=\"2\" align=\"center\" bgcolor=\"#FFFFF\">
									<tr>
										<td>Full Name</td>
										<td>
											<input type='text' name='nama' size='30' maxlength='100' value='$nama' required/>
										</td>
									</tr>
									<tr>
										<td>Gender</td>
										<td>											
											<select name='kelamin' class='input_date' required>
												<option value='$kelamin' required>$kelamin</option>
												<option value=''>-------</option>
								";
												if ($kelamin=='Female')
												{
												echo"
													<option value='Male' required>Male</option>";
												}
												else if ($kelamin=='Male')
												{	
												echo"												
													<option value='Female' required>Female</option>";
												}
								echo"
											</select>
      									</tr>
										<tr>
											<td>Address</td>
											<td>
												<textarea name='alamat' cols='30' rows='4' required>$alamat</textarea>
											</td>
										</tr>
										<tr>
											<td>Phone Number*</td>
											<td>
												<input type='text' name='hp' size='30' maxlength='12' value='$telp' required/>
											</td>
										</tr>
										<tr>
											<td>Identity Card Number*</td>
											<td>
												<input type='text' name='identitas' size='30' maxlength='50' value='$identitas' required/>
											</td>
										</tr>
										<tr>
											<td>Institution</td>
											<td>
												<input type='text' name='institusi' size='30' maxlength='150' value='$ucinstitusi' required/>
											</td>
										</tr>
										<tr>
											<td>Position in Institution</td>
											<td>
												<input type='text' name='jabatan' size='30' maxlength='50' value='$ucjabatan' required/>
											</td>
										</tr>";
											?>
										<tr>
											<td>Photo</td>
											<td><input type="file" name="foto"></td>
											<?php
									echo "</tr>
										<tr>
											<td>Type Of Participant</td>
											<td>
												<select name='peserta' required>
												";
												if ($kategori_peserta=='')
												{
												echo ";
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
											<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Update Profile'>
										</td>
								</form>";
								
								$id=$_SESSION['id_pengguna'];
								$query="select * from cms_peserta where cms_peserta.id_pengguna='$id'";
								$res_query = mysql_query($query);
								$banyakrecord=mysql_num_rows($res_query);
								if($banyakrecord>0)
								{
								echo "<form action='index.php'>
										<td align='left'>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='cancel' title='Cancel'>
										</td>
								</form>";
								}
								echo	"</tr>
								</table>";
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