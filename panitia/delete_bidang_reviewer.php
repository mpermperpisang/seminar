<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();		
		@$id=$_REQUEST['id_bidang'];	
		$id_pengguna=$_POST['id_pengguna'];
		
		if (is_numeric($id))
		{
				$query_insert = "delete from reviewer_bidang_kajian
								where id_reviewer_bidang_kajian='$id'";
										
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_delete.php");
					echo "<input type=\"hidden\" value=\"$id_pengguna\" name=\"id_pengguna\">";
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=bidang_kajian.php?id_pengguna=$id_pengguna'>";
				}
				else
				{
					include("../redirectview_gagal_delete.php");
					echo "<input type=\"hidden\" value=\"$id_pengguna\" name=\"id_pengguna\">";
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=bidang_kajian.php?id_pengguna=$id_pengguna'>";
				}
		}
		else
		{
					include("../redirectview_gagal_delete.php");
					echo "<input type=\"hidden\" value=\"$id_pengguna\" name=\"id_pengguna\">";
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=bidang_kajian.php?id_pengguna=$id_pengguna'>";
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