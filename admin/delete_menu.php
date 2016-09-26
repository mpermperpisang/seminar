<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();		
		@$id=$_REQUEST['id_menu'];					
				
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
		$query = "select link_file from cms_menu
				where id_menu='$id'";
		$res=mysql_query($query);
		while($select_result = mysql_fetch_array($res))
		{
			@$link_file=$select_result['link_file'];
		}
		@$namafile="../".$link_file.".php"; 
		if(HapusFile($namafile)) 
		{     
			$query_delete = "delete from cms_menu
							where id_menu='$id'";
			$res=mysql_query($query_delete);
			if($res)
			{
				include("../redirectview_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=menu_list.php'>";
			}
			else
			{
				include("../redirectview_gagal_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=menu_list.php'>";
			}
		} 
		else 
		{     
			include("../redirectview_gagal_delete.php");
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=menu_list.php'>";
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