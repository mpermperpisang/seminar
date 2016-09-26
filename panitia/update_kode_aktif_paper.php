<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();	
		$reviewer = $_POST['review'];
		$id_paper = $_POST['id_paper'];
		
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
		$title  = "PAPER REVIEW INBOX";
		
		// isi pesan email disertai password
		$pesan  = "Hello ".$nama." there is a paper in your paper review inbox that you must review.\n\nCheck it at website seminar-penelitian.com";
		
		// header email berisi alamat pengirim
		$header = "From: reviewer@seminar-penelitian.com";
		
		// mengirim email
		@$kirimEmail = mail($alamatEmail, $title, $pesan, $header);
		
		// cek status pengiriman email
			if ($kirimEmail) 
			{
				$query_update = "update cms_paper set 
								kode_aktif='1'
								where id_paper='$id_paper'";
				$res=mysql_query($query_update);
				$query_insert2 = "insert into review_paper (id_review_paper,id_pengguna,id_paper) values ('','$reviewer','$id_paper')";
					
				$res2=mysql_query($query_insert2);
				if($res)
				{
						header("Location: paper.php");
				}
				else
				{
						header("Location: paper.php");
				}
			}
			else
			{
				include("../redirectview_gagal_email.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=paper.php'>";
			}
		}
		else
		{
			header("Location: paper.php");
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