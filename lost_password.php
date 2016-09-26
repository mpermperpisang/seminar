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
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="text/css" href="css/css.css" rel="stylesheet">	
		<title>FORGOT PASSWORD</title>
    </head>
    <body background="gambar/<?php echo "$satu"; ?>" onLoad="self.focus();document.form1.email.focus()">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/js_form_password.js"></script>
		<?php include ('header.php'); 
			$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=2";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{								
				$dua=$select_result['isi_template'];
			}
			echo "$dua";
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=3";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$tiga=$select_result['isi_template'];
				}
				echo "$tiga";
			?>
			FORGOT PASSWORD FACILITY
			<?php
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=13";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$tigabelas=$select_result['isi_template'];
				}
				echo "$tigabelas";
			?>
			<form action="" method="post" name="form1">
				<table width="40%" border="0" cellspacing="2" cellpadding="2">
      					<tr>
        					<td>Email</td>
        					<td>:</td>
       						<td>
        						<input name="email" type="text" maxlength="50" class="input_email"/>
        					</td>
      					</tr>
      					<tr>
        					<td>Username</td>
        					<td>:</td>
       						<td>
        						<input name="username" type="text" maxlength="20" class="input_username"/>
        					</td>
      					</tr>
      					<tr>
        					<td colspan="3" align="center">
							<input type="submit" class='tombol' value="Request Password" onClick="return aksi_daftar();"/>
				<?php
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=7";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$tujuh=$select_result['isi_template'];
				}
				echo "$tujuh";
															?>
											</form>
											<?php
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=14";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$empatbelas=$select_result['isi_template'];
				}
				echo "$empatbelas";	
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