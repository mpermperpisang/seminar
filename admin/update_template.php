<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	if($_FILES['template']['error']==0)
	{	
		$link=koneksi_db();
		$id_pengguna=$_SESSION['id_pengguna'];
        $allowed_ext= array('doc','docx');
		$template=$_FILES['template']['name'];
        $template_ext= strtolower(end(explode('.', $template)));
		
		if(in_array($template_ext, $allowed_ext) === true)
		{
				$templatebaru="../dokumen/template_paper.".$template_ext;
				if((move_uploaded_file($_FILES['template']['tmp_name'], $templatebaru)==true))
				{
                
					$query_insert = "update cms_brosur_template set						
									nama_dokumen='template_paper',
									tipe_file='$template_ext',
									id_pengguna='$id_pengguna'
									where id_brosur_template=2";
					$res=mysql_query($query_insert);
					if($res)
					{
						include("../redirectview_tambah.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=template.php'>";
					}
					else
					{
						include("../redirectview_judul.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=template.php'>";
					}
				}	
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=template.php'>";
				}			
		}
		else
		{
			include("../redirectview_format_dokumen.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=template.php'>";
		}
	}
	else
	{
		include("../redirectview_gagal.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=template.php'>";
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