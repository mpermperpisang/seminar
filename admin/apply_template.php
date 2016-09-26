<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	$link=koneksi_db();			
	$template=$_POST['template'];
	$id_pengguna=$_SESSION['id_pengguna'];
	
	if ($template==1)
	{
		$query_update = "update cms_template set
						kode_aktif=1,
						id_pengguna='$id_pengguna'
						where kode_template=1";
		$update = mysql_query($query_update);
		$query_update2 = "update cms_template set
						kode_aktif=0
						where kode_template=2";
		$update2 = mysql_query($query_update2);
	}
	else if ($template==2)
	{
		$query_update = "update cms_template set
						kode_aktif=1
						where kode_template=2";
		$update = mysql_query($query_update);
		$query_update2 = "update cms_template set
						kode_aktif=0,
						id_pengguna='$id_pengguna'
						where kode_template=1";
		$update2 = mysql_query($query_update2);
	}
	
	if($update)
	{	
		include("../redirectview_update.php");
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=template.php'>";
	}	
	else
	{
		include("../redirectview_gagal.php");
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=template.php'>";
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