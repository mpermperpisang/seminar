<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>COMMITTEE PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">EDIT CATEGORY OF PAPER</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$id=@$_REQUEST['id_bidang'];	
							if (($id>0) && (ctype_alnum($id)))
							{
							$sql = "select * from cms_bidang_kajian where id_bidang_kajian='$id'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_bidang = $select_result['id_bidang_kajian'] ;
									$nama_bidang = $select_result['nama_bidang_kajian'] ;
								}
								echo"
								<form action='update_bidang_kajian.php' method='POST'>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"left\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id_bidang" size="30" value="<?php echo $id_bidang ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>Name of Category of Paper</td>
										<td>
											<input type='text' name='nama_bidang' size='30' maxlength='100' value='$nama_bidang' required/>
										</td>
									</tr>
									<tr>
										<td align='right'>
											<input type='image' src='../gambar/update.jpg' width='25' name='cancel' title='Edit Category of Paper'>
										</td>
								</form>
								<form action='kategori.php'>
										<td align='left'>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='cancel' title='Cancel'>
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
	  ($_SESSION['aktif']<>"3"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>