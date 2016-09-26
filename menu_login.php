<div id="right-side">
	<div id="login-box">	
		<div class="header">		
			User Login
			<p>
			<?php 
				if(isset($_SESSION['login_member']))
				{
					if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="1")&&($_SESSION['username']))
						{			
							echo "Welcome, ".$_SESSION['nama'];
						}
				} 
				else
				{
					echo "<font size='-1'>Welcome, Guest. Please Login to See Your Dashboard</font?";
				}
			?>
			</p>
		</div>				
	</div>
	<div id="adv"></div>
</div>	
<br /><br /><br />
<div id="menu">
	<table border="0" width=75% height="100" align="center" bgcolor="#FFFFFF">
		<tr>
			<td>
				<?php form_login(); 
				$sql3 = "select * from cms_tahun
						where kode_aktif='1'";
				$query3 = mysql_query($sql3);
				$banyakrecord3=mysql_num_rows($query3);
				if($banyakrecord3>0)
				{
					while($select_result = mysql_fetch_array($query3))
					{
						$tgl_akhir = $select_result['tgl_akhir'];
					}
					$tgl_now=date('Y-m-d');
					if ($tgl_now<>$tgl_akhir)
					{
				?>
				<a href="daftar_akun.php"><font size="2"><center><b>Create an Account For Participant</b></center></font></a>
				<?php
					} 
				} 
				?>
				<a href="lost_password.php"><font size="2"><center><b>Forgot Password?</b></center></font></a>
				<a href="konfirm.php"><font size="2"><center><b>Did Not Receive a Confirmation Email?</b></center></font></a>
			</td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
	<?php
	$sql = "select * from cms_postingan
			where kategori_posting='1'";
	$res = mysql_query($sql);
	$banyakrecord=mysql_num_rows($res);
	if($banyakrecord>0)
	{
		while($select_result = mysql_fetch_array($res))
		{								
			$judul = $select_result['judul'];
			$upjudul=strtoupper($judul);
			$content=$select_result['content'];
			$uccontent=ucfirst($content);
		}
		?>
				<tr align="center">
					<td background="gambar/headerbg.jpg" height="41"><?php echo "<b><font color='white'>$upjudul</font</b>"; ?></td>
				</tr>
				<tr align="center">
					<td><?php echo "$uccontent"; ?></td>
				</tr>
	<?php
	}
	else
	{
		echo "there is no announcement";
	}
	?>
	</table>
</div>