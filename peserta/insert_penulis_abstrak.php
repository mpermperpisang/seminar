<?php
		include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
		include "../include/aktifasi_email.php";
		$link=koneksi_db();	
		$id_abstrak = $_POST['id_abstrak'];
		$author = $_POST['author'];
		
				$query_insert = "insert into penulis_abstrak (id_penulis_abstrak,id_penulis,id_abstrak)
			 	values ('','$author','$id_abstrak');";
				$res=mysql_query($query_insert);
				if($res)
				{
					include("../redirectview_tambah.php"); 
					?><input type="hidden" name="id" size="30" value="<?php echo $id_abstrak ; ?>" maxlength="50"/><?php
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_penulis_abstrak.php?id=$id_abstrak'>";
				}
				else
				{
					include("../redirectview_gagal.php"); 
					?><input type="hidden" name="id" size="30" value="<?php echo $id_abstrak ; ?>" maxlength="50"/><?php
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_penulis_abstrak.php?id=$id_abstrak'>";
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