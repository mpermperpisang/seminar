<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();	
		$id_pengguna=$_SESSION['id_pengguna'];
		$id_paper = $_REQUEST['id_paper'];
		$ruangan = $_POST['ruang'];
		$awal = $_POST['waktu_awal'];
		$akhir = $_POST['waktu_akhir'];
		
			if (empty($id_paper))
			{
				include("../redirectview_kosong.php"); 
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=jadwal.php'>";
			}
			else
			{		
				$cekdata="select ruangan,waktu_awal,waktu_akhir from cms_jadwal,cms_paper,cms_abstrak,cms_peserta,cms_tahun 
						where ruangan='$ruangan' 
						and waktu_awal=$awal
						and waktu_akhir=$akhir
						and cms_jadwal.id_paper=cms_paper.id_paper
						and cms_paper.id_abstrak=cms_abstrak.id_abstrak
						and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
						and cms_peserta.id_tahun=cms_tahun.id_tahun
						and cms_tahun.kode_aktif='1'";
				$ada=mysql_query($cekdata);
				if(mysql_num_rows($ada)>0) 
				{ 
					include("../redirectview_jadwal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=jadwal.php'>";
				} 
				else 
				{ 
							$sqla = "select no_ruangan from cms_jadwal
									where ruangan='$ruangan'";
							$resa = mysql_query($sqla);
							$banyakrecord=mysql_num_rows($resa);
							if ($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($resa))
								{
									$no_ruangan=$select_result['no_ruangan'];
								}
							}
							else
							{
								$no_ruangan='';
							}
							if (is_numeric($awal) && (is_numeric($akhir)))
							{
						$query_insert = "insert into cms_jadwal (id_jadwal,ruangan,no_ruangan,id_paper,waktu_awal,waktu_akhir)
										values ('','$ruangan','$no_ruangan','$id_paper','$awal','$akhir')";
						$res=mysql_query($query_insert);
						$query_insert2 = "update cms_paper set
										kode_aktif='2'
										where id_paper='$id_paper'";
						$res=mysql_query($query_insert2);
						if($res)
						{
							header("Location: jadwal.php");
						}
						else
						{
							include("../redirectview_gagal.php"); 
							header("Location: jadwal.php");
						}
						}
						else
						{
							include("../redirectview_gagal.php"); 
							header("Location: jadwal.php");
						}
				}
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