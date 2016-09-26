<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		$link=koneksi_db();	
		$pertanyaan = $_POST['pertanyaan'];
		$urutan = $_POST['urutan'];		

		$sql = "select * from cms_tahun
				where cms_tahun.kode_aktif='1'";
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
			$tahun=$select_result['id_tahun'];
		}
		
		$cekdata="select id_urutan_pertanyaan from cms_kuesioner,cms_tahun
				where id_urutan_pertanyaan='$urutan'
				and cms_kuesioner.id_tahun=cms_tahun.id_tahun
				and cms_tahun.kode_aktif='1'"; 
		$ada=mysql_query($cekdata);
		$banyakrecord=mysql_num_rows($ada);
		if($banyakrecord>0) 
		{
				include("../redirectview_gagal.php"); 
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_kuesioner.php'>";
		}
		else
		{
				$query_insert = "insert into cms_kuesioner
								values ('','$pertanyaan','$urutan','$tahun');";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_kuesioner.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_kuesioner.php'>";
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