<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
	$link=koneksi_db();		
	$id=$_SESSION['id_pengguna'];
	$id_urutan_pertanyaan=$_POST['id_urutan_pertanyaan'];
	$id_kuesioner=$_POST['id_kuesioner'];		
	$jawaban_kuesioner=$_POST['jawaban_kuesioner'];
	$tgl_pengisian = date("Y-n-d");
	
	if ((empty($id_urutan_pertanyaan)) || (empty($jawaban_kuesioner)) || (empty($id_kuesioner)))
	{
		include("../redirectview_gagal.php");
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=kuesioner.php?id_urutan_pertanyaan=1'>";		
	}
	else
	{
		$query_insert = "insert kuesioner_jawaban
						values ('','$tgl_pengisian','$id_kuesioner','$jawaban_kuesioner','$id')";
		$insert = mysql_query($query_insert);
		if($insert)
			{	
			$sql = "select id_urutan_pertanyaan from cms_kuesioner,cms_tahun
					where cms_kuesioner.id_tahun=cms_tahun.id_tahun
					and cms_tahun.kode_aktif='1'
					order by id_urutan_pertanyaan desc limit 1";
			$res = mysql_query($sql);	
			$banyakrecord=mysql_num_rows($res);	
			while($select_result = mysql_fetch_array($res))
			{
				$i=$select_result['id_urutan_pertanyaan'];
			}
				if ($id_urutan_pertanyaan<$i)
				{
					$id_urutan_pertanyaan2=$id_urutan_pertanyaan+1;
					if (empty($id_urutan_pertanyaan2))
					{
						header("Location: kuesioner.php?id_urutan_pertanyaan=1");
					}
					else
					{
						header("Location: kuesioner.php?id_urutan_pertanyaan=$id_urutan_pertanyaan2");
					}
				}
				else
				{
					include("../redirectview_kuesioner.php");
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=index.php'>";
				}
			}	
		else
			{
				include("../redirectview_gagal.php");
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=kuesioner.php?id_urutan_pertanyaan=1'>";
			}
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