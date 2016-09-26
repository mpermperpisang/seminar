<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>COMMITTEE PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td>
					<p align="justify">
						<b><font size="+1">EDIT QUESTIONNAIRE</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$id=@$_REQUEST['id_kuesioner'];
							if (($id>0) && (ctype_alnum($id)))
							{
							$sql = "select * from cms_kuesioner where id_kuesioner='$id'";
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
								while($select_result = mysql_fetch_array($res))
								{
									$id_kuesioner = $select_result['id_kuesioner'] ;
									$pertanyaan = $select_result['pertanyaan'] ;
									$id_urutan_pertanyaan = $select_result['id_urutan_pertanyaan'] ;
								}
								echo"
								<form action='update_kuesioner.php' method='POST'>
								<table border=\"0\" width=\"50%\" cellpadding=\"5\" cellspacing=\"5\" align=\"left\" bgcolor=\"#FFFFF\">
								";
							?>
								<input type="hidden" name="id_kuesioner" size="30" value="<?php echo $id_kuesioner ; ?>"/>
							<?php
								echo"
									<tr>
										<td>ID</td>
										<td>
											$id
										</td>
									</tr>
									<tr>
										<td>Question</td>
										<td>
											<input type='text' name='pertanyaan' size='50' maxlength='200' value='$pertanyaan' required/>
										</td>
									</tr>
									<tr>
										<td>Sequence Appears</td>
										<td>
											<select name='urutan' required>
												<option value='$id_urutan_pertanyaan' required>$id_urutan_pertanyaan</option>
												<option value=''>----------</option>
								";
												$link=koneksi_db();
												$res=mysql_query("SELECT * FROM cms_order_urutan where id_order_urutan not in ('$id_urutan_pertanyaan') order by id_order_urutan");
												while($data=mysql_fetch_array($res))
												{
													echo "<option required value=\"".$data['id_order_urutan']."\">".$data['order_urutan']."</option>";
												}
								echo "
											</select>
										</td>
									</tr>
									<tr>
										<td align='right'>
											<input type='image' src='../gambar/update.jpg' width='25' name='cancel' title='Edit Questionnaire'>
										</td>
								</form>
								<form action='kuesioner.php'>
										<td align='left'>
											<input type='image' src='../gambar/cancel.jpg' width='25' name='cancel' title='Cancel'>
										</td>
								</form>
									</tr>
								</table>";
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
					</p>
				</td>
			</tr>
		</table>
		<?php include('../footer.php'); ?>
	</body>
</html>
<?php
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