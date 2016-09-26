<?php
	include('../include/library.php');
	include "../include/aktifasi_email.php";
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();	
		$reviewer = $_POST['review'];
		$id_abstrak = $_POST['id_abstrak'];
		
		$query="SELECT * FROM cms_pengguna,cms_reviewer 
				where cms_pengguna.id_pengguna=cms_reviewer.id_pengguna
				and cms_reviewer.id_pengguna='$reviewer'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$alamatEmail = $data['email'];
		$nama = $data['nama_pengguna'];
		
		if (!empty($reviewer))
		{		
		// title atau subject email
		$title  = "ABSTRACT REVIEW INBOX";
		
		// isi pesan email disertai password
		$pesan  = "Hello ".$nama." there is an abstract in your abstract review inbox that you must review.\n\nCheck it at website seminar-penelitian.com";
		
		// header email berisi alamat pengirim
		$header = "From: reviewer@seminar-penelitian.com";
		
		// mengirim email
		@$kirimEmail = mail($alamatEmail, $title, $pesan, $header);
		
		// cek status pengiriman email
			if ($kirimEmail) 
			{
					$query_update = "update cms_abstrak set 
									kode_aktif='1'
									where id_abstrak='$id_abstrak'";
					$res=mysql_query($query_update);
					$query_insert2 = "insert into review_abstrak (id_review_abstrak,id_pengguna,id_abstrak) values ('','$reviewer','$id_abstrak')";
						
					$res2=mysql_query($query_insert2);
					if($res)
					{
							header("Location: abstrak.php");
					}
					else
					{
							header("Location: abstrak.php");
					}
			}
			else
			{
				include("../redirectview_gagal_email.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=abstrak.php'>";
			}
		}
		else
		{
			header("Location: abstrak.php");
		}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"3"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>