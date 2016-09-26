<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$id = $_POST['id'];
		$bidang = $_POST['bidang'];
		
				$query_insert = "insert into reviewer_bidang_kajian (id_reviewer_bidang_kajian,id_bidang_kajian,id_pengguna)
			 	values ('','$bidang','$id');";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah.php"); 
					?><input type="hidden" name="id" size="30" value="<?php echo $id ; ?>" maxlength="50"/><?php
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_bidang_reviewer.php?id=$id'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					?><input type="hidden" name="id" size="30" value="<?php echo $id ; ?>" maxlength="50"/><?php
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_bidang_reviewer.php?id=$id'>";
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