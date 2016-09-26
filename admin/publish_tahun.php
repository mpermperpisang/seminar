<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		$link=koneksi_db();		
		$id=$_REQUEST['id'];
					$query_insert = "update cms_tahun set
									kode_aktif = '1'
									where id_tahun='$id'";
					$res=mysql_query($query_insert);
					
					$query_insert2 = "update cms_tahun set
									kode_aktif = '0'
									where id_tahun not in ('$id')";
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