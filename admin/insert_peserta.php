<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$username = $_POST['username'];
		$password = md5(secure_input($_POST['password']));
		$pw = $_POST['password'];
		$nama = $_POST['name'];
		
		if (ctype_alnum($username)) 
		{	
			$cekdata="select username,password from cms_pengguna where username='$username' and password='$password'"; 
			$ada=mysql_query($cekdata);
			if(mysql_num_rows($ada)>0) 
			{ 
					include("../redirectview_pengguna.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_peserta.php'>";
			} 
			else
			{
				$query_insert = "insert into cms_pengguna (id_pengguna,username,password,pw,nama_pengguna,kategori_pengguna)
								values ('','$username','$password','$pw','$nama','1');";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah_pengguna.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=peserta.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_peserta.php'>";
				}
			}
		}
		else
		{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_peserta.php'>";
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