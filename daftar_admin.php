<?php
		include('include/library.php');
		if(isset($_SESSION['login_member']))
{
	if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="1"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=peserta/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="2"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=admin/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="3"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=panitia/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="4"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=reviewer/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="5"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=pimpinan/index.php'>";
	}
}
else
{
		include "include/aktifasi_email.php";
		$link=koneksi_db();	
		$username = $_POST['username'];
		$password = md5(secure_input($_POST['password']));
		$pw = $_POST['password'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
if (ctype_alnum($username))
{
		
				$query_insert = "insert into cms_pengguna (id_pengguna,username,password,pw,email,nama_pengguna,id_kategori_pengguna)
								values ('','$username','$password','$pw','$email','$nama','2');";
				$res=mysql_query($query_insert);
				if($res)
				{
					$sql = "select * from cms_pengguna,cms_kategori_pengguna
					where cms_pengguna.id_kategori_pengguna=cms_kategori_pengguna.id_kategori_pengguna
					and (username='$username' or email='$email')";
					$res = mysql_query($sql);
					$data = mysql_fetch_assoc($res);
					$_SESSION['username']=$data['username'];
					$_SESSION['password']=$data['password'];
					$_SESSION['aktif']=$data['urutan_pengguna'];
					$_SESSION['id_pengguna']=$data['id_pengguna'];
					$_SESSION['nama_pengguna']=$data['nama_pengguna'];
					$_SESSION['login_member']=true;
					$id_pengguna=$data['id_pengguna'];					
					
					$sql2 = "select id_pengguna from cms_pengguna where username='$username'";
					$res2 = mysql_query($sql2);
					$banyakrecord=mysql_num_rows($res2);
					if($banyakrecord>0)
					{
						while($select_result = mysql_fetch_array($res))
						{
							$id_pengguna = $select_result['id_pengguna'];
						}					
						$select2 = "INSERT INTO cms_admin (id_pengguna)
						SELECT id_pengguna FROM cms_pengguna where id_pengguna='$id_pengguna' and id_kategori_pengguna=2;";
						$select_query2 = mysql_query($select2);					
						$select3 = "update cms_admin set
									id_level_admin=1
									where id_pengguna='$id_pengguna'";
						$select_query3 = mysql_query($select3);
					}
					
					include("redirectview_tambah_pengguna.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=admin/index.php'>";
				}
				else
				{
					include("redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=admin/index.php'>";
				}
				}
				else
				{
					echo"
					<table border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
					<tr align='center'>
					<td>
					what are you doing? hack is prohibited, don't you know it? ^_^
					</td>
					</tr>
					</table>
				";
				}
			}
?>