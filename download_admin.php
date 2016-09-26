<?php
@include('include/library.php');
$link=koneksi_db();	
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Daftar_Admin_".date("Y-m-d").".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<h2>Daftar Admin</h2>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <th width="30">NO</th>
      <th>ID ADMIN</th>
      <th>USERNAME</th>
      <th>EMAIL</th>
      <th>NAMA</th>
      <th>JENIS KELAMIN</th>
      <th>NO TELP</th>
      <th>TIPE ADMIN</th>
      <th>STATUS AKUN</th>
    </tr>
	<?php
		$sql="select * from cms_pengguna,cms_admin
			where cms_pengguna.id_pengguna=cms_admin.id_pengguna";
		$res = mysql_query($sql);
		$i=1;
		while($select_result = mysql_fetch_array($res))
		{
			$id_pengguna=$select_result['id_pengguna'];
			$username=$select_result['username'];
			$email=$select_result['email'];
			$nama_level=$select_result['level_admin'];
			$id_kategori=$select_result['kategori_pengguna'];
			$nama=$select_result['nama_pengguna'];
			$ucnama=ucwords($nama);
			$jenis_kelamin=$select_result['jenis_kelamin'];
			$telp=$select_result['telp'];
			
			if ($id_kategori=='2')
			{
				$ket='Active';
			}
			else if ($id_kategori=='6')
			{
				$ket='Nonactive';
			}
			
			if ($nama_level=='1')
			{
				$ket_2='Top Admin';
			}
			else if ($nama_level=='2')
			{
				$ket_2='Regular Admin';
			}
			
			echo "
				<tr>
					<th width='30'>$i</th>
					<th>$id_pengguna</th>
					<td>$username</td>
					<td>$email</td>
					<td>$ucnama</td>
					<td>$jenis_kelamin</td>
					<td>$telp</td>
					<td>$ket_2</td>
					<th>$ket</th>
				</tr>";
			$i++;
		}
	?>
  </tbody>
</table>