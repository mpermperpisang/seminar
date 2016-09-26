<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
	if($_FILES['ttd']['error']==0)
	{	
		$link=koneksi_db();
		$tgl_upload = date("Y-n-d");	
		$id=$_SESSION['id_pengguna'];
		$ttd=$_FILES['ttd']['name'];
        $ttd_ext= strtolower(end(explode('.', $ttd)));
        $allowed_ext= array('jpg','jpeg','png');
		
		if(in_array($ttd_ext, $allowed_ext) === true)
		{
				$ttdbaru="../ttd/".$id.'.'.$ttd_ext;
				if((move_uploaded_file($_FILES['ttd']['tmp_name'], $ttdbaru)==true))
				{
                
					$query_insert = "update cms_peserta set
									ttd='$id.$ttd_ext'
									where id_pengguna='$id'";
					$res=mysql_query($query_insert);
					if($res)
					{
						include("../redirectview_tambah.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=download_letter.php'>";
					}
					else
					{
						include("../redirectview_gagal.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=download_letter.php'>";
					}
				}	
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=download_letter.php'>";
				}	
		}	
		else
		{
			include("../redirectview_format_dokumen.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=download_letter.php'>";
		}	
	}
	else
	{
		include("../redirectview_gagal.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=download_letter.php'>";
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