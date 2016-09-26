<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	$link=koneksi_db();
	$id_header=$_REQUEST['id_header'];
	$id_pengguna=$_SESSION['id_pengguna'];
	$tema=$_POST['tema'];
	$nama=$_POST['nama'];
	$tahun=$_POST['tahun'];
	$venue=$_POST['venue'];
	$akronim=$_POST['akronim'];
		
		$query_insert = "update cms_header set
						tema_acara='$tema',
						nama_acara='$nama',
						akronim='$akronim',
						tempat_acara='$venue',
						id_tahun='$tahun',
						id_pengguna='$id_pengguna'
						where id_header='$id_header'";
		$res=mysql_query($query_insert);
		if($res)
		{
			include("../redirectview_update.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=header.php'>";
		}
		else
		{
			include("../redirectview_gagal.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=header.php'>";
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