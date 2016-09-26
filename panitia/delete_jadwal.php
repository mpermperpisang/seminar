<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();		
		@$id=$_REQUEST['id'];	
		if (is_numeric($id))
		{
			$sql = "select * from cms_jadwal where id_jadwal='$id'";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{
				$id_paper=$select_result['id_paper'];
			}
			$query = "update cms_paper set
					kode_aktif='1'
					where id_paper='$id_paper'";
			$res=mysql_query($query);	
			
			$query_delete = "delete from cms_jadwal
							where id_jadwal='$id'";
			$res=mysql_query($query_delete);
			if($res)
			{
				include("../redirectview_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=jadwal.php'>";
			}
			else
			{
				include("../redirectview_gagal_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=jadwal.php'>";
			}
		}
		else
		{
				include("../redirectview_gagal_delete.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=jadwal.php'>";
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