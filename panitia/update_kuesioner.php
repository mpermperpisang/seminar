<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$id = $_POST['id_kuesioner'];
		$pertanyaan = $_POST['pertanyaan'];
		$urutan = $_POST['urutan'];
		
		
		$sql = "select * from cms_tahun
				where kode_aktif='1'";
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
			$tahun=$select_result['id_tahun'];
		}
		
		$cekdata="select * from cms_kuesioner 
				where id_tahun='$tahun' and id_urutan_pertanyaan='$urutan'"; 
		$ada=mysql_query($cekdata);
		if(mysql_num_rows($ada)>0) 
		{ 
			include("../redirectview_urutan.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_kuesioner.php?id_kuesioner=$id'>";
		} 
		else 
		{ 
				$query_insert = "update cms_kuesioner set 
								pertanyaan='$pertanyaan',
								id_urutan_pertanyaan='$urutan'
								where id_kuesioner='$id'";
					
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=kuesioner.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_kuesioner.php?id_kuesioner=$id'>";
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