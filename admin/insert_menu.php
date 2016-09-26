<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
	$link=koneksi_db();	
	$id_pengguna=@$_SESSION['id_pengguna'];
	$menu=@$_POST['menu'];
	$link_file = @$_POST['link'];
	$urutan = $_POST['urutan'];
	$judul = $_POST['judul'];
	$ucjudul=strtoupper($judul);
	$isi = $_POST['isi'];	
	$tgl = date("Y-n-d");
	if (!empty($isi))
	{
	if (ctype_alnum($link_file))
	{
		$insert = "insert into cms_menu (id_menu,nama_menu,link_file,ext,title,isi,id_order_urutan,kode_aktif,date,id_pengguna)
					values ('','$menu','$link_file','php','$judul','$isi','$urutan','0','$tgl','$id_pengguna')";
		$res=mysql_query($insert);
		if($res)
		{
			$namafile = $link_file.'.php';
			$handle = fopen ("../".$namafile, "w");
			if (!$handle) 
			{
				include("../redirectview_gagal.php"); 
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=menu_list.php'>";
			} 
			else 
			{
 				fwrite ($handle, "<?php include('support_1.php'); ?>
 				$ucjudul
				<?php include('support_2.php'); ?>
				<a class='share_facebook' href='https://www.facebook.com/sharer.php?u=http://seminar-penelitian.com/$namafile'
				<?php include('support_5.php'); ?>
				<a class='share_google' href='https://plus.google.com/share?url=http://seminar-penelitian.com/$namafile'
				<?php include('support_6.php'); ?>
				<a class='share_twitter' href='https://twitter.com/share?url=http://seminar-penelitian.com/$namafile'
				<?php include('support_7.php'); ?>
 				$ucjudul
				<?php include('support_3.php'); ?>
 				<?php echo '$isi'; ?>
				<?php include('support_4.php'); ?>");
				
				include("../redirectview_tambah.php"); 
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=menu_list.php'>";
			}
			fclose($handle);
?>
</p>
<p>
<?php
		}
		else
		{
			include("../redirectview_gagal.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=menu_list.php'>";

		}
	}
	else
	{
		include("../redirectview_link.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_menu.php'>";
	}
	}
	else
	{
		include("../redirectview_kosong.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=add_menu.php'>";
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