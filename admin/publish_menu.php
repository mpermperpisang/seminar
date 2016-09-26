<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();		
		$id_pengguna=$_SESSION['id_pengguna'];
		$id=$_REQUEST['id_menu'];	
		$tgl = date("Y-n-d");
		
				$query_insert = "update cms_menu set
								kode_aktif='1',
								date='$tgl',
								id_pengguna='$id_pengguna'
								where id_menu='$id'";
										
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=menu_list.php'>";
				}
				else
				{
					include("../redirectview_gagal.php");
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