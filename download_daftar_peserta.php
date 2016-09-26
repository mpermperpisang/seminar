<?php
@include('include/library.php');
$link=koneksi_db();	
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Daftar_Peserta_".date("Y-m-d").".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<h2>Daftar Peserta</h2>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <th width="30">NO</th>
      <th>ID PESERTA</th>
      <th>NAMA PESERTA</th>
      <th>TIPE PESERTA</th>
      <th>EMAIL</th>
      <th>NO TELP</th>
      <th>INSTITUSI</th>
      <th>POSISI DI INSTITUSI</th>
    </tr>
	<?php
		$sql="select * from cms_peserta,cms_pengguna,cms_tahun
				where cms_peserta.id_pengguna=cms_pengguna.id_pengguna
				and cms_peserta.id_tahun=cms_tahun.id_tahun
				and cms_tahun.kode_aktif='1'";
		$res = mysql_query($sql);
		$i=1;
		while($select_result = mysql_fetch_array($res))
		{
			$id_pengguna=$select_result['id_pengguna'];
			$nama_pengguna=$select_result['nama_pengguna'];
			$ucnama_pengguna=ucwords($nama_pengguna);
			$nama_kategori=$select_result['kategori_peserta'];
			$email=$select_result['email'];
			$telp=$select_result['telp'];
			$institusi=$select_result['institusi'];
			$upinstitusi=strtoupper($institusi);
			$jabatan=$select_result['jabatan'];
			
			if ($nama_kategori=='1')
			{
				$ket='Participant With Paper';
			}
			else if ($nama_kategori=='2')
			{
				$ket='Participant Without Paper';
			}
			
			echo "
				<tr>
					<th width='30'>$i</th>
					<th>$id_pengguna</th>
					<th>$ucnama_pengguna</th>
					<th>$ket</th>
					<th>$email</th>
					<th>$telp</th>
					<th>$upinstitusi</th>
					<th>$jabatan</th>
				</tr>";
			$i++;
		}
	?>
  </tbody>
</table>