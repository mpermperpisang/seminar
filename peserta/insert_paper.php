<?php
	include('../include/library.php');
	$link=koneksi_db();
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
		if($_FILES['paper_file']['error']==0)
		{	
			$tgl_upload = date("Y-n-d");	
			$id=$_SESSION['id_pengguna'];
			$allowed_ext= array('pdf','doc','docx');
			$kode = $_POST['kode'];
			$judul = $_POST['abstrak'];
			$paper= $_FILES['paper_file']['name'];
			$paper_size = $_FILES['paper_file']['size'];
			$paper_ext= strtolower(end(explode('.', $paper)));
			
			if(in_array($paper_ext, $allowed_ext) === true)
			{
				if($paper_size<=2097152)
				{
					if (!empty($judul))
					{
						$cekdata="select id_abstrak from cms_paper where id_abstrak='$judul'"; 
						$ada=mysql_query($cekdata);
						if(mysql_num_rows($ada)>0)
						{ 
							include("../redirectview_judul.php"); 
							echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
						} 
						else 
						{ 
							$sql = "select * from cms_tahun where kode_aktif='1'";
							$res = mysql_query($sql);
							while($select_result = mysql_fetch_array($res))
							{
								$tahun=$select_result['bil_tahun'];
							}
							$sql2 = "select * from cms_abstrak where id_abstrak='$judul'";
							$res2 = mysql_query($sql2);
							while($select_result2 = mysql_fetch_array($res2))
							{
								$judul2=strtoupper($select_result2['judul']);
							}
							$paperbaru = '../paper/'.$tahun.'/'.$kode.'-'.$judul2.'.'.$paper_ext;
							if((move_uploaded_file($_FILES['paper_file']['tmp_name'], $paperbaru)==true))
							{
								$query_insert = "insert into cms_paper 
												(id_paper,tgl_upload_paper,nama_file,tipe_file,id_abstrak,status_review_paper,status_penerimaan_paper,kode_aktif)
												values ('$kode','$tgl_upload','$paper','$paper_ext','$judul','1','3','0');";
								$res=mysql_query($query_insert);
								if($res)
								{
									include("../redirectview_tambah.php"); 
									echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
								}
								else
								{
									echo "$kode $tgl_upload $paper $paper_ext $judul";
								}
							}	
							else
							{
								include("../redirectview_gagal.php");
								echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
							}
						}				
					}
					else
					{
						include("../redirectview_kosong.php");
						echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
					}
				}
				else
				{
					include("../redirectview_file_size.php");  
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
				}
			}
			else
			{
				include("../redirectview_format_dokumen.php");  
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=upload_paper.php'>";
			}
		}
		else
		{
			include("../redirectview_file_size.php");  
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