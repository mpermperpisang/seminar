<?php
	include "include/library.php";
	include "include/aktifasi_email.php";
	
	$link=koneksi_db();
	$username = secure_input($_POST['username']);
	$lousername=strtolower($username);
	$password = md5(secure_input($_POST['password']));
	$lopassword=strtolower($password);
	$pass=secure_input($_POST['password']);
	$pw = secure_input($_POST['repassword']);
	$lopw=strtolower($pw);
	$email = secure_input($_POST['email']);
	$nama = secure_input($_POST['nama_lengkap']);
	
	$kode = rand(11111,99999);
	
	if (ctype_alnum($username)) 
	{
		$cekdata="select username,password from cms_pengguna where username='$username' and password='$password'";
		$ada=mysql_query($cekdata);
		if(mysql_num_rows($ada)>0) 
		{ 
				echo "There is one username and password that match with the username and password that you input. Please try another username and password. ";
		} 
		else
		{
			if ($pass==$pw)
			{	
			$sql = "insert into cms_pengguna (id_pengguna,username,password,pw,email,nama_pengguna,jenis_kelamin,kode_email,id_kategori_pengguna) values ('','$lousername','$lopassword','$lopw','$email','$nama','Male','$kode','7')";
			$res = mysql_query($sql);
			}
			else
			{
					echo "Your password doesn't match. Please retype password.<br>";		
			}
		
			if(@$res)
			{
				//echo "berhasil query";
				if(auto_respon(@$email,@$username,@$kode,@$nama)){
					echo "Please check your email to activated the account. If you not found the replied mail on your inbox, please check your spam folder";
				}else{
					echo "Not successfull sending activation email";
				}
			}
			else
			{
				echo "Not successfull to do query";
			}
		}
    } 
	else 
	{
			echo "Please do not use space or weird character for username. Please try again";
    }
	
?>
