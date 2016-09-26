<?php
	include('../include/library.php');
	$link=koneksi_db();	
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
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">ABSTRACT</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$id=$_SESSION['id_pengguna'];
							$id_abstrak=@$_REQUEST['id_abstrak'];
							$id_bidang_kajian=@$_REQUEST['id_bidang_kajian'];
							if (ctype_alnum($id_abstrak))
							{		
							$sql = "select * from cms_abstrak,cms_bidang_kajian
							where cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
							and cms_abstrak.id_abstrak='$id_abstrak'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_abstrak = $select_result['id_abstrak'];
									$tgl = $select_result['tgl_upload_abstrak'];
									$judul = $select_result['judul'];
									$upjudul=strtoupper($judul);
									$abstrak = $select_result['abstrak'];
									$ucabstrak=ucfirst($abstrak);
									$bidang_kajian = $select_result['nama_bidang_kajian'];
									$status_penerimaan = $select_result['status_penerimaan_abstrak'];
									$keyword = $select_result['keyword'];
									$uckeyword=strtoupper($keyword);
								}
								echo"
								<form action='update_abstrak.php' method='POST'>
								<table border=\"0\" width=\"75%\" cellpadding=\"5\" cellspacing=\"5\" align=\"left\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id_abstrak" size="30" value="<?php echo $id_abstrak ; ?>" maxlength="50"/>
							<?php
								echo"
									<tr>
										<td width=15%>ID Abstract</td>
										<td>
											$id_abstrak
										</td>
									</tr>
									<tr>
										<td>Title</td>
										<td>
											$upjudul
										</td>
									</tr>
									<tr>
										<td>Content</td>
										<td>
											$ucabstrak
										</td>
									</tr>
									<tr>
										<td>Keyword</td>
										<td>
											$uckeyword
										</td>
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
	  ($_SESSION['aktif']<>"5"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>