<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
	include "../include/aktifasi_email.php";
	$link=koneksi_db();
	$id=$_SESSION['id_pengguna'];
	$username = $_POST['username'];
	$pw = $_POST['password'];
	$repassword = $_POST['repassword'];
	$password = md5(secure_input($_POST['password']));
	$email = $_POST['email'];
	
		if (ctype_alnum($username)) 
		{
		if ($pw==$repassword)
		{
			$query_update = "update cms_pengguna set 
							username = '$username',
							password = '$password',
							pw = '$pw',
							email = '$email'
							where id_pengguna='$id'";
			$update = mysql_query($query_update);
			if($update)
			{
				include("../redirectview_update.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=account.php'>";
			}
			else
			{
				include("../redirectview_gagal.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=account.php'>";
			}
		}
		else
		{
				include("../redirectview_password.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=account.php'>";
		}
		}
		else
		{
			include("../redirectview_gagal.php");
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=account.php'>";
		}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"5"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>