<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
	if($_FILES['foto']['error']==0)
	{	
		$link=koneksi_db();
		$id=$_SESSION['id_pengguna'];
		$nama = $_POST['nama'];
		$kelamin = $_POST['kelamin'];
		$alamat = $_POST['alamat'];
		$telp = $_POST['hp'];
		$peserta = $_POST['peserta'];
		$identitas = $_POST['identitas'];
		$jabatan = $_POST['jabatan'];
		$institusi = $_POST['institusi'];
		$foto=$_FILES['foto']['name'];
        $allowed_ext= array('jpg','jpeg','png');
        $foto_size = $_FILES['foto']['size'];
        $foto_ext= strtolower(end(explode('.', $foto)));
		
		if(is_numeric($telp) && is_numeric($identitas))
		{
			if(in_array($foto_ext, $allowed_ext) === true)
			{
				if($foto_size <= 1048576)
				{	
					$fotobaru = '../foto/'.$id.'.'.$foto_ext;
					if((move_uploaded_file($_FILES['foto']['tmp_name'], $fotobaru)==true))
					{
						$sql = "select * from cms_tahun where kode_aktif='1'";
						$res = mysql_query($sql);
						while($select_result = mysql_fetch_array($res))
						{
							$tahun=$select_result['id_tahun'];
						}
						
						$query_update = "update cms_pengguna set 
										nama_pengguna = '$nama',
										jenis_kelamin = '$kelamin',
										alamat = '$alamat',
										telp = '$telp'
										where id_pengguna='$id'";
						$update = mysql_query($query_update);
								$query_update2 = "update cms_peserta set 
												kategori_peserta='$peserta',
												foto='$id',
												tipe_file='$foto_ext',
												no_identitas='$identitas',
												institusi='$institusi',
												jabatan='$jabatan',
												id_tahun='$tahun'
												where id_pengguna='$id'";
								$update2 = mysql_query($query_update2);
						if($update)
							{
							include("../redirectview_update.php");
							echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
							}
						
						else
							{
							include("../redirectview_gagal.php");
							echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
							}
					}
					else
					{
						include("../redirectview_gagal.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
					}	
				}
				else
				{
					include("../redirectview_file_size.php");  
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
				}
			}
			else
			{
					include("../redirectview_gagal.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
			}	
		}
		else
		{
			include("../redirectview_format_dokumen.php");  
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
		}
	}
	else
	{
		$link=koneksi_db();
		$id=$_SESSION['id_pengguna'];
		$nama = $_POST['nama'];
		$kelamin = $_POST['kelamin'];
		$alamat = $_POST['alamat'];
		$telp = $_POST['hp'];
		$peserta = $_POST['peserta'];
		$identitas = $_POST['identitas'];
		$jabatan = $_POST['jabatan'];
		$institusi = $_POST['institusi'];
		
		if(is_numeric($telp) && is_numeric($identitas))
		{
					$sql = "select * from cms_tahun where kode_aktif='1'";
					$res = mysql_query($sql);
					while($select_result = mysql_fetch_array($res))
					{
						$tahun=$select_result['id_tahun'];
					}
					
					$query_update = "update cms_pengguna set 
									nama_pengguna = '$nama',
									jenis_kelamin = '$kelamin',
									alamat = '$alamat',
									telp = '$telp'
									where id_pengguna='$id'";
					$update = mysql_query($query_update);
						if ($kelamin=='Female')
						{
							$query_update2 = "update cms_peserta set 
											kategori_peserta='$peserta',
											foto='female',
											tipe_file='jpg',
											no_identitas='$identitas',
											institusi='$institusi',
											jabatan='$jabatan',
											id_tahun='$tahun'
											where id_pengguna='$id'";
							$update = mysql_query($query_update2);
						}
						else if ($kelamin=='Male')
						{
							$query_update2 = "update cms_peserta set 
											kategori_peserta='$peserta',
											foto='male',
											tipe_file='jpg',
											no_identitas='$identitas',
											institusi='$institusi',
											jabatan='$jabatan',
											id_tahun='$tahun'
											where id_pengguna='$id'";
							$update = mysql_query($query_update2);
						}
					if($update)
						{
						include("../redirectview_update.php");
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
						}
					
					else
						{
						include("../redirectview_gagal.php");
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
						}
		}
		else
		{
			include("../redirectview_gagal.php");  
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=profile.php'>";
		}
	}
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