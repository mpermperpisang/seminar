<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$author = $_POST['author'];
		$id_abstrak = $_POST['id_abstrak'];
		$id_pengguna = $_SESSION['id_pengguna'];
		
				$query_insert = "insert into cms_penulis (id_penulis,id_abstrak,nama_penulis)
			 	values ('','$id_abstrak','$author');";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_penulis.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_penulis.php'>";
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