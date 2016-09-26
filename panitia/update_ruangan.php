<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();	
		$id_pengguna=$_SESSION['id_pengguna'];
		$ruangan = $_REQUEST['nomorruang'];
		$no_ruangan = $_REQUEST['no_ruang'];
		
		if (empty($ruangan))
		{		
			include("../redirectview_kosong.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=jadwal.php'>";
		}
		else
		{
			$query_insert = "update cms_jadwal set
							no_ruangan='$no_ruangan'
							where ruangan='$ruangan'";
			$res=mysql_query($query_insert);
			if($res)
			{
				header("Location: jadwal.php");
			}
			else
			{
				include("../redirectview_gagal.php"); 
				header("Location: jadwal.php");
			}
		}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"3"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>