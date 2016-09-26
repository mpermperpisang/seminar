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
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">EDIT AUTHOR</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php		
							$link=koneksi_db();			
							$id=$_SESSION['id_pengguna'];		
							$id_penulis=@$_REQUEST['id_penulis'];
							$id_abstrak=@$_REQUEST['id_abstrak'];
							if (ctype_alnum($id_penulis))
							{		
							$sql = "select * from cms_peserta,cms_penulis,cms_pengguna
									where cms_peserta.id_pengguna='$id'
									and cms_penulis.id_penulis='$id_penulis'
									and cms_penulis.id_abstrak='$id_abstrak'
									and cms_pengguna.id_pengguna=cms_peserta.id_pengguna";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_pengguna = $select_result['id_pengguna'] ;
									$nama_pengguna = ucwords($select_result['nama_pengguna']);
									$nama_penulis = $select_result['nama_penulis'] ;
									$id_penulis = $select_result['id_penulis'] ;
									$id_abstrak = $select_result['id_abstrak'] ;
								}
								echo"
								<form action='update_penulis.php' method='POST'>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
								";
								$id_abstrak=$_REQUEST['id_abstrak'];
							?>
								<input name="id" size="30" type="hidden" value="<?php echo $id_pengguna ; ?>" maxlength="50"/>
								<input  name="id_penulis" type="hidden" size="30" value="<?php echo $id_penulis ; ?>" maxlength="50"/>
								<input  name="id_abstrak" type="hidden" size="30" value="<?php echo $id_abstrak ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td>Name of Participant</td>
										<td>
											$nama_pengguna
										</td>
									</tr>
									<tr>
										<td>Author</td>
										<td>
											<input  name='penulis' size='30' value='$nama_penulis' maxlength='150'/>
										</td>
									</tr>
									<tr>
										<td align='right'>
												<input type='image' src='../gambar/update.jpg' width='25' title='Edit Author'>
										</td>
								</form>
								<form method='post' action='add_author.php?id_abstrak=$id_abstrak'>
										<td align='left'>
											<input type='hidden' name='id' size='30' value='$id' maxlength='50'/>
											<input type='hidden' name='id_abstrak' size='30' value='$id_abstrak' maxlength='50'/>
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
	  ($_SESSION['aktif']<>"1"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>