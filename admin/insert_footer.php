<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	$link=koneksi_db();
	$id_pengguna=$_SESSION['id_pengguna'];
	$copy=$_POST['copy'];
	$tahun=$_POST['tahun'];
		
				$query_insert = "insert into cms_footer values('','$copy','$tahun','$id_pengguna')";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah.php"); 
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