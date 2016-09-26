<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();		
		$id=$_REQUEST['id'];
					$query_insert = "update cms_google_maps set
									kode_aktif = '1'
									where id_google_maps='$id'";
					$res=mysql_query($query_insert);
					
					$query_insert2 = "update cms_google_maps set
									kode_aktif = '0'
									where id_google_maps not in ('$id')";
					$res2=mysql_query($query_insert2);
										
				if($res)
				{
					include("../redirectview_update.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=google_maps.php'>";
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