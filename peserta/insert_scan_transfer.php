<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
	if($_FILES['scan_transfer']['error']==0)
	{	
		$link=koneksi_db();
		$tgl_upload = date("Y-n-d");	
		$id=$_SESSION['id_pengguna'];
		$scan=$_FILES['scan_transfer']['name'];
        $scan_ext= strtolower(end(explode('.', $scan)));
        $allowed_ext= array('jpg','jpeg','png');
		
		if(in_array($scan_ext, $allowed_ext) === true)
		{
				$scanbaru="../scan_bukti_transfer/".$id.'.'.$scan_ext;
				if((move_uploaded_file($_FILES['scan_transfer']['tmp_name'], $scanbaru)==true))
				{
                
					$query_insert = "insert into cms_scan_transfer
									values ('','$tgl_upload','$id','$scan_ext','1','$id');";
					$res=mysql_query($query_insert);
					if($res)
					{
						include("../redirectview_tambah.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_scan_transfer.php'>";
					}
					else
					{
						include("../redirectview_gagal.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_scan_transfer.php'>";
					}
				}	
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_scan_transfer.php'>";
				}	
		}	
		else
		{
			include("../redirectview_format_dokumen.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_scan_transfer.php'>";
		}	
	}
	else
	{
		include("../redirectview_gagal.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_scan_transfer.php'>";
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