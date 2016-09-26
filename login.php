<?php
	include("include/library.php");
	include ("include/aktifasi_email.php");
	$username = ($_POST['username']);
	$email = ($_POST['username']);
	$password = md5(($_POST['password']));
	$pw = $_POST['password'];
	$link=koneksi_db();
	$sql = "select * from cms_pengguna
	where (username='$username' or email='$email')";
	$res = mysql_query($sql);
	$jml = mysql_num_rows($res);
	if($jml==0){
		header("Location: gagal_login_username.php");
	}else{
		while($data = mysql_fetch_assoc($res)){
			
			$pass_db = $data['password'];
			
			if($pass_db != $password){
				header("Location: gagal_login_password.php");
			}else{
			
				$aktif = $data['kategori_pengguna'];
				$email = $data['email'];
				
				if($aktif == 7){
					header("Location: gagal_login_aktivasi.php");
				}
				else if ($aktif == 1){	
					$query="select * from cms_peserta,cms_pengguna 
							where cms_peserta.id_pengguna=cms_pengguna.id_pengguna
							and cms_peserta.kategori_peserta<>''
							and cms_peserta.kategori_peserta is not null
							and (username='$username' or email='$email')";
					$res_query = mysql_query($query);
					$banyakrecord=mysql_num_rows($res_query);
					if($banyakrecord>0)
					{
						$_SESSION['username']=$data['username'];
						$_SESSION['password']=$data['password'];
						$_SESSION['aktif']=$data['kategori_pengguna'];
						$_SESSION['id_pengguna']=$data['id_pengguna'];
						$_SESSION['nama_pengguna']=$data['nama_pengguna'];
						$_SESSION['login_member']=true;
						include("redirectview_login.php");
						echo "<meta http-equiv='refresh' content='1;url=peserta/index.php'>";
					}
					else
					{	
						$_SESSION['username']=$data['username'];
						$_SESSION['password']=$data['password'];
						$_SESSION['aktif']=$data['kategori_pengguna'];
						$_SESSION['id_pengguna']=$data['id_pengguna'];
						$_SESSION['nama_pengguna']=$data['nama_pengguna'];
						$_SESSION['login_member']=true;
						include("redirectview_login.php");
						echo "<meta http-equiv='refresh' content='1;url=peserta/profile.php'>";
					}
				}
				else if ($aktif == 2){
					$_SESSION['username']=$data['username'];
					$_SESSION['password']=$data['password'];
					$_SESSION['aktif']=$data['kategori_pengguna'];
					$_SESSION['id_pengguna']=$data['id_pengguna'];
					$_SESSION['nama_pengguna']=$data['nama_pengguna'];
					$_SESSION['login_member']=true;
					include("redirectview_login.php");
					echo "<meta http-equiv='refresh' content='1;url=admin/index.php'>";
				}
				else if ($aktif == 3){
					$_SESSION['username']=$data['username'];
					$_SESSION['password']=$data['password'];
					$_SESSION['aktif']=$data['kategori_pengguna'];
					$_SESSION['id_pengguna']=$data['id_pengguna'];
					$_SESSION['nama_pengguna']=$data['nama_pengguna'];
					$_SESSION['login_member']=true;
					include("redirectview_login.php");
					echo "<meta http-equiv='refresh' content='1;url=panitia/index.php'>";
				}
				else if ($aktif == 4){
					$_SESSION['username']=$data['username'];
					$_SESSION['password']=$data['password'];
					$_SESSION['aktif']=$data['kategori_pengguna'];
					$_SESSION['id_pengguna']=$data['id_pengguna'];
					$_SESSION['nama_pengguna']=$data['nama_pengguna'];
					$_SESSION['login_member']=true;
					include("redirectview_login.php");
					echo "<meta http-equiv='refresh' content='1;url=reviewer/index.php'>";
				}
				else if ($aktif == 5){
					$_SESSION['username']=$data['username'];
					$_SESSION['password']=$data['password'];
					$_SESSION['aktif']=$data['kategori_pengguna'];
					$_SESSION['id_pengguna']=$data['id_pengguna'];
					$_SESSION['nama_pengguna']=$data['nama_pengguna'];
					$_SESSION['login_member']=true;
					include("redirectview_login.php");
					echo "<meta http-equiv='refresh' content='1;url=pimpinan/index.php'>";
				}
				else if ($aktif == 6){
					include("redirectview_gagal_login.php");
				}
			}				
		}		
	}		
?>