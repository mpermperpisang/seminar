<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$id = $_POST['id_tahun'];
		$bil_tahun = $_POST['bil_tahun'];
		
		if (is_numeric($bil_tahun))
		{
			$cekdata="select bil_tahun from cms_tahun where bil_tahun='$bil_tahun'"; 
			$ada=mysql_query($cekdata);
			if(mysql_num_rows($ada)>0) 
			{ 
					include("../redirectview_exist.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_year.php?id=$id'>";
			} 
			else
			{	
		$sql = "select bil_tahun from cms_tahun where id_tahun='$id'";		
		$res = mysql_query($sql);
		while($select_result = mysql_fetch_array($res))
		{
			$tahun = $select_result['bil_tahun'];
		}
		$folder = $_POST['bil_tahun'];  //nama direktori
		@$buatfolder = rename ('../paper/'.$tahun,'../paper/'.$folder);
		if (@$buatfolder)
		{
				$query_insert = "update cms_tahun set 
								bil_tahun='$bil_tahun'
								where id_tahun='$id'";					
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_update.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=year.php'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_year.php?id=$id'>";

				}
		}
		else
		{
			include("../redirectview_gagal.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_year.php?id=$id'>";
		}
		}
		
		}
		else
		{
			include("../redirectview_gagal.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_year.php?id=$id'>";
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