<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	$link=koneksi_db();
	$id_footer=$_REQUEST['id_footer'];
	$id_pengguna=$_SESSION['id_pengguna'];
	$copy=$_POST['copy'];
	$tahun=$_POST['tahun'];
		
				$query_insert = "update cms_footer set
								copyright='$copy',
								id_tahun='$tahun',
								id_pengguna='$id_pengguna'
								where id_footer='$id_footer'";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=footer.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=footer.php'>";
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