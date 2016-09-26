<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>ADMIN PAGE</title>
    </head>
    <body>
    <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../js/js_form_account.js"></script>
		<?php include ('../header.php'); ?>
		<?php include ('menu.php'); ?>
		<table border=0 width=75% align="center">	
			<tr>
				<td>
							<p align="justify">
								<b><font size="+1">ACCOUNT</font></b>
								<br>
								<img src="../gambar/line.jpg" width=100% height="3">
								<br>						
								<img src="../gambar/line_2.jpg" width=100% height="5">
							<?php			
							$link=koneksi_db();			
							$id=$_SESSION['id_pengguna'];
							$sql = "select * from cms_pengguna where id_pengguna='$id'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>=0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_pengguna'] ;
									$username=$select_result['username'] ;
									$password=$select_result['pw'];
									$email=$select_result['email'] ;
								}
							?>
										
								<form action="update_account.php" method="post" name="form_reg"><font size="-2">*do not use space or weird character</font>
									<table border="0" width="50%" cellpadding="2" cellspacing="2" align="center" bgcolor="#FFFFF">
										<tr>
											<td colspan="2"><div class="tampil_info"></div></td>
										</tr>
      									<tr>
        									<td>Username*</td>
        									<td>
												<input name="username" type="text" value="<?php echo $username ?>" class="input_username" size="30" maxlength="20" required/>
											</td>
										</tr>
      									<tr>
        									<td>Password</td>
        									<td>
												<input name="password" type="password" value="<?php echo $password ?>" class="input_password"  size="30" maxlength="50" required/>
											</td>
										</tr>
      									<tr>
        									<td>Retype Password</td>
        									<td>
												<input name="repassword" type="password" value="<?php echo $password ?>" class="input_repassword"  size="30" maxlength="50" required/>
											</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>
												<input name="email" type="text" value="<?php echo $email ?>" class="input_email" size="30" maxlength="50" required/>
        									</td>
      									</tr>
      									<tr>
        									<td align="right">
												<input type='image' src='../gambar/update.jpg' width='25' name='kirim' title='Update Account' onClick="return aksi_daftar();">
											</td>
									</form>
									<form action='index.php'>
											<td align='left'>
												<input type='image' src='../gambar/cancel.jpg' width='25' name='cancel' title='Cancel'>
											</td>
									</form>
      									</tr>
									</table>
							<?php
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