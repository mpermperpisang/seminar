<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
	if($_FILES['paper']['error']==0)
	{	
		$link=koneksi_db();
		$tgl_upload = date("Y-n-d");
		$id_abstrak=$_POST['id_abstrak'];	
		$id=$_SESSION['id_pengguna'];
		$id_paper=$_POST['kode'];
        $allowed_ext= array('pdf','doc','docx');
		$paper=$_FILES['paper']['name'];
        $paper_size = @$_FILES['paper']['size'];
        $paper_ext= strtolower(end(explode('.', $paper)));
		
		if(in_array($paper_ext, $allowed_ext) === true)
		{
        	if($paper_size <= 2097152)
			{
				$sql = "select * from cms_tahun where kode_aktif='1'";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{
					$tahun=$select_result['bil_tahun'];
				}
				$sql2 = "select * from cms_abstrak,cms_paper
						where cms_abstrak.id_abstrak=cms_paper.id_abstrak
						and cms_paper.id_paper='$id_paper'";
				$res2 = mysql_query($sql2);
				while($select_result2 = mysql_fetch_array($res2))
				{
					$judul2=strtoupper($select_result2['judul']);
				}
				$paperbaru = '../paper/'.$tahun.'/'.$id_paper.'-'.$judul2.'.'.$paper_ext;
				if((move_uploaded_file($_FILES['paper']['tmp_name'], $paperbaru)==true))
				{
					$query_update = "update cms_paper set
									tgl_upload_paper='$tgl_upload',
									nama_file='$paper',
									tipe_file='$paper_ext',
									id_abstrak='$id_abstrak'
									where id_paper='$id_paper'";
					$res=mysql_query($query_update);
					if($res)
					{
						include("../redirectview_update.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
					}
					else
					{
						include("../redirectview_judul.php"); 
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
					}
				}	
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
				}
			}
			else if($paper_size > 2097152)
			{
				include("../redirectview_file_size.php");  
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
			};				
		}
		else
		{
			include("../redirectview_format_dokumen.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
		}
	}
	else
	{
		include("../redirectview_gagal.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
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