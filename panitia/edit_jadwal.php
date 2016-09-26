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
		<script>
		function confirmSubmit() 
		{
			var msg;
			msg= "Are you sure want to delete this data ?";
			var agree=confirm(msg);
			if (agree)
			return true ;
			else
			return false ;
		}
		</script>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="center">	
			<tr>
				<td colspan="5">
					<p align="justify">
						<b><font size="+1">PRESENTATION SCHEDULE</font></b>
				</td>				
				<td align="right" colspan="4"><br>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<select name="fieldcari">
							<option value="ruangan" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="ruangan") echo "selected";?>>Sequence Room</option>
							<option value="nama_pengguna" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="nama_pengguna") echo "selected";?>>Presenter Name</option>
						</select>
					<input type="text" name="keyword" size=10 value="<?php if (isset($_POST["keyword"])) echo $_POST['keyword'];?>">
					<input type="image" src="../gambar/enter.jpg" width="20" align="absmiddle">
				</form>
				</td>
			</tr>
			<tr>
				<td colspan="10">
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>
			</tr>
			<tr>
				<td colspan="9">
						<?php
							$jadwal=$_REQUEST['id'];	
								$sql = "select * from cms_jadwal,cms_paper,cms_abstrak,cms_bidang_kajian,cms_peserta,cms_pengguna
										where cms_jadwal.id_paper=cms_paper.id_paper
										and cms_jadwal.id_jadwal='$jadwal'
										and cms_paper.id_abstrak=cms_abstrak.id_abstrak
										and cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
										and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
										and cms_peserta.id_pengguna=cms_pengguna.id_pengguna";
								$res = mysql_query($sql);		
									while($select_result = mysql_fetch_array($res))
									{
										$kode_paper=$select_result['id_paper'];;
										$kategori=$select_result['nama_bidang_kajian'];
										$penyaji=$select_result['nama_pengguna'];
										$ucpenyaji=ucwords($penyaji);
										$room=$select_result['ruangan'];
										$awal=$select_result['waktu_awal'];
										$akhir=$select_result['waktu_akhir'];
									}	
						?>
					<table align="center">
						<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<tr>
							<th bgcolor="#CCCCCC">ID Paper</th>
							<td><?php echo $kode_paper ?></td>
						</tr>
						</form>
						<tr>
							<th bgcolor="#CCCCCC">Category</th>
							<td><?php echo $kategori ?></td>
						</tr>
						<tr>
							<th bgcolor="#CCCCCC">Presenter</th>
							<td><?php echo $ucpenyaji ?></td>
						</tr>
						<?php
							echo "<form method=\"POST\" action=\"ubah_jadwal.php?id=$kode_paper\">
								<input type=\"hidden\" value=\"$kode_paper\" name=\"id_paper\">";
						?>
						<tr>
							<th bgcolor="#CCCCCC">Sequence Room</th>
							<td>
							<?php
							echo "
							<select name='ruang' required>";
							echo "<option value='$room'>$kategori</option>";
							echo "<option value=''>----------</option>";
							$res2=mysql_query("SELECT distinct cms_abstrak.id_bidang_kajian FROM cms_bidang_kajian,cms_abstrak,cms_paper
											where cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
											and cms_paper.id_abstrak=cms_abstrak.id_abstrak");
							$k=1;
							while($data=mysql_fetch_array($res2))
							{	
								$resb=mysql_query("SELECT * FROM cms_jadwal,cms_paper,cms_abstrak,cms_peserta,cms_tahun
													where ruangan='$k'
													and cms_jadwal.id_paper=cms_paper.id_paper
													and cms_paper.id_abstrak=cms_abstrak.id_abstrak
													and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
													and cms_tahun.id_tahun=cms_peserta.id_tahun
													and cms_tahun.kode_aktif='1'");
								echo "<option required value='$k'>";
								$resbo=mysql_query("SELECT distinct nama_bidang_kajian FROM cms_jadwal,cms_paper,cms_abstrak,cms_bidang_kajian
													where ruangan='$k'
													and cms_jadwal.id_paper=cms_paper.id_paper
													and cms_paper.id_abstrak=cms_abstrak.id_abstrak
													and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian");
								$banyakrecord=mysql_num_rows($resbo);
								$banyakrecordb=mysql_num_rows($resb);
								if($banyakrecordb>0)
								{
								while($databo=mysql_fetch_array($resbo))
								{
									$nama=$databo['nama_bidang_kajian'];	
									echo "$nama ";
								}
								}
								else
								{	
									echo "$k ";
								}
								echo "($banyakrecordb presenter)</option>";
								$k++;
							}
					echo "
							</select>";
							?>
							</td>
						</tr>
						<tr>
							<th bgcolor="#CCCCCC">Room</th>
							<td>
							<?php
							$jadwal=$_REQUEST['id'];
							$sql = "select no_ruangan from cms_jadwal
									where id_jadwal='$jadwal'";
							$res = mysql_query($sql);
							while($select_result = mysql_fetch_array($res))
							{
								$ruangan=$select_result['no_ruangan'];
							}
							$sql2 = "select count(no_ruangan) as jumlah from cms_jadwal
									where no_ruangan='$ruangan'";
							$res2 = mysql_query($sql2);
							while($select_result2 = mysql_fetch_array($res2))
							{
								$jumlah=$select_result2['jumlah'];
							}
							?><input type="text" name="room" value="<?php echo $ruangan ?>"><br><font size="-1"><?php echo "there are $jumlah presenter in this room"; ?></font>
							</td>
						</tr>
						<tr>
							<th bgcolor="#CCCCCC">Sequence Presentation</th>
							<td><input type="text" name="waktu_awal" size="5" value="<?php echo $awal ?>" maxlength="5"> -
							<input type="text" name="waktu_akhir" size="5" value="<?php echo $akhir ?>" maxlength="5"></td>
						</tr>
						<tr>
							<td align="right">
								<input type='image' title='Add Schedule' src='../gambar/edit.png' width='25'>
							</td>
							</form>
							<form action="jadwal.php">
							<td align="left">
								<input type='image' title='Cancel' src='../gambar/cancel.jpg' width='25'>
							</td>
							</form>
						</tr>
					</table>
					<?php					
					if(isset($_POST['nomorruang']))
					{
						$nomorruang=$_POST['nomorruang'];
						$res3=mysql_query("SELECT no_ruangan,nama_bidang_kajian from cms_jadwal,cms_paper,cms_abstrak,cms_bidang_kajian 
											where ruangan='$nomorruang'
											and cms_jadwal.id_paper=cms_paper.id_paper
											and cms_paper.id_abstrak=cms_abstrak.id_abstrak
											and cns_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian");
							$banyakrecord=mysql_num_rows($res3);
							if($banyakrecord>0)
							{
						while($data2=mysql_fetch_array($res3))
						{	
							$no_ruangan=$data2['no_ruangan'];
							$nama=$data2['nama_bidang_kajian'];
						}
						$ruangan=$nama;
						$id_ruangan=$nomorruang;
						}
						else
						{
						$ruangan='Chose Sequence Room';
						$id_ruangan='';
						$no_ruangan='';
						}
					}
					else
					{
						$ruangan='Chose Sequence Room';
						$id_ruangan='';
						$no_ruangan='';
					}
					?>
				</td>
			</tr>
			<tr>
				<td colspan="5">
		<?php		
				$sql = "select * from cms_jadwal,cms_paper,cms_abstrak,cms_peserta,cms_pengguna,cms_tahun
						where cms_jadwal.id_paper=cms_paper.id_paper
						and cms_paper.id_abstrak=cms_abstrak.id_abstrak
						and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
						and cms_pengguna.id_pengguna=cms_peserta.id_pengguna
						and cms_tahun.id_tahun=cms_peserta.id_tahun
						and cms_tahun.kode_aktif='1'";
				if(isset($_POST['keyword']))
				{
					$fieldcari=$_POST['fieldcari'];
					$keyword=$_POST['keyword'];
					$sql=$sql." and $fieldcari like '%$keyword%'";
				}
				$res = mysql_query($sql);
				$banyakrecord=mysql_num_rows($res);
				if ($banyakrecord>0)
				{
		?>
					<a href="../download_jadwal.php"><img src="../gambar/print.jpg" width="25" title="Print Schedule"></a>
				</td>
				<td colspan="8">
					<div align="right">There are <b><?php echo $banyakrecord;?></b> data of schedule</div>
				</td>
			</tr>
			<tr bgcolor="#CCCCCC">
				<th>No</th>
				<th>Room</th>
				<th>Time</th>
				<th>ID Paper</th>
				<th>Title</th>
				<th>Category of Paper</th>
				<th>Presenter</th>
				<th colspan="2">Action</th>
			</tr>
		<?php
				}
				else
				{
		?>
				<td colspan="8">
					<div align="right">Data of schedule not found</div>
				</td>
		<?php
				}
				
				$i=1;
				while($select_result = mysql_fetch_array($res))
				{
					$id_paper=$select_result['id_paper'];
					$id_abstrak=$select_result['id_abstrak'];
					$nama=$select_result['nama_pengguna'];
					$ucnama=ucwords($nama);
					$judul=$select_result['judul'];
					$upjudul=strtoupper($judul);
					$ruangan=$select_result['no_ruangan'];
					$awal=$select_result['waktu_awal'];
					$akhir=$select_result['waktu_akhir'];
						
					$sql2 = "select cms_abstrak.id_bidang_kajian, nama_bidang_kajian from cms_bidang_kajian,cms_abstrak
							where cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
							and cms_abstrak.id_abstrak='$id_abstrak'";
					$res2 = mysql_query($sql2);
					while($select_result2 = mysql_fetch_array($res2))
					{
						$id_bidang=$select_result2['id_bidang_kajian'];
						$nama_bidang=$select_result2['nama_bidang_kajian'];
						
							
						$sqlw = "select * from cms_jadwal
								where cms_jadwal.id_paper='$id_paper'";
						$resw = mysql_query($sqlw);
						while($select_resultw = mysql_fetch_array($resw))
						{
							$id=$select_resultw['id_jadwal'];
							$order_urutan=$select_resultw['ruangan'];
						}
		?>
			<tr>
				<td align="center"><?php echo $i ?></td>
				<td align="center"><?php echo $ruangan ?></td>
				<td align="center" width="150"><?php echo $awal?> - <?php echo $akhir?></td>
				<td align="center"><?php echo $id_paper ?></td>
				<td><?php echo $upjudul ?></td>
				<td><?php echo $nama_bidang ?></td>
				<td><?php echo $ucnama ?></td>
				<?php				
					echo "
					<form method=\"POST\" action=\"edit_jadwal.php?id=$id\">
					<td>
						<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
						<input type='image' title='Edit Schedule' src='../gambar/edit.png' width='25'>
					</td>
					</form>
					<form method=\"POST\" action=\"delete_jadwal.php?id=$id\">
					<td>
						<input type=\"hidden\" value=\"$id\" name=\"id\"><center>
						<input type='image' title='Delete Schedule' src='../gambar/delete.png' width='25' onclick='return confirmSubmit()'>
					</td>
					</form>";
				?>
			</tr>
			<?php
					}
				$i++;
				}
			?>
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