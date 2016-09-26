<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="4"))
	{
		$link=koneksi_db();		
		@$id=$_REQUEST['id_bidang'];	
		
		if (is_numeric($id))
		{
				$query_insert = "delete from reviewer_bidang_kajian
								where id_reviewer_bidang_kajian='$id'";
										
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_delete.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=bidang_kajian.php'>";
				}
				else
				{
					include("../redirectview_gagal_delete.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=bidang_kajian.php'>";
				}
		}
		else
		{
					include("../redirectview_gagal_delete.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=bidang_kajian.php'>";
		}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"4"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>