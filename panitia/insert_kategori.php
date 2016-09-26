<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$bidang = $_POST['bidang'];
		
				$query_insert = "insert into cms_bidang_kajian (id_bidang_kajian,nama_bidang_kajian)
			 	values ('','$bidang');";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=kategori.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=kategori.php'>";
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