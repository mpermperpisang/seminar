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
							$sql = "select * from cms_pengguna,cms_pimpinan 
									where cms_pimpinan.id_pengguna='$id'
									and cms_pengguna.id_pengguna=cms_pimpinan.id_pengguna";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>=0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_pengguna'] ;
									$nama=$select_result['nama_pengguna'] ;
									$kelamin=$select_result['jenis_kelamin'] ;
									$alamat=$select_result['alamat'] ;
									$telp=$select_result['telp'] ;
									$kategori_pimpinan=$select_result['kategori_pimpinan'] ;
								}
								echo"
								<form action='update_profile.php' method='POST'><font size='-2'>*do not use other character than numeral</font>
								<table border=\"0\" width=\"50%\" cellpadding=\"2\" cellspacing=\"2\" align=\"center\" bgcolor=\"#FFFFF\">
									<tr>
										<td>Name</td>
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
											<td>Type of Headship</td>
											<td>
												<select name='tipe' required>
												";
												if ($kategori_pimpinan=='')
												{
												echo "
													<option value=''>Choose</option>
													<option value=''>---------</option>
													<option value='1'>Rector</option>
													<option value='2'>Vice Rector</option>
													<option value='3'>Dean</option>
												";
												}
												else if ($kategori_pimpinan=='1')
												{
												echo "
													<option value='1'>Rector</option>
													<option value=''>---------</option>
													<option value='2'>Vice Rector</option>
													<option value='3'>Dean</option>
												";
												}
												else if ($kategori_pimpinan=='2')
												{
												echo "
													<option value='2'>Vice Rector</option>
													<option value=''>---------</option>
													<option value='1'>Rector</option>
													<option value='3'>Dean</option>
												";
												}
												else if ($kategori_pimpinan=='3')
												{
												echo "
													<option value='3'>Dean</option>
													<option value=''>---------</option>
													<option value='1'>Rector</option>
													<option value='2'>Vice Rector</option>
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
								</form>
								<form action='index.php'>
										<td align='left'>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='cancel' title='Cancel'>
										</td>
								</form>
										</tr>
								</table>
								</form";
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
	  ($_SESSION['aktif']<>"5"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>