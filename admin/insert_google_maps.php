<?php
	include('../include/library.php');
	$link=koneksi_db();
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$id_pengguna=$_SESSION['id_pengguna'];
		$lat=($_POST['satu']);
		$lon=($_POST['dua']);
		$nama=$_POST['tempat'];
		$alamat=$_POST['alamat'];
		$tipe=$_POST['tipe'];
		
		if (is_numeric($lat) && (is_numeric($lon)))
		{
				$query_insert = "insert into cms_google_maps values ('','$nama','$alamat','$lat','$lon','$tipe','$id_pengguna','0')";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=google_maps.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=google_maps.php'>";
				}
		}
		else
		{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=google_maps.php'>";
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