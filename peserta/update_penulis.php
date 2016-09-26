<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
		$link=koneksi_db();	
		$id_abstrak = $_POST['id_abstrak'];
		$id_pengguna = $_SESSION['id_pengguna'];
		$penulis = $_POST['penulis'];
		$id_penulis = $_POST['id_penulis'];
		
				$query_insert = "update cms_penulis set
								nama_penulis='$penulis'
								where id_penulis='$id_penulis'";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_author.php?id_abstrak=$id_abstrak'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
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