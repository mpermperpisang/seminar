<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	if(($_FILES['brosur']['error']==0) && ($_FILES['brosur2']['error']==0))
	{	
		$link=koneksi_db();
		$id_pengguna=$_SESSION['id_pengguna'];
		$brosur=$_FILES['brosur']['name'];
        $brosur_ext= strtolower(end(explode('.', $brosur)));
		$brosur2=$_FILES['brosur2']['name'];
        $brosur_ext2= strtolower(end(explode('.', $brosur2)));
        $allowed_ext= array('jpg','jpeg','png');
		
		if((in_array($brosur_ext, $allowed_ext) === true) && (in_array($brosur_ext2, $allowed_ext) === true))
		{
				$brosurbaru="../dokumen/1.".$brosur_ext;
				$brosurbaru2="../dokumen/2.".$brosur_ext2;
				if((move_uploaded_file($_FILES['brosur']['tmp_name'], $brosurbaru)==true) && (move_uploaded_file($_FILES['brosur2']['tmp_name'], $brosurbaru2)==true))
				{
					$query_insert = "update cms_brosur_template set						
									nama_dokumen='1',
									tipe_file='$brosur_ext',
									id_pengguna='$id_pengguna'
									where id_brosur_template=3";
					$res=mysql_query($query_insert);
					
					$query_insert2 = "update cms_brosur_template set						
									nama_dokumen='2',
									tipe_file='$brosur_ext2',
									id_pengguna='$id_pengguna'
									where id_brosur_template=4";
					$res2=mysql_query($query_insert2);
					
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