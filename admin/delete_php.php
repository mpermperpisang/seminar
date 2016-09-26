<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();
		$link_file=$_REQUEST['link'];
		
		function HapusFile($namafile) 
		{ 
			$berhasil = false; 
			if (file_exists($namafile)) 
			{ 
				unlink 
				($namafile); 
				$berhasil = true; 
			} 
			return $berhasil; 
		} 
		$namafile="../".$link_file.".php"; 
		if(HapusFile($namafile)) 
		{     
			$query_delete = "delete from cms_riwayat_menu where link_menu='$link_file'";
			$res=mysql_query($query_delete);
			if($res)
			{
				include("../redirectview_delete_file.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=php_file.php'>";
			}
			else
			{
				include("../redirectview_gagal_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=php_file.php'>";
			}
		} 
		else 
		{     
			include("../redirectview_gagal_delete.php");
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=php_file.php'>";
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