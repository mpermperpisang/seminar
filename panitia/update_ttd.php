<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
	if($_FILES['ttd']['error']==0)
	{	
		$link=koneksi_db();
		$id_ttd=$_REQUEST['id_ttd'];
		$id_pengguna=$_SESSION['id_pengguna'];
        $allowed_ext= array('jpg','jpeg','png');
		$ttd=$_FILES['ttd']['name'];
        $ttd_ext= strtolower(end(explode('.', $ttd)));
		
		if(in_array($ttd_ext, $allowed_ext) === true)
		{
				$ttdbaru="../dokumen/".$id_pengguna.".".$ttd_ext;
				if((move_uploaded_file($_FILES['ttd']['tmp_name'], $ttdbaru)==true))
				{                
					$query_insert = "update cms_stempel_ttd set	
									nama_file='$id_pengguna',
									tipe_file='$ttd_ext',
									id_pengguna='$id_pengguna'
									where id_stempel_ttd='$id_ttd'";
					$res=mysql_query($query_insert);
					if($res)
					{
						include("../redirectview_update.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=ttd.php'>";
					}
					else
					{
						include("../redirectview_gagal.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=ttd.php'>";
					}
				}	
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=ttd.php'>";
				}			
		}
		else
		{
			include("../redirectview_format_dokumen.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=ttd.php'>";
		}
	}
	else
	{
		include("../redirectview_gagal.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=ttd.php'>";
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