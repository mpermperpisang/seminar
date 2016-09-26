<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	include "../include/aktifasi_email.php";
	$link=koneksi_db();
	$tgl_upload = date("Y-n-d");
	$id=$_SESSION['id_pengguna'];
	$judul = $_POST['judul'];
	$content = $_POST['isi'];
	$kategori_posting = $_POST['postingan'];
	
	if (empty($kategori_posting) || (empty($content)))
	{
			include("../redirectview_kosong.php");
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=front_end.php'>";
	}
	else
	{
		$query_update = "update cms_postingan set 
						judul='$judul',
						content='$content',
						id_pengguna='$id',
						date='$tgl_upload'
						where kategori_posting='$kategori_posting'";
		$update = mysql_query($query_update);
		if($update)
			{
			include("../redirectview_update.php");
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=front_end.php'>";
			}
		
		else
			{
			include("../redirectview_gagal.php");
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=front_end.php'>";
			}
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