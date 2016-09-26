<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();	
		$id_pengguna = $_POST['id'];
		$id_bidang = $_POST['id_bidang'];
		$bidang = $_POST['bidang'];
		
				$query_insert = "update reviewer_bidang_kajian set 
					id_bidang_kajian = '$bidang',
					id_pengguna = '$id_pengguna'
					where id_pengguna='$id_pengguna' and id_bidang_kajian='$id_bidang'";
					
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=bidang_kajian.php?id_pengguna=$id_pengguna'>";
				}
				else
				{
					include("../redirectview_gagal.php");
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