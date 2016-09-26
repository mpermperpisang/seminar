<?php
@include('include/library.php');
$link=koneksi_db();	
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Daftar_Jadwal_Presentasi_".date("Y-m-d").".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<h2>Daftar Jadwal Presentasi</h2>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <th width="30">NO</th>
      <th width="100">RUANGAN</th>
      <th>WAKTU PRESENTASI</th>
      <th>ID PAPER</th>
      <th>JUDUL</th>
      <th>KATEGORI PAPER</th>
      <th>PENYAJI</th>
    </tr>
	<?php
		$sql = "select * from cms_jadwal,cms_paper,cms_abstrak,cms_bidang_kajian,cms_peserta,cms_pengguna,cms_tahun
				where cms_jadwal.id_paper=cms_paper.id_paper
				and cms_paper.id_abstrak=cms_abstrak.id_abstrak
				and cms_bidang_kajian.id_bidang_kajian=cms_abstrak.id_bidang_kajian
				and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
				and cms_pengguna.id_pengguna=cms_peserta.id_pengguna
				and cms_peserta.id_tahun=cms_tahun.id_tahun
				and cms_tahun.kode_aktif='1'
				order by cms_jadwal.ruangan";
		$res = mysql_query($sql);
		$i=1;
		while($select_result = mysql_fetch_array($res))
		{
			$ruangan=$select_result['no_ruangan'];
			$id_paper=$select_result['id_paper'];
			$judul=$select_result['judul'];
			$upjudul=strtoupper($judul);
			$id_bidang=$select_result['id_bidang_kajian'];
			$nama_bidang=$select_result['nama_bidang_kajian'];
			$nama_pengguna=$select_result['nama_pengguna'];
			$ucnama_pengguna=ucwords($nama_pengguna);
			$awal=$select_result['waktu_awal'];
			$akhir=$select_result['waktu_akhir'];
			
			echo "
				<tr>
					<td width='30' align='center'>$i</td>
					<td align='center'>$ruangan</td>
					<td align='center'>$awal - $akhir</td>
					<td align='center'>$id_paper</td>
					<td>$upjudul</td>
					<td>$nama_bidang</td>
					<td>$ucnama_pengguna</td>
				</tr>";
			$i++;
		}
	?>
  </tbody>
</table>