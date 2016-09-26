<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$tahun = $_POST['tahun'];
		
		if (is_numeric($tahun))
		{
			$cekdata="select bil_tahun from cms_tahun where bil_tahun='$tahun'"; 
			$ada=mysql_query($cekdata);
			if(mysql_num_rows($ada)>0) 
			{ 
					include("../redirectview_exist.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_year.php'>";
			} 
			else
			{
				$query_insert = "insert into cms_tahun (id_tahun,bil_tahun)
								values ('','$tahun');";
				$res=mysql_query($query_insert);
				if($res)
				{
					$folder = $_POST['tahun'];  //nama direktori
					$buatfolder = mkdir ('../paper/'.$folder);
					include("../redirectview_tambah.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=year.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_year.php'>";
				}
			}
		}
		else
		{
			include("../redirectview_gagal.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_year.php'>";
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