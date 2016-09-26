<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();		
		$id_pengguna=$_REQUEST['id'];
		
				$query_insert = "update cms_pengguna set
								kode_masalah='0',
								kategori_pengguna='1'
								where id_pengguna='$id_pengguna'";
										
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=masalah.php'>";
				}
				else
				{
					include("../redirectview_gagal.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=masalah.php'>";
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