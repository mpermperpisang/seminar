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
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">CHOOSE AUTHOR</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php		
							$link=koneksi_db();			
							$id_pengguna=$_SESSION['id_pengguna'];
							$id_abstrak=$_REQUEST['id'];
							$sql = "select * from cms_abstrak
									where cms_abstrak.id_abstrak='$id_abstrak'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_abstrak2 = $select_result['id_abstrak'] ;
								}
								echo"
								<form action='insert_penulis_abstrak.php' method='POST'>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id_abstrak" size="30" value="<?php echo $id_abstrak2 ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>ID Abstrak</td>
										<td>
											$id_abstrak2
										</td>
									</tr>
									<tr>
										<td>Author</td>
										<td>
											<select name='author' required>
												<option value=''>Choose</option>
												<option value=''>----------</option>
								";
												$link=koneksi_db();
												$res=mysql_query("SELECT * FROM cms_penulis where pemakalah='$id_pengguna' order by id_penulis");
												while($data=mysql_fetch_array($res))
												{
													echo "<option required value=\"".$data['id_penulis']."\">".ucwords($data['nama_penulis'])."</option>";
												}
								echo "
											</select>
										</td>
									</tr>
									<tr>
										<td align='right'>
												<input type='image' src='../gambar/add.png' width='25' title='Add Author'>
										</td>
								</form>
								<form action='add_author.php?id=$id_abstrak2'>
										<td align='left'>
											<input type='hidden' name='id_abstrak' size='30' value='$id_abstrak2' maxlength='50'/>
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