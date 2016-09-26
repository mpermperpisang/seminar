<?php
@include('include/library.php');
$link=koneksi_db();	
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Daftar_Panitia_".date("Y-m-d").".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<h2>Daftar Panitia</h2>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <th width="25">No</th>
      <th>ID Panitia</th>
      <th>Username</th>
      <th>Email</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>No Telp</th>
      <th>Tipe Panitia</th>
      <th>Status Akun</th>
    </tr>
	<?php
		$sql="select * from cms_pengguna,cms_panitia
				where cms_pengguna.id_pengguna=cms_panitia.id_pengguna";
		$res = mysql_query($sql);
		$i=1;
		while($select_result = mysql_fetch_array($res))
		{
			$id_pengguna=$select_result['id_pengguna'];
			$username=$select_result['username'];
			$email=$select_result['email'];
			$id_kategori=$select_result['kategori_pengguna'];
			$level=$select_result['kategori_panitia'];
			$nama=$select_result['nama_pengguna'];
			$jenis_kelamin=$select_result['jenis_kelamin'];
			$telp=$select_result['telp'];
			
			if ($id_kategori=='3')
			{
				$ket='Active';
			}
			else if ($id_kategori=='6')
			{
				$ket='Nonactive';
			}
			
			if ($level=='1')
			{
				$nama_level='Chairman';
			}
			else if ($level=='2')
			{
				$nama_level='Member';
			}
			
			echo "
				<tr>
					<th width='25'>$i</th>
					<th>$id_pengguna</th>
					<td>$username</td>
					<td>$email</td>
					<td>$nama</td>
					<td>$jenis_kelamin</td>
					<td>$telp</td>
					<td>$nama_level</td>
					<th>$ket</th>
				</tr>";
			$i++;
		}
	?>
  </tbody>
</table>