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
		<title>EMAIL PROBLEM</title>
    </head>
    <body background="gambar/<?php echo "$satu"; ?>" onLoad="self.focus();document.form1.username.focus()">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/js_form_konfirm.js"></script>
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
				echo "$tiga";?>
				TELL ADMIN WHAT IS YOUR EMAIL CONFIRMATION PROBLEM
				<?php
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=13";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$tigabelas=$select_result['isi_template'];
				}
				echo "$tigabelas";?>
											<form action="" method="post" name="form1">
												<table width=75% height=50% border="0" cellspacing="2" cellpadding="2">
      												<tr>
        												<td>Username that you submit</td>
        												<td>:</td>
        												<td>
															<input name="username" type="text" class="input_username" size="50" maxlength="20" required/>
														</td>
													</tr>
													<tr>
       													<td>Email that you submit</td>
        												<td>:</td>
        												<td>
        													<input name="email" type="text" class="input_email" size="50" maxlength="50" required/>
        												</td>
      												</tr>
													<tr>
       													<td>Problem</td>
        												<td>:</td>
        												<td>
															<select name="masalah" class="input_masalah" required>
																<option value="" required>Choose What's Your Problem</option>
																<option value="" required>----------</option>
																<option value="1" required>Not accept email account confirmation</option>
																<option value="2" required>Not accept email password confirmation</option>
															</select>
        												</td>
      												</tr>
      												<tr>
        												<td colspan="3" align="center">
															<input type="submit" class='tombol' value="Submit" onClick="return aksi_daftar();"/>
        													<input type="button" onClick="javascript:history.back()" value="Cancel" class="tombol" title="Back to previous page">
															<?php
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=7";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$tujuh=$select_result['isi_template'];
				}
				echo "$tujuh";?>
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