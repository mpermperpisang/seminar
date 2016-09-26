<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();
		$id_pengguna=$_SESSION['id_pengguna'];
		$id_lokasi=$_POST['id_maps'];
		$lat=$_POST['satu'];
		$lon=$_POST['dua'];
		$nama=$_POST['tempat'];
		$alamat=$_POST['alamat'];
		$tipe=$_POST['tipe'];
		
		
		if (is_numeric($lat) && (is_numeric($lon)))
		{
				$query_insert = "update cms_google_maps set
								nama='$nama',
								alamat='$alamat',
								lat='$lat',
								lon='$lon',
								tipe='$tipe',
								id_pengguna='$id_pengguna'
								where id_google_maps='$id_lokasi'";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=google_maps.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_lokasi.php?id=$id_lokasi'>";
				}
		}
		else
		{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_lokasi.php?id=$id_lokasi'>";
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