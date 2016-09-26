<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();	
		$id_pengguna=$_SESSION['id_pengguna'];
		$id_paper = $_REQUEST['id_paper'];
		$ruangan = $_POST['ruang'];
		$room = $_POST['room'];
		$awal = $_POST['waktu_awal'];
		$akhir = $_POST['waktu_akhir'];
		
		if (empty($ruangan))
		{		
			include("../redirectview_kosong.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=jadwal.php'>";
		}
		else
		{
			$query_insert = "update cms_jadwal set
							ruangan='$ruangan',
							no_ruangan='$room',
							id_paper='$id_paper',
							waktu_awal='$awal',
							waktu_akhir='$akhir'
							where id_paper='$id_paper'";
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