<?php
	include('include/library.php');
	$link=koneksi_db();						
	$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=1";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$satu=$select_result['isi_template'];
	}
if(isset($_SESSION['login_member']))
{
	if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="1"))
	{
		header("Location: peserta/index.php");
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="2"))
	{
		header("Location: admin/index.php");
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="3"))
	{
		header("Location: panitia/index.php");
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="4"))
	{
		header("Location: reviewer/index.php");
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="5"))
	{
		header("Location: pimpinan/index.php");
	}
}
?>
<html>
	<head>
		<link type="text/css" href="css/css.css" rel="stylesheet">	
		<title>