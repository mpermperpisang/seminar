<?php
	include('../include/library.php');
	$link=koneksi_db();	
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
	<?php	
		$id=@$_REQUEST['id_pengguna'];	
		$id_paper=@$_REQUEST['id_paper'];
		if (($id>0) && (ctype_alnum($id)))
		{		
		$sql = "select * from cms_header";
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
			$tempat=$select_result['tempat_acara'];
			$uptempat=strtoupper($tempat);
		}
		$sql2 = "select * from cms_pengguna,cms_peserta,cms_abstrak,cms_paper
				where cms_pengguna.id_pengguna=cms_peserta.id_pengguna
				and cms_peserta.id_pengguna='$id'
				and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
				and cms_paper.id_abstrak=cms_abstrak.id_abstrak
				and cms_paper.id_paper='$id_paper'";
		$res2 = mysql_query($sql2);
		while($select_result2 = mysql_fetch_array($res2))
		{
			$nama_pengguna=$select_result2['nama_pengguna'];
			$ucnama=ucwords($nama_pengguna);
			$jabatan=$select_result2['jabatan'];
			$institusi=$select_result2['institusi'];
			$telp=$select_result2['telp'];
			$email=$select_result2['email'];
			$judul=$select_result2['judul'];
			$upjudul=strtoupper($judul);
		}
		$sql = "select * from cms_header,cms_tahun
				where cms_header.id_tahun=cms_tahun.id_tahun";
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
			$tempat=$select_result['tempat_acara'];
			$uptempat=strtoupper($tempat);
			$acara=$select_result['nama_acara'];
			$upacara=strtoupper($acara);
			$tahun=$select_result['bil_tahun'];
		}
	?>
	<table width=100% align="left">
		<tr>
			<td><input type="image" src="../gambar/print.jpg" width="25" onClick="print()"></td>
		</tr>
	</table>
	<br><br><br><br>
	<table width=700 align="center" border="0">
		<tr>
			<td align="center" colspan="3"><b>SURAT PERNYATAAN KEASLIAN PAPER</b></td>
		</tr>
		<tr>
			<td align="center" colspan="3"><font size="-2"><?php echo "$upacara $tahun"; ?></font></td>
		</tr>
		<tr>
			<td align="center" colspan="3"><font size="-2"><?php echo "$uptempat"; ?></font></td>
		</tr>
		<tr>
			<td align="center" colspan="3">
			<font size="-2">Bandung, 
				<?php 
					$tgl=date('d'); 
					$bln=date('m'); 
					$tahun=date('Y');
					
					if ($bln=='01')
					{
						$ket='Januari';
					}
					else if ($bln=='02')
					{
						$ket='Februari';
					}
					else if ($bln=='03')
					{
						$ket='Maret';
					}
					else if ($bln=='04')
					{
						$ket='April';
					}
					else if ($bln=='05')
					{
						$ket='Mei';
					}
					else if ($bln=='06')
					{
						$ket='Juni';
					}
					else if ($bln=='07')
					{
						$ket='Juli';
					}
					else if ($bln=='08')
					{
						$ket='Agustus';
					}
					else if ($bln=='09')
					{
						$ket='September';
					}
					else if ($bln=='10')
					{
						$ket='Oktober';
					}
					else if ($bln=='11')
					{
						$ket='November';
					}
					else if ($bln=='12')
					{
						$ket='Desember';
					}
					
					echo $tgl." ".$ket." ".$tahun; 
				?>
			</font>
			</td>
		</tr>
		<tr>
			<td height="25"></td>
		</tr>
		<tr>
			<td align="left" colspan="3">Saya, yang mengisi formulir di bawah ini :</td>
		</tr>
		<tr>
			<td align="left" colspan="3"></td>
		</tr>
		<tr>
			<td align="left" width=15%>Nama</td>
			<td align="center">:</td>
			<td align="left"><?php echo "$ucnama"; ?></td>
		</tr>
		<tr>
			<td align="left" width=15%>Email</td>
			<td align="center">:</td>
			<td align="left"><?php echo "$email"; ?></td>
		</tr>
		<tr>
			<td align="left" width=15%>Jabatan</td>
			<td align="center">:</td>
			<td align="left"><?php echo "$jabatan"; ?></td>
		</tr>
		<tr>
			<td align="left" width=15%>Institusi</td>
			<td align="center">:</td>
			<td align="left"><?php echo "$institusi"; ?></td>
		</tr>
		<tr>
			<td align="left" width=15%>No Telp</td>
			<td align="center">:</td>
			<td align="left"><?php echo "$telp"; ?></td>
		</tr>
		<tr>
			<td align="left" width=15%>Judul Paper</td>
			<td align="center">:</td>
			<td align="left"><?php echo "$upjudul"; ?></td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td align="left" colspan="3"><b>Pernyataan Keaslian Makalah</b></td>
		</tr>
		<tr>
			<td align="left" colspan="3">Dengan ini Saya menyatakan bahwa</td>
		</tr>
		<tr>
			<td align="right" valign="top">1.</td>
			<td align="left" colspan="2">Paper dengan rincian di atas benar adalah asli dibuat oleh saya dan penulis yang telah saya sertakan</td>
		</tr>
		<tr>
			<td align="right" valign="top">2.</td>
			<td align="left" colspan="2">Dalam paper dengan rincian di atas tidak terdapat karya atau pendapat orang lain, kecuali yang Saya cantumkan dengan jelas sebagai acuan dalam paper dengan nama pengarang dan disebutkan dalam bagian daftar pustaka</td>
		</tr>
		<tr>
			<td align="right" valign="top">3.</td>
			<td align="left" colspan="2">Menyerahkan hak publikasi paper ini dalam berbagai bentuk kepada panitia</td>
		</tr>
		<tr>
			<td align="left" colspan="3">Catatan :</td>
		</tr>
		<tr>
			<td align="left" colspan="3">Lama presentasi untuk setiap makalah adalah 15 menit</td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td align="left" colspan="3"><b>Nama Pemakalah dalam Sertifikat</b></td>
		</tr>
		<tr>
			<td align="left">Penulis</td>
			<td colspan="3">
			<?php
			echo "$ucnama";
			$sqla = "select * from cms_abstrak,cms_penulis,cms_paper
					where cms_abstrak.id_abstrak=cms_penulis.id_abstrak
					and cms_abstrak.id_abstrak=cms_paper.id_abstrak
					and cms_paper.id_paper='$id_paper'";
			$resa = mysql_query($sqla);
			$banyakrecord=mysql_num_rows($resa);
			if($banyakrecord>0)
			{
				while($select_resulta = mysql_fetch_array($resa))
				{
					$nama_pengguna=$select_resulta['nama_pengguna'];
					$nama_penulis=$select_resulta['nama_penulis'];
					$ucpenulis=ucwords($nama_penulis);
					
					echo ", $ucpenulis";
				}
			}
			?>
			</td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td colspan="3">
				Bandung, 
				<?php 
					$tgl=date('d'); 
					$bln=date('m'); 
					$tahun=date('Y');
					
					if ($bln=='01')
					{
						$ket='Januari';
					}
					else if ($bln=='02')
					{
						$ket='Februari';
					}
					else if ($bln=='03')
					{
						$ket='Maret';
					}
					else if ($bln=='04')
					{
						$ket='April';
					}
					else if ($bln=='05')
					{
						$ket='Mei';
					}
					else if ($bln=='06')
					{
						$ket='Juni';
					}
					else if ($bln=='07')
					{
						$ket='Juli';
					}
					else if ($bln=='08')
					{
						$ket='Agustus';
					}
					else if ($bln=='09')
					{
						$ket='September';
					}
					else if ($bln=='10')
					{
						$ket='Oktober';
					}
					else if ($bln=='11')
					{
						$ket='November';
					}
					else if ($bln=='12')
					{
						$ket='Desember';
					}
					
					echo $tgl." ".$ket." ".$tahun; 
				?>
			</td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td align="left" colspan="2" width="450">
			<?php
				$sql = "select ttd from cms_peserta
						where id_pengguna='$id'";
				$res = mysql_query($sql);
				$banyakrecord=mysql_num_rows($res);
				if($banyakrecord>0)
				{
					while($select_result = mysql_fetch_array($res))
					{
						$nama_file=$select_result['ttd'];
						
						if (($nama_file<>' ') && ($nama_file<>NULL))
						{
						echo "<img src='../ttd/$nama_file' width=125>";
						}
						else
						{
						echo "There is no signature yet";
						}
					}
				}
				else
				{
					echo "There is no signature yet";
				}
				?>
			</td>
		</tr>
		<tr>
			<td align="left" colspan="3">(<?php echo "$ucnama"; ?>)</td>
		</tr>
	</table>
	<?php
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