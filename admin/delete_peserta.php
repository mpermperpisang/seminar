<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();		
		$id=$_REQUEST['id'];					
				
		if (is_numeric($id))
		{
			$query_delete = "delete from cms_peserta
							where id_pengguna='$id'";
			$res=mysql_query($query_delete);
			$query_delete = "delete from cms_pengguna
							where id_pengguna='$id'";
			$res=mysql_query($query_delete);
			if($res)
			{
				include("../redirectview_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=peserta.php'>";
			}
			else
			{
				include("../redirectview_gagal_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=peserta.php'>";
			}
		}
		else
		{
				include("../redirectview_gagal_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=peserta.php'>";
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