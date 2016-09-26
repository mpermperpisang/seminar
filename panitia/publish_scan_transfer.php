<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();		
		@$id_scan_transfer=$_REQUEST['id_scan_transfer'];	
		
		if (is_numeric($id_scan_transfer))
		{
				$query_insert = "update cms_scan_transfer set
								status_bayar=2
								where id_scan_transfer='$id_scan_transfer'";
										
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=scan_transfer.php'>";
				}
				else
				{
					include("../redirectview_gagal.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=scan_transfer.php'>";
				}
		}
		else
		{
			include("../redirectview_gagal.php");
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=scan_transfer.php'>";
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