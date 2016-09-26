<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	if($_FILES['univ']['error']==0)
	{	
		$link=koneksi_db();
		$id_header=$_REQUEST['id_header'];
		$logo_univ=$_FILES['univ']['name'];
        $logo_ext= strtolower(end(explode('.', $logo_univ)));
        $allowed_ext= array('jpg','jpeg','png');
		
		
		if(in_array($logo_ext, $allowed_ext) === true)
		{
			$logounivbaru="../logo/".$logo_univ.".".$logo_ext;
			if((move_uploaded_file($_FILES['univ']['tmp_name'], $logounivbaru)==true))
			{
				$query_insert = "update cms_header set						
								logo_dua='$logo_univ.$logo_ext'
								where id_header='$id_header'";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=header.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=header.php'>";
				}
			}
			else
			{
				include("../redirectview_gagal.php"); 
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=header.php'>";
			}
		}
		else
		{
			include("../redirectview_format_dokumen.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=header.php'>";
		}
	}
	else
	{
		include("../redirectview_gagal.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=header.php'>";
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