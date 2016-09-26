<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
		$link=koneksi_db();		
		$id=$_REQUEST['id_penulis'];
		$id_abstrak=$_REQUEST['id_abstrak'];					
				
		
			$query_delete = "delete from cms_penulis
							where id_penulis='$id'";
			$res=mysql_query($query_delete);
			if($res)
			{
				include("../redirectview_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_author.php?id_abstrak=$id_abstrak'>";
			}
			else
			{
				include("../redirectview_gagal_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_author.php?id_abstrak=$id_abstrak'>";
			}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"1"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>