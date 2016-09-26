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
		<table border=0 width=100% align="center">	
			<tr>
				<td colspan="8">
					<p align="justify">
						<b><font size="+1">PRESENTATION SCHEDULE</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>
			</tr>
			<?php
				$id_pengguna=$_SESSION['id_pengguna'];
				$sql = "select * from cms_jadwal,cms_paper,cms_abstrak,cms_bidang_kajian,cms_peserta,cms_pengguna
						where cms_paper.id_paper=cms_jadwal.id_paper
						and cms_abstrak.id_abstrak=cms_paper.id_abstrak
						and cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
						and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
						and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
						and cms_peserta.id_pengguna='$id_pengguna'";
				$res = mysql_query($sql);
				$banyakrecord=mysql_num_rows($res);
				if($banyakrecord>0)
				{
			?>
			<tr bgcolor="#CCCCCC">
				<th>No</th>
				<th>Room</th>
				<th>Presentation Time</th>
				<th>ID Paper</th>
				<th>Title</th>
				<th>Category of Paper</th>
				<th>Presenter</th>
			</tr>
			<?php
				while($select_result = mysql_fetch_array($res))
				{
					$id_jadwal = $select_result['id_jadwal'];
					$ruangan = $select_result['no_ruangan'];
					$awal = $select_result['waktu_awal'];
					$akhir = $select_result['waktu_akhir'];
					$id_paper = $select_result['id_paper'];
					$judul = $select_result['judul'];
					$upjudul = strtoupper($judul);
					$nama_bidang_kajian = $select_result['nama_bidang_kajian'];
					$nama_pengguna = $select_result['nama_pengguna'];
					$ucnama=ucwords($nama_pengguna);
					
					echo"
					<tr>
						<td align='center'>$id_jadwal</td>
						<td align='center'>$ruangan</td>
						<td align='center'>$awal - $akhir</td>
						<td align='center'>$id_paper</td>
						<td>$upjudul</td>
						<td>$nama_bidang_kajian</td>
						<td>$ucnama</td>
					</tr>
					";
				}				
				}
				else
				{
			?>
			<tr>
				<td>
					<div align="right">Committee do not have a schedule for you yet. Please wait</div>
				</td>
			</tr>
			<?php
				}
			?>
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