<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	if($_FILES['brosur']['error']==0)
	{	
		$link=koneksi_db();
		$id_pengguna=$_SESSION['id_pengguna'];
		$brosur=$_FILES['brosur']['name'];
        $allowed_ext= array('pdf');
        $brosur_ext= strtolower(end(explode('.', $brosur)));
		
		if(in_array($brosur_ext, $allowed_ext) === true)
		{
				$brosurbaru="../dokumen/brosurpdf.pdf";
				if((move_uploaded_file($_FILES['brosur']['tmp_name'], $brosurbaru)==true))
				{
					$query_insert = "update cms_brosur_template set						
									nama_dokumen='brosurpdf',
									tipe_file='$brosur_ext',
									id_pengguna='$id_pengguna'
									where id_brosur_template=1";
					$res=mysql_query($query_insert);
					if($res)
					{
						include("../redirectview_update.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=brosur.php'>";
					}
					else
					{
						include("../redirectview_gagal.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=brosur.php'>";
					}
				}	
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=brosur.php'>";
				}	
		}
		else
		{
			include("../redirectview_format_dokumen.php");
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=brosur.php'>";
		}
	}
	else
	{
		include("../redirectview_gagal.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=brosur.php'>";
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