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
		<script>
		function confirmSubmit() 
		{
			var msg;
			msg= "Are you sure want to delete this data ?";
			var agree=confirm(msg);
			if (agree)
			return true ;
			else
			return false ;
		}
		</script>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="6">
					<p align="justify">
						<b><font size="+1">QUESTIONNAIRE LIST</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_kuesioner,cms_tahun
									where cms_kuesioner.id_tahun=cms_tahun.id_tahun
									and cms_tahun.kode_aktif='1'
									order by id_urutan_pertanyaan";
							$res = mysql_query($sql);
						?>	
				</td>	
			</tr>
			<tr>
				<td colspan="5">
					<a href="add_kuesioner.php"><img src="../gambar/add.png" width="25" title="Add Questionnaire"></a>
					<a href="add_urutan.php"><img src="../gambar/sequence.png" width="25" title="Add Sequence"></a>
				</td>
				<td>
						<?php
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of questionnaire</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Question</th>
						<th>Sequence Appears</th>
						<th colspan="2">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of questionnaire not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_kuesioner'];
									$pertanyaan=$select_result['pertanyaan'];
									$id_urutan_pertanyaan=$select_result['id_urutan_pertanyaan'];
									echo "
									<tr>
										<td align='center'>$id</td>
										<td>$pertanyaan</td>
										<td align='center'>$id_urutan_pertanyaan</td>
										<form method=\"POST\" action=\"edit_kuesioner.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id_kuesioner\">
											<input type='image' title='Edit Questionnaire' src='../gambar/edit.png' width='25'>
										</td>
										</form>
										<form method=\"POST\" action=\"delete_kuesioner.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id_kuesioner\">
											<input type='image' title='Delete Reviewer' src='../gambar/delete.png' width='25' onclick='return confirmSubmit()'>
										</td>
										</form>
									</tr>";
								}
						?>
					</p>
				</td>
			</tr>
		</table>
		<table align="right">
			<tr align="right">
				<td>
					<div class="backtotop">
						<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top">
							Back to Top
						</a>
					</div>
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