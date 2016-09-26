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
				<td colspan="6">
					<p align="justify">
						<b><font size="+1">ADD PRESENTATION ROOM</font></b>
						<?php			
							$link=koneksi_db();	
							$sql = "select * from cms_scan_transfer,cms_peserta,cms_pengguna,cms_tahun
									where cms_scan_transfer.id_pengguna=cms_peserta.id_pengguna
									and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
									and cms_tahun.id_tahun=cms_peserta.id_tahun
									and cms_tahun.kode_aktif='1'";
						?>	
					</p>
				</td>	
			</tr>		
			<tr>
				<td colspan="10">
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>
			</tr>	
					<?php					
					if(isset($_POST['nomorruang']))
					{
						$nomorruang=$_POST['nomorruang'];
						$res3=mysql_query("SELECT no_ruangan,nama_bidang_kajian from cms_jadwal,cms_paper,cms_abstrak,cms_bidang_kajian 
										where ruangan='$nomorruang'
										and cms_jadwal.id_paper=cms_paper.id_paper
										and cms_paper.id_abstrak=cms_abstrak.id_abstrak
										and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian");
							$banyakrecord=mysql_num_rows($res3);
							if($banyakrecord>0)
							{
						while($data2=mysql_fetch_array($res3))
						{	
							$no_ruangan=$data2['no_ruangan'];
							$bidang=$data2['nama_bidang_kajian'];
						}
						$ruangan=$bidang;
						$id_ruangan=$nomorruang;
						}
						else
						{
						$ruangan='Choose Sequence Room';
						$id_ruangan='';
						$no_ruangan='';
						}
					}
					else
					{
						$ruangan='Choose Sequence Room';
						$id_ruangan='';
						$no_ruangan='';
					}
					?>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<tr>
							<th bgcolor="#CCCCCC" width="15%">Sequence Room</th>
							<td>
							<?php
							echo "
							<select name='nomorruang' required onchange='this.form.submit()'>";
							echo "<option value='$id_ruangan'>$ruangan</option>";
							echo "<option value=''>----------</option>";
							$res2=mysql_query("SELECT distinct ruangan,nama_bidang_kajian,no_ruangan from cms_jadwal,cms_paper,cms_abstrak,cms_bidang_kajian
											where cms_paper.id_paper=cms_jadwal.id_paper
											and cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
											and (no_ruangan is null or no_ruangan='')");
							while($data=mysql_fetch_array($res2))
							{	
								$k=$data['ruangan'];
								$nama=$data['nama_bidang_kajian'];
								echo "<option required value='$k'>$nama</option>";
							}
					echo "
							</select>";
							?>
							</td>
						</tr>
					</form>
					<form method="post" action="update_ruangan.php">
						<tr>
							<th bgcolor="#CCCCCC">Room</th>
							<td><input type="text" name="no_ruang" value="<?php echo "$no_ruangan"; ?>"></td>
						</tr>
						<tr>
							<td align="right">
								<input type='image' title='Edit Room' src='../gambar/edit.png' width='25'>
								<?php
							echo "
								<input type=\"hidden\" value=\"$id_ruangan\" name=\"nomorruang\">";
								?>
							</td>
					</form>
					<form method="post" action="jadwal.php">
							<td align="left">
								<input type='image' title='Cancel' src='../gambar/cancel.jpg' width='25'>
							</td>
					</form>
						</tr>
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