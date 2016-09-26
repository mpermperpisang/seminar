<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$id = $_POST['id'];
		$username = $_POST['username'];
		$pw = $_POST['password'];
		$password = md5(secure_input($_POST['password']));
		$email = $_POST['email'];
		$nama = $_POST['nama'];
		$kelamin = $_POST['kelamin'];
		$alamat = $_POST['alamat'];
		$telp = $_POST['telp'];
		$no_identitas = $_POST['no_identitas'];
		$institusi = $_POST['institusi'];
		$jabatan = $_POST['jabatan'];
		$participant = $_POST['participant'];
		
		if (ctype_alnum($username) && is_numeric($telp) && is_numeric($no_identitas) && preg_match('/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/', $email))
		{
			if ($kelamin=='Male')
			{
				$foto='male';
			}
			else if ($kelamin=='Female')
			{
				$foto='female';
			}
				$query_insert = "update cms_pengguna set 
					username = '$username',
					password = '$password',
					pw = '$pw',
					email = '$email',
					nama_pengguna = '$nama',
					jenis_kelamin = '$kelamin',
					alamat = '$alamat',
					telp = '$telp'
					where id_pengguna='$id'";
					
				$res=mysql_query($query_insert);
				
				$query_insert2 = "update cms_peserta set 
					foto='$foto',
					tipe_file='jpg',
					no_identitas='$no_identitas',
					institusi='$institusi',
					jabatan='$jabatan',
					id_kategori_peserta = $participant
					where id_pengguna='$id'";
					
				$res2=mysql_query($query_insert2);
				if($res)
				{
					include("../redirectview_update.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=peserta.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_peserta.php?id=$id'>";
				}
		}
		else
		{
			include("../redirectview_gagal.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_peserta.php?id=$id'>";
		}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>