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
						<b><font size="+1">ABSTRACT REVIEW</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>	
			</tr>
			<tr>
				<td colspan="6">
		<?php		
				$sql = "select * from cms_abstrak,cms_bidang_kajian,cms_peserta,cms_tahun
						where cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
						and cms_abstrak.kode_aktif='0'
						and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
						and cms_tahun.id_tahun=cms_peserta.id_tahun
						and cms_tahun.kode_aktif='1'
						order by id_abstrak";
				$res = mysql_query($sql);
				$banyakrecord=mysql_num_rows($res);
				if ($banyakrecord>0)
				{
		?>
					<div align="right">There are <b><?php echo $banyakrecord;?></b> data of participant with abstract</div>
				</td>
			</tr>
			<tr bgcolor="#CCCCCC">
				<th>ID Abstract</th>
				<th>Title</th>
				<th>Category of Abstract</th>
				<th>Name of Reviewer</th>
			</tr>
		<?php
				}
				else
				{
		?>
					<div align="right">Data of abstract that doesn't has a reviewer not found</div>
		<?php
				}
		?>
			<?php	
				while($select_result = mysql_fetch_array($res))
				{
					$id_abstrak=$select_result['id_abstrak'];
					$judul=$select_result['judul'];
					$upjudul=strtoupper($judul);
					$nama_bidang=$select_result['nama_bidang_kajian'];
					$id_bidang=$select_result['id_bidang_kajian'];
					echo "
					<tr>
						<td align='center'>$id_abstrak</td>
						<td>$upjudul</td>
						<td>$nama_bidang</td>
						<form method='POST' action='update_kode_aktif_abstrak.php'>
						<td align='center'>
							<select name='review' onchange='this.form.submit()' required>";
							echo "<option value=''>Choose Reviewer</option>";
							echo "<option value=''>----------</option>";
							$res2=mysql_query("SELECT * FROM cms_reviewer,cms_pengguna,reviewer_bidang_kajian
												where cms_reviewer.id_pengguna=cms_pengguna.id_pengguna
												and reviewer_bidang_kajian.id_pengguna=cms_reviewer.id_pengguna
												and reviewer_bidang_kajian.id_bidang_kajian='$id_bidang'");
							$banyakrecord=mysql_num_rows($res2);
							if($banyakrecord>0)
							{
								while($data=mysql_fetch_array($res2))
								{	
									$id_pengguna=$data['id_pengguna'];
									$res3=mysql_query("select * from review_abstrak,cms_reviewer,cms_abstrak,cms_peserta,cms_tahun
												where cms_reviewer.id_pengguna=review_abstrak.id_pengguna
												and review_abstrak.id_pengguna='$id_pengguna'
												and review_abstrak.id_abstrak=cms_abstrak.id_abstrak
												and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
												and cms_peserta.id_tahun=cms_tahun.id_tahun
												and cms_tahun.kode_aktif='1'");
									$banyakrecord3=mysql_num_rows($res3);
									echo "<option required value=\"".$data['id_pengguna']."\">".ucwords($data['nama_pengguna'])." ($banyakrecord3)"."</option>";
								}
							}
							else
							{
								echo "<option value=''>No Reviewer Found</option>";
							}
					echo "
							</select>
						</td>
							<input type=\"hidden\" value=\"$id_abstrak\" name=\"id_abstrak\">
						</form>
					</tr>
					";
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