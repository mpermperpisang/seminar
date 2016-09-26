<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();		
		$id_bulan=$_REQUEST['id_bulan'];
		$id_pengguna=$_SESSION['id_pengguna'];
					$query_insert = "update cms_bulan set
									kode_aktif = '1',
									id_pengguna = '$id_pengguna'
									where id_bulan='$id_bulan'";
					$res=mysql_query($query_insert);
					
					$query_insert2 = "update cms_bulan set
									kode_aktif = '0'
									where id_bulan not in ('$id_bulan')";
					$res2=mysql_query($query_insert2);
										
				if($res)
				{
					include("../redirectview_update.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=year.php'>";
				}
				else
				{
					include("../redirectview_gagal.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=year.php'>";
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