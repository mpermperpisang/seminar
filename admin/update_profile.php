<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
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
			$query_update = "update cms_admin set 
							level_admin='$tipe'
							where id_pengguna='$id'";
			$update = mysql_query($query_update);
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
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>