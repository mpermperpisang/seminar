<?php
@include('include/library.php');
$link=koneksi_db();	
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Daftar_Reviewer_".date("Y-m-d").".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<h2>Daftar Reviewer</h2>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <th width="30">NO</th>
      <th>ID REVIEWER</th>
      <th>USERNAME</th>
      <th>EMAIL</th>
      <th>NAMA</th>
      <th>JENIS KELAMIN</th>
      <th>NO TELP</th>
      <th>KATEGORI REVIEW</th>
      <th>STATUS AKUN</th>
    </tr>
	<?php
		$sql="select * from cms_reviewer,cms_pengguna
				where cms_reviewer.id_pengguna=cms_pengguna.id_pengguna";
		$res = mysql_query($sql);
		$i=1;
			while($select_result = mysql_fetch_array($res))
			{
			
				$id_pengguna=$select_result['id_pengguna'];
				$username=$select_result['username'];
				$email=$select_result['email'];
				$nama=$select_result['nama_pengguna'];
				$ucnama=ucwords($nama);
				$gender=$select_result['jenis_kelamin'];
				$telp=$select_result['telp'];
				$urutan_pengguna=$select_result['kategori_pengguna'];
				
				if ($urutan_pengguna=='4')
				{
					$ket='Active';
				}
				else if ($urutan_pengguna=='6')
				{
					$ket='Nonactive';
				}
				
				echo "
					<tr>
						<th width='30'>$i</th>
						<th>$id_pengguna</th>
						<th>$username</th>
						<th>$email</th>
						<th>$nama</th>
						<th>$gender</th>
						<th>$telp</th>
						<th>";
			$sql2="select * from cms_reviewer,cms_pengguna,cms_bidang_kajian,reviewer_bidang_kajian
					where cms_reviewer.id_pengguna=cms_pengguna.id_pengguna
					and reviewer_bidang_kajian.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
					and reviewer_bidang_kajian.id_pengguna=cms_reviewer.id_pengguna
					and cms_reviewer.id_pengguna='$id_pengguna'";
			$res2 = mysql_query($sql2);
			$banyakrecord=mysql_num_rows($res2);
			if($banyakrecord>0)
			{
			while($select_result2 = mysql_fetch_array($res2))
			{
				$nama_bidang_kajian=$select_result2['nama_bidang_kajian'];
				
				echo "$nama_bidang_kajian<br>";
			}
			}
			else
			{
				echo "";
			}
				echo "
						</th>
						<th>$ket</th>
					</tr>";
				$i++;
			}
	?>
  </tbody>
</table>