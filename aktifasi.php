<?php
	include('include/library.php');
	include('include/aktifasi_email.php');
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
		<title>ACTIVATION ACCOUNT</title>
    </head>
    <body background="gambar/<?php echo "$satu"; ?>">
		<?php include ('header.php'); 
			$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=2";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{								
				$dua=$select_result['isi_template'];
			}
			echo "$dua";
				$sql2 = "select * from cms_template where kode_aktif=1 and urutan_tampil=3";
				$res2 = mysql_query($sql2);
				while($select_result2 = mysql_fetch_array($res2))
				{								
					$tiga=$select_result2['isi_template'];
				}
				echo "$tiga";
				?>
					ICO - APICT 2013
						<?php	 
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=4";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$empat=$select_result['isi_template'];
				}
				echo "$empat";						
							@$kode = secure_input($_GET['kode']);
							//echo $kode."<br />";
							
							$cek = cek_kode_aktifasi($kode);
							//echo $cek."<br />";
							
							if($cek == 1){
								$sql = "update cms_pengguna set id_kategori_pengguna=1 where kode_email = '$kode'";
								mysql_query($sql);
								$sql2="select * from cms_pengguna where kode_email='$kode'";
								$res = mysql_query($sql2);
								while($select_result = mysql_fetch_array($res))
								{
									$nama=$select_result['nama_pengguna'];	
									$uc=ucwords($nama);	 
								echo "Thank you "; echo $uc; echo" for activation of your account<br />";
								echo "Please login to fill the content of your account";
								}						
							}else{
								echo "Your account has been activated. Please login to fill the content of your account";
							}
						
			$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=6";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{								
				$enam=$select_result['isi_template'];
			}
			echo "$enam";
			?>
						<?php include('menu_login.php'); 
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=7";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{								
				$tujuh=$select_result['isi_template'];
			}
			echo "$tujuh";
			?>
		<?php include('footer.php'); ?>
	</body>
</html>
<?php
}
?>