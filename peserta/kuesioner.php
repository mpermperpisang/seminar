<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>PARTICIPANT PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="center">	
			<tr>
				<td colspan="3">
					<p align="justify">
						<b><font size="+1">QUESTIONNAIRE</font></b>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php
							$link=koneksi_db();	
							$id_pengguna=$_SESSION['id_pengguna'];
							$id_urutan_pertanyaan=$_REQUEST['id_urutan_pertanyaan'];
							if (($id_urutan_pertanyaan>0) && (ctype_alnum($id_urutan_pertanyaan)))
							{		
						?>	
					</p>
				</td>
			</tr>
		</table>
		<table align="center">
			<tr>
				<td align='left'>Totally Agree</td>
				<td align='center'>A</td>
			</tr>
			<tr>
				<td align='left'>Agree</td>
				<td align='center'>B</td>
			</tr>
			<tr>
				<td align='left'>Netral</td>
				<td align='left'>C</td>
			</tr>
			<tr>
				<td align='left'>Disagree</td>
				<td align='center'>D</td>
			</tr>
			<tr>
				<td align='left'>Totally Disagree</td>
				<td align='center'>E</td>
			</tr>
		</table>
		<?php		
			$sqla = "select * from cms_kuesioner,cms_tahun
					where cms_kuesioner.id_tahun=cms_tahun.id_tahun
					and cms_tahun.kode_aktif='1'";
			$querya = mysql_query($sqla,$link);	
			while($select_resulta = mysql_fetch_array($querya))
			{
				$i=$select_resulta['id_urutan_pertanyaan'];
			}
			$banyakrecord=mysql_num_rows($querya);
			if($banyakrecord>0)
			{	
				$sql = "select * from cms_kuesioner,cms_tahun 
						where id_urutan_pertanyaan='$id_urutan_pertanyaan'
						and cms_kuesioner.id_tahun=cms_tahun.id_tahun
						and cms_tahun.kode_aktif='1'";
				$res = mysql_query($sql);
				$banyakrecord_kuis=mysql_num_rows($res);
				if($banyakrecord_kuis>0)
				{					
					$sql3 = "select id_urutan_pertanyaan from cms_kuesioner,cms_tahun 
							where cms_kuesioner.id_tahun=cms_tahun.id_tahun
							and cms_tahun.kode_aktif='1'
							order by id_urutan_pertanyaan desc limit 1";
					$res3 = mysql_query($sql3);	
					$i=1;
					$banyakrecord=mysql_num_rows($querya);
					while($select_result3 = mysql_fetch_array($res3))
					{
						$i=$select_result3['id_urutan_pertanyaan'];
					}	
					$id_pengguna=$_SESSION['id_pengguna'];
					$sql2 = "select * from kuesioner_jawaban,cms_peserta,cms_tahun
							where kuesioner_jawaban.id_pengguna=cms_peserta.id_pengguna
							and kuesioner_jawaban.id_pengguna='$id_pengguna'
							and cms_peserta.id_tahun=cms_tahun.id_tahun
							and cms_tahun.kode_aktif='1'";
					$query2 = mysql_query($sql2,$link);	
					$banyakrecord2=mysql_num_rows($query2);
					if($banyakrecord2<$banyakrecord)
					{	
		?>
		<br><br>
		<form action="insert_kuesioner.php" method="post">
		<table border=0 align="center">	
			<tr>
				<td width="125" align="center">
					<?php
						while($select_result = mysql_fetch_array($res))
						{
							$id_kuesioner=$select_result['id_kuesioner'];
							$id_pertanyaan=$select_result['id_urutan_pertanyaan'];
							$pertanyaan=$select_result['pertanyaan'];
						}
					?>
					Question <?php echo "$id_pertanyaan"; ?>
					<input type="hidden" value="<?php echo "$id_pertanyaan" ?>" name="id_urutan_pertanyaan">
					<input type="hidden" value="<?php echo "$id_kuesioner" ?>" name="id_kuesioner">
				</td>
				<td colspan="5" align="left">
					<?php echo "$pertanyaan"; ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					A&nbsp;<input type="radio" name="jawaban_kuesioner" value="1" required>
				</td>
				<td>
					B&nbsp;<input type="radio" name="jawaban_kuesioner" value="2" required>
				</td>
				<td>
					C&nbsp;<input type="radio" name="jawaban_kuesioner" value="3" required>
				</td>
				<td>
					D&nbsp;<input type="radio" name="jawaban_kuesioner" value="4" required>
				</td>
				<td>
					E&nbsp;<input type="radio" name="jawaban_kuesioner" value="5" required>
				</td>
			</tr>
			<tr>
				<td colspan="6" align="center">
					<input type='image' src='../gambar/apply.jpg' width='25' name='kirim' title='Fill Questionnaire'>
				</td>
			</tr>
		</table>
		</form>
		<?php
					}
					else
					{
						echo "<br><br><h3><p align='center'>You have filled out the questionnaire before. Thank you</p></h3>";
					}
				}
				else
				{
					echo "<h3><p align='center'>There is no question with number of questionnaire is $id_urutan_pertanyaan.<br><br>Please move to the next question</p></h3>";
					$id_urutan_pertanyaan=$id_urutan_pertanyaan+1;
					echo "
					<table align='center'>
						<tr>
							<td>
								<form method=\"POST\" action=\"kuesioner.php?id_urutan_pertanyaan=$id_urutan_pertanyaan\">
										<input type=\"hidden\" value=\"$id_urutan_pertanyaan\" name=\"id_urutan_pertanyaan\">
										<input type='image' src='../gambar/next.png' width='25' name='kirim' title='Fill Questionnaire'>
								</form>
							</td>
						</tr>
					</table>";
				}
			}
			else
			{
				echo "<h3><p align='center'>There is no questionnaire that has been submitted by committee. Please wait. Thank you</p></h3>";
			}
		}
		else
		{
			echo"
			<table border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"5\" align=\"center\" bgcolor=\"#FFFFF\">
				<tr align='center'>
					<td>
						<img src='../gambar/forbidden.jpg'>
					</td>
				</tr>
			</table>
			";
		}
		?>
		<?php include('../footer.php'); ?>
	</body>
</html>
<?php
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