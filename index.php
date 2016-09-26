<?php		
	include("include/library.php");
	$link=koneksi_db();
	$sql2 = "select * from cms_admin";
	$res2 = mysql_query($sql2);
	$banyakrecord2=mysql_num_rows($res2);
	if($banyakrecord2>0)
	{
	
		if(isset($_SESSION['login_member']))
		{
			if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="1")&&($_SESSION['username']))
			{			
				include("redirectview_index.php");
				echo "<meta http-equiv='refresh' content='1;url=peserta/index.php'>";
			}
			else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="2")&&($_SESSION['username']))
			{			
				include("redirectview_index.php");
				echo "<meta http-equiv='refresh' content='1;url=admin/index.php'>";
			}
			else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="3")&&($_SESSION['username']))
			{			
				include("redirectview_index.php");
				echo "<meta http-equiv='refresh' content='1;url=panitia/index.php'>";
			}
			else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="4")&&($_SESSION['username']))
			{			
				include("redirectview_index.php");
				echo "<meta http-equiv='refresh' content='1;url=reviewer/index.php'>";
			}
			else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="5")&&($_SESSION['username']))
			{			
				include("redirectview_index.php");
				echo "<meta http-equiv='refresh' content='1;url=pimpinan/index.php'>";
			}
		} 
		else
		{
			header("Location: home.php");
		}	
	}
	else
	{
		header("Location: create_admin.php");
	}	
		
?>