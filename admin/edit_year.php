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
						<b><font size="+1">EDIT YEAR</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$id=$_REQUEST['id'];
							if (($id>0) && (ctype_alnum($id)))
							{
							$sql = "select * from cms_tahun
									where id_tahun='$id'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_tahun = $select_result['id_tahun'] ;
									$bil_tahun = $select_result['bil_tahun'] ;
								}
								echo"
								<form action='update_year.php' method='POST'>
								<table border=\"0\" width=\"25%\" cellpadding=\"5\" cellspacing=\"5\" align=\"left\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id_tahun" size="30" value="<?php echo $id_tahun ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>Year</td>
										<td>
											<input type='text' name='bil_tahun' size='10' maxlength='4' value='$bil_tahun' required/>
										</td>
									</tr>
									<tr>
										<td align='right'>
												<input type='image' src='../gambar/update.jpg' width='25' title='Update Year'>
										</td>
								</form>
								<form action='year.php'>
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