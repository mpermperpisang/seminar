<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>COMMITTEE PAGE</title>
    </head>
    <body onLoad="self.focus();document.form1.author.focus()">	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">ADD AUTHOR</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php		
							$link=koneksi_db();			
							$id_pengguna=$_SESSION['id_pengguna'];
							$sql = "select * from cms_abstrak where id_pengguna='$id_pengguna'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_abstrak = $select_result['id_abstrak'] ;
								}
								echo"
								<form action='insert_author.php' method='POST' name='form1'>
								<table border=\"0\" width=\"30%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
								";
						?>
								<input type="hidden" name="id_abstrak" size="30" value="<?php echo $id_abstrak ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td colspan=3><h5>*Please fill all the author in one by one</h5></td>
									</tr>
									<tr>
										<td>Author*</td>
										<td colspan='2'><input type='text' name='author' size='30' maxlength='150' required></td>
									</tr>
									<tr>
										<td align='right'>
											<input type='image' src='../gambar/add.png' width='25' title='Add Author'>
										</td>
								</form>
								<form method=\"POST\" action=\"add_author.php?id_abstrak=$id_abstrak\">
										<td align='left'>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='cancel' title='Cancel'>
										</td>
								</form>
									</tr>
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