<?php
	include('../include/library.php');
	$link=koneksi_db();	
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
	<?php	
		$id=$_SESSION['id_pengguna'];	
		$id_paper=@$_REQUEST['id_paper'];
		$sql = "select * from cms_paper";
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
			$id_paper=$select_result['id_paper'];
			$kode= substr($id_paper,-4);
		}
		$sql = "select * from cms_header";
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
			$akronim=$select_result['akronim'];
		}
		$sql = "select * from cms_bulan where kode_aktif='1'";
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
			$bulan=$select_result['nama_bulan'];
		}
		$sql = "select * from cms_tahun where kode_aktif='1'";
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
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
			<td align="center" colspan="3"><b><u>SURAT KETERANGAN</u></b></td>
		</tr>
		<tr>
			<td align="center" colspan="3">No : <?php echo $kode ?>/<?php echo $akronim ?>/UNIKOM/<?php echo $bulan ?>/<?php echo $tahun ?></td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td align="left" colspan="3">Yang bertanda tangan di bawah ini</td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<?php
				$sql = "select * from cms_panitia,cms_pengguna
						where cms_panitia.id_pengguna=cms_pengguna.id_pengguna
						and cms_panitia.kategori_panitia=1";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{
					$nama=$select_result['nama_pengguna'];
					$ucnama_ketua=ucwords($nama);
					$kategori_panitia=$select_result['kategori_panitia'];
					$nik=$select_result['nik'];
					
					if ($kategori_panitia=='1')
					{
						$ket_anggota='Ketua Panitia';
					}
					else
					{
						$ket_anggota='Anggota Panitia';
					}
				}					
			?>
			<td><?php echo "$ucnama_ketua"; ?></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<?php
				$sql = "select * from cms_tahun
						where kode_aktif='1'";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{
					$bil=$select_result['bil_tahun'];
				}
				$sql = "select * from cms_header";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{
					$acara=$select_result['nama_acara'];
				}					
			?>
			<td><?php echo "$ket_anggota $acara $bil"; ?></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td>:</td>
			<td><?php echo "$nik"; ?></td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td colspan="3">Menerangkan bahwa</td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td>ID Paper</td>
			<td>:</td>
			<?php
				$id_paper=$_REQUEST['id_paper'];
				$sql = "select * from cms_paper,cms_abstrak,cms_peserta,cms_pengguna
						where cms_paper.id_abstrak=cms_abstrak.id_abstrak
						and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
						and cms_peserta.id_pengguna=cms_pengguna.id_pengguna
						and id_paper='$id_paper'";
				$res = mysql_query($sql);
				$banyakrecord=mysql_num_rows($res);
				if($banyakrecord>0)
				{
					while($select_result = mysql_fetch_array($res))
					{
						$kode_paper=$select_result['id_paper'];
						$judul=$select_result['judul'];
						$upjudul=strtoupper($judul);
						$nama_pengguna=$select_result['nama_pengguna'];
						$ucnama=ucwords($nama_pengguna);
						$institusi=$select_result['institusi'];
						$ucinstitusi=strtoupper($institusi);
						$id_pengguna=$select_result['id_pengguna'];
					}	
				}
				else
				{
					$kode_paper='';
					$upjudul='';
					$nama_pengguna='';
					$ucnama='';
					$institusi='';
					$ucinstitusi='';
					$id_pengguna='';
				}			
			?>
			<td><?php echo "$kode_paper"; ?></td>
		</tr>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td><?php echo "$upjudul"; ?></td>
		</tr>
		<tr>
			<td>Penulis</td>
			<td>:</td>
			<td>
			<?php echo "$ucnama"; 
				$sql = "select * from cms_abstrak,cms_penulis,cms_paper
					where cms_abstrak.id_abstrak=cms_penulis.id_abstrak
					and cms_abstrak.id_abstrak=cms_paper.id_abstrak
					and cms_paper.id_paper='$id_paper'";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{
					$nama_penulis=$select_result['nama_penulis'];
					$ucnama_penulis=ucwords($nama_penulis);

					echo ", $ucnama_penulis";
				}				
			?>
			</td>
		</tr>
		<tr>
			<td>No. Pendaftaran</td>
			<td>:</td>
			<td>
			<?php
				echo "$id_pengguna";			
			?>
			</td>
		</tr>
		<tr>
			<td>Nama Pemakalah</td>
			<td>:</td>
			<td><?php echo "$ucnama"; ?></td>
		</tr>
		<tr>
			<td>Institusi</td>
			<td>:</td>
			<td><?php echo "$ucinstitusi"; ?></td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td colspan="3">adalah pemakalah dengan status <b>diterima</b>, pada :</td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td>Acara</td>
			<td>:</td>
			<td>
			<?php
				$sql = "select * from cms_header,cms_tahun
						where cms_header.id_tahun=cms_tahun.id_tahun";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{
					$nama_acara=$select_result['nama_acara'];
					$tahun=$select_result['bil_tahun'];
					$tempat=$select_result['tempat_acara'];
					$uptempat=strtoupper($tempat);
				}	
				echo "$nama_acara $tahun";			
			?>
			</td>
		</tr>
		<tr>
			<td>Penyelenggara</td>
			<td>:</td>
			<td>
			<?php
				echo "$uptempat";			
			?>
			</td>
		</tr>
		<tr>
			<td>Waktu Pelaksanaan</td>
			<td>:</td>
			<td>
			<?php
				$sql = "select * from cms_tahun
						where kode_aktif='1'";
				$res = mysql_query($sql);
					while($select_result = mysql_fetch_array($res))
					{
						$akhir=$select_result['tgl_akhir'];
					}	
					$tgl= substr($akhir,-2,2);
					$bln= substr($akhir,-5,2);
					$tahun= substr($akhir,-10,4);
					if ($bln=='00')
					{
						$ket='00';
					}
					else if ($bln=='01')
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
					if ($tgl=='00')
					{
						$tgl='00';
					}
					if ($tahun=='00')
					{
						$tahun='0000';
					}
					echo "$tgl $ket $tahun";
			?>
			</td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td colspan="3">Demikian surat keterangan ini dibuat dengan sebenar-benarnya, untuk dapat digunakan sebagaimana mestinya.</td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<td align="left" colspan="3">
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
			<td colspan="3"><?php echo "$ket_anggota $acara $bil"; ?></td>
		</tr>
		<tr>
			<td align="left" colspan="3" height="15"></td>
		</tr>
		<tr>
			<?php
				$sql = "select * from cms_stempel_ttd";
				$res = mysql_query($sql);
				$banyakrecord=mysql_num_rows($res);
				if($banyakrecord>0)
				{
				while($select_result = mysql_fetch_array($res))
				{
					$nama_file=$select_result['nama_file'];
					$tipe_file=$select_result['tipe_file'];
				}			
			?>
			<td align="left" width="200"><?php echo "<img src='../dokumen/$nama_file.$tipe_file' width=125>"; ?></td>
			<?php
				}
				else
				{
			?>
			<td align="center" width="200"><font size="-1">ketua panitia belum mengupload tanda tangan</font></td>
			<?php
				}
			?>
		</tr>
		<tr>
			<td colspan="3" align="left"><?php echo "(<u>$ucnama_ketua</u>)"; ?></td>
		</tr>
		<tr>
			<td align="left"><?php echo "$nik"; ?></td>
		</tr>
	</table>
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