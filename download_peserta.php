<?php
@include('include/library.php');
$link=koneksi_db();	
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Daftar_Pemakalah_".date("Y-m-d").".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<h2>Daftar Pemakalah</h2>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <th width="30">NO</th>
      <th>KODE PAPER</th>
      <th>KATEGORI</th>
      <th>JUDUL</th>
      <th>PEMAKALAH</th>
      <th>PENULIS</th>
      <th>KEHADIRAN</th>
      <th>PRESENTASI</th>
      <th>PENYAJI</th>
    </tr>
	<?php
		$sql="select * from cms_peserta,cms_paper,cms_abstrak,cms_bidang_kajian,cms_pengguna,cms_tahun
				where cms_peserta.kategori_peserta=1
				and cms_abstrak.id_abstrak=cms_paper.id_abstrak
				and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
				and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
				and cms_pengguna.id_pengguna=cms_peserta.id_pengguna
				and cms_tahun.id_tahun=cms_peserta.id_tahun
				and cms_tahun.kode_aktif='1'";
		$res = mysql_query($sql);
		$i=1;
		while($select_result = mysql_fetch_array($res))
		{
			$id_paper=$select_result['id_paper'];
			$hadir=$select_result['hadir_presentasi'];
			$nama_bidang_kajian=$select_result['nama_bidang_kajian'];
			$judul=$select_result['judul'];
			$upjudul=strtoupper($judul);
			$nama=$select_result['nama_pengguna'];
			$ucnama=ucwords($nama);
			
			if ($hadir=='1')
			{
				$ket='Presentasi Lisan';
				$kehadiran=$ucnama;
				$keterangan='Present';
			}
			else if ($hadir=='2')
			{
				$ket='Poster';
				$kehadiran='-';
				$keterangan='Not Present';
			}
			
			echo "
				<tr>
					<th width='30'>$i</th>
					<th>$id_paper</th>
					<th>$nama_bidang_kajian</th>
					<th>$upjudul</th>
					<th>$ucnama</th>
					<th>$ucnama";
			
			$sql2="select * from cms_penulis,cms_abstrak,cms_peserta,cms_tahun,cms_paper
					where cms_penulis.id_abstrak=cms_abstrak.id_abstrak
					and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
					and cms_peserta.id_tahun=cms_tahun.id_tahun
					and cms_tahun.kode_aktif='1'
					and cms_paper.id_abstrak=cms_abstrak.id_abstrak
					and cms_paper.id_paper='$id_paper'";
			$res2 = mysql_query($sql2);
			$banyakrecord2=mysql_num_rows($res2);
			if($banyakrecord2>0)
			{
				while($select_result = mysql_fetch_array($res2))
				{
					$penulis=$select_result['nama_penulis'];
					$ucpenulis=ucwords($penulis);
				
				echo ", $ucpenulis";
				}
			}
				echo "
						</th>
						<th>$keterangan</th>
						<th>$ket</th>
						<th>$kehadiran</th>
					</tr>";
			$i++;
		}
	?>
  </tbody>
</table>