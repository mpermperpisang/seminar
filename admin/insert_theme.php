<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	$link=koneksi_db();
	$id_pengguna=$_SESSION['id_pengguna'];
	$tema=$_POST['tema'];
	$nama=$_POST['nama'];
	$tahun=$_POST['tahun'];
	$venue=$_POST['venue'];
	$akronim=$_POST['akronim'];
		
		$query_insert = "insert into cms_header values('','$tema','$nama','$akronim','$venue','$tahun','logo.png','logo2.png','$id_pengguna')";
		$res=mysql_query($query_insert);
		if($res)
		{
			include("../redirectview_tambah.php");
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