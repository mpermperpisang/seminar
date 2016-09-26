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
						<b><font size="+1">EDIT USER</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$id=$_REQUEST['id'];
							if (($id>0) && (ctype_alnum($id)))
							{
							$sql = "select * from cms_pengguna";
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
									$email=$select_result['email'] ;
								}
								echo"
								<form action='update_masalah.php' method='POST'>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"left\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id" size="30" value="<?php echo $id ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>Username</td>
										<td>$username</td>
									</tr>
									<tr>
										<td>Password</td>
										<td>$password</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>$email</td>
									</tr>
									<tr>
										<td align='right'>
												<input type='image' src='../gambar/publish.jpg' width='25' title='Already Sent an Email'>
										</td>
								</form
								<form action='masalah.php'>
										<td align='left'>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='kirim' title='Back'>
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