<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
	$link=koneksi_db();
	$id=$_SESSION['id_pengguna'];
	$nama = $_POST['nama'];
	$kelamin = $_POST['kelamin'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['hp'];
	$tipe = $_POST['tipe'];
	
		if(is_numeric($telp))
		{
			$query_update = "update cms_pengguna set 
							nama_pengguna = '$nama',
							jenis_kelamin = '$kelamin',
							alamat = '$alamat',
							telp = '$telp'
							where id_pengguna='$id'";
			$update = mysql_query($query_update);
			$query_update2 = "update cms_pimpinan set 
							kategori_pimpinan='$tipe'
							where id_pengguna='$id'";
			$update = mysql_query($query_update2);
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
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"5"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>