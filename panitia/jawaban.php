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
						<b><font size="+1">ANSWER LIST</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_jawaban_kuesioner
									order by id_jawaban_kuesioner";
							$res = mysql_query($sql);
						?>	
				</td>	
			</tr>
			<tr>
				<td colspan="5">
					<a href="add_jawaban.php"><img src="../gambar/add.png" width="25" title="Add Answer"></a>
				</td>
				<td>
						<?php
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of answer</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=50%>
					<tr bgcolor="#CCCCCC">
						<th>ID</th>
						<th>Index</th>
						<th>Explanation</th>
						<th colspan="2">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of answer not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id = $select_result['id_jawaban_kuesioner'];
									$jawaban=$select_result['pilihan_jawaban'];
									$ket=ucwords($select_result['ket']);
									echo "
									<tr>
										<td align='center'>$id</td>
										<td align='center'>$jawaban</td>
										<td align='center'>$ket</td>
										<form method=\"POST\" action=\"edit_jawaban.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id_jawaban\">
											<input type='image' title='Edit Questionnaire' src='../gambar/edit.png' width='25'>
										</td>
										</form>
										<form method=\"POST\" action=\"delete_jawaban.php?id=$id\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id\" name=\"id_jawaban\">
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