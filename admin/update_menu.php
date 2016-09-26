<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{	
	$link=koneksi_db();
	$id_menu=$_POST['id_menu'];	
	if (($id_menu<>1) && ($id_menu<>2) && ($id_menu<>3) && ($id_menu<>4) && ($id_menu<>5) && ($id_menu<>6) && ($id_menu<>7))
	{
		$id_pengguna=$_SESSION['id_pengguna'];
		$nama_menu=$_POST['nama'];
		$id_menu=$_POST['id_menu'];
		$link_file = $_POST['link'];
        $link_ext= strtolower(end(explode('.', $link_file)));
		$urutan = $_POST['urutan'];
		$judul = $_POST['judul'];
		$ucjudul=strtoupper($judul);
		$isi = $_POST['isi'];	
		$tgl = date("Y-n-d");
	}
	else
	{
		$id_pengguna=$_SESSION['id_pengguna'];
		$id_menu=$_POST['id_menu'];
		$urutan = $_POST['urutan'];
		$tgl = date("Y-n-d");
	}
	if (!empty($isi))
	{
	if (($id_menu<>'1') && ($id_menu<>'2') && ($id_menu<>'3') && ($id_menu<>'4') && ($id_menu<>'5') && ($id_menu<>'6') && ($id_menu<>'7'))
	{
		if (ctype_alnum($link_file))
		{
			$insert = "update cms_menu set
						nama_menu='$nama_menu',
						link_file='$link_file',
						title='$judul',
						isi='$isi',
						id_order_urutan='$urutan',
						date='$tgl',
						id_pengguna='$id_pengguna'
						where id_menu='$id_menu'";
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
					
					include("../redirectview_update.php"); 
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
					echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_menu.php?id_menu=$id_menu'>";
			}
		}
		else
		{
			include("../redirectview_link.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_menu.php?id_menu=$id_menu'>";
		}
	}
	else
	{
		$insert = "update cms_menu set
					id_order_urutan='$urutan',
					date='$tgl',
					id_pengguna='$id_pengguna'
					where id_menu='$id_menu'";
		$res=mysql_query($insert);
		if($res)
		{
				include("../redirectview_update.php"); 
				echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=menu_list.php'>";
		}
		else
		{
			include("../redirectview_gagal.php"); 
			echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_menu.php?id_menu=$id_menu'>";
		}
	}
	}
	else
	{
		include("../redirectview_kosong.php"); 
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=edit_menu.php?id_menu=$id_menu'>";
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