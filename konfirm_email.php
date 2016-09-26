<?php
	include "include/library.php";
	include "include/aktifasi_email.php";
	
	$link=koneksi_db();
	$username = secure_input($_POST['username']);
	$lousername=strtolower($username);
	$email = secure_input($_POST['email']);
	$masalah = secure_input($_POST['masalah']);
	if (ctype_alnum($username))
	{
		
	$sql = "update cms_pengguna set
			kode_masalah='$masalah'
			where username='$username' and email='$email'";
	$res = mysql_query($sql);
	
	if($res){
		//echo "berhasil query";
			echo "Administrator will receive your problem. Always check your email to get notification from administrator";
	}else{
		echo "Not successfull to do query";
	}
	}
	else
	{
	echo "Please do not use space or weird character for username";
	}
	
?>
