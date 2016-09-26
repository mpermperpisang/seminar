<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
		$link=koneksi_db();
		$tgl_upload = date("Y-n-d");	
		$id=$_SESSION['id_pengguna'];
		$kode = $_POST['kode'];
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$abstrak = $_POST['abstrak'];	
		$keyword = $_POST['keyword'];	
		
		if(empty($abstrak))
		{
			include("../redirectview_kosong.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_abstrak.php'>";
		}
		else
		{
				$query_insert = "insert into cms_abstrak 
								values ('$kode','$tgl_upload','$judul','$abstrak','$keyword','$id','$kategori','1','3','0');";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_abstrak.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_abstrak.php'>";

				}
		}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"1"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>