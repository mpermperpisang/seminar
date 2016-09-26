<?php
	include('include/library.php');
	$link=koneksi_db();						
	$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=1";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$satu=$select_result['isi_template'];
	}
if(isset($_SESSION['login_member']))
{
	if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="1"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=peserta/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="2"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=admin/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="3"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=panitia/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="4"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=reviewer/index.php'>";
	}
	else if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="5"))
	{
		include("redirectview_index.php");
		echo "<meta http-equiv='refresh' content='1;url=pimpinan/index.php'>";
	}
}
else
{
?>
<html>
	<head>
		<link type="text/css" href="css/css.css" rel="stylesheet">	
		<title>CALL FOR PAPERS</title>
    </head>
    <body background="gambar/<?php echo "$satu"; ?>" onLoad="self.focus();document.form1.username.focus()">
		<?php include ('header.php'); 
							
	$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=2";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$dua=$select_result['isi_template'];
	}
	echo "$dua";
						
								$sql = "select * from cms_postingan
								where kategori_posting='3'";
								$res = mysql_query($sql);
								while($select_result = mysql_fetch_array($res))
								{								
									$judul = $select_result['judul'];
									$upjudul=strtoupper($judul);
									$content=$select_result['content'];
									
					$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=3";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$tiga=$select_result['isi_template'];
	}
	echo "$tiga";
				?>
			<div class='share'>
<span style='float:left;margin-right:15px;margin-top:1px'>Share on</span>
<a class='share_facebook' href='https://www.facebook.com/sharer.php?u=http://seminar-penelitian.com/call_for_papers.php' onclick='window.open(this.href,"_blank","height=430,width=640");return false;' rel='nofollow' title='Share to Facebook'>Facebook</a>
<a class='share_google' href='https://plus.google.com/share?url=http://seminar-penelitian.com/call_for_papers.php' onclick='window.open(this.href,"_blank","height=600,width=530");return false;' rel='nofollow' title='Share to Google+'>Google+</a>
<a class='share_twitter' href='https://twitter.com/share?url=http://seminar-penelitian.com/call_for_papers.php' onclick='window.open(this.href,"_blank","height=430,width=640");return false;' rel='nofollow' title='Share to Twitter'>Twitter</a>
</div>
				<?php
	 echo "$upjudul";
	 
	 $sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=4";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$empat=$select_result['isi_template'];
	}
	echo "$empat";
	echo "$content"; } 
	$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=8";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$delapan=$select_result['isi_template'];
	}
	echo "$delapan";?>
							<?php			
								$link=koneksi_db();			
								$sql = "select * from cms_postingan
								where kategori_posting='4'";
								$res = mysql_query($sql);
								while($select_result = mysql_fetch_array($res))
								{								
									$judul = $select_result['judul'];
									$upjudul=strtoupper($judul);
									$content=$select_result['content'];
									
									$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=9";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$sembilan=$select_result['isi_template'];
	}
	echo "$sembilan";
							?>
								<?php echo "$upjudul"; 
								
								$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=4";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$empat=$select_result['isi_template'];
	}
	echo "$empat";?>
								<?php echo "$content"; } 
								
								$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=8";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$delapan=$select_result['isi_template'];
	}
	echo "$delapan";?>
							<?php			
								$link=koneksi_db();			
								$sql = "select * from cms_postingan
								where kategori_posting='5'";
								$res = mysql_query($sql);
								while($select_result = mysql_fetch_array($res))
								{								
									$judul = $select_result['judul'];
									$upjudul=strtoupper($judul);
									$content=$select_result['content'];
							
							$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=9";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$sembilan=$select_result['isi_template'];
	}
	echo "$sembilan";?>
								<?php echo "$upjudul"; 
								
								$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=4";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$empat=$select_result['isi_template'];
	}
	echo "$empat";?>
								<?php echo "$content"; } 
								
								$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=8";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$delapan=$select_result['isi_template'];
	}
	echo "$delapan";?>
							<?php			
								$link=koneksi_db();			
								$sql = "select * from cms_postingan
								where kategori_posting='6'";
								$res = mysql_query($sql);
								while($select_result = mysql_fetch_array($res))
								{								
									$judul = $select_result['judul'];
									$upjudul=strtoupper($judul);
									$content=$select_result['content'];
							
							$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=9";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$sembilan=$select_result['isi_template'];
	}
	echo "$sembilan";?>	
								<?php echo "$upjudul"; 
								
								$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=10";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$sepuluh=$select_result['isi_template'];
	}
	echo "$sepuluh";?>
								<?php echo "$content"; } 
								
								$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=8";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$delapan=$select_result['isi_template'];
	}
	echo "$delapan";?>
							<?php	
							
							$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=9";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$sembilan=$select_result['isi_template'];
	}
	echo "$sembilan";
								 
			
			$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=6";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$enam=$select_result['isi_template'];
	}
	echo "$enam";?>
	<?php include('menu_login.php'); 
	
	$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=7";
	$res = mysql_query($sql);
	while($select_result = mysql_fetch_array($res))
	{								
		$tujuh=$select_result['isi_template'];
	}
	echo "$tujuh";?>
	
		<?php include('footer.php'); ?>
	</body>
</html>
<?php
}
?>