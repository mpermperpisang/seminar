<?php
	include('../include/library.php');
	$link=koneksi_db();
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>COMMITTEE PAGE</title><html>
	<head>
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/js_kuesioner/highcharts.js"></script>
		
		<!-- 1a) Optional: add a theme file -->
		<!--
			<script type="text/javascript" src="../js/themes/gray.js"></script>
		-->
		
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="../js/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			/**
			 * Visualize an HTML table using Highcharts. The top (horizontal) header 
			 * is used for series names, and the left (vertical) header is used 
			 * for category names. This function is based on jQuery.
			 * @param {Object} table The reference to the HTML table to visualize
			 * @param {Object} options Highcharts options
			 */
			Highcharts.visualize = function(table, options) {
				// the categories
				options.xAxis.categories = [];
				$('tbody th', table).each( function(i) {
					options.xAxis.categories.push(this.innerHTML);
				});
				
				// the data series
				options.series = [];
				$('tr', table).each( function(i) {
					var tr = this;
					$('th, td', tr).each( function(j) {
						if (j > 0) { // skip first column
							if (i == 0) { // get the name and init the series
								options.series[j - 1] = { 
									name: this.innerHTML,
									data: []
								};
							} else { // add values
								options.series[j - 1].data.push(parseFloat(this.innerHTML));
							}
						}
					});
				});
				
				var chart = new Highcharts.Chart(options);
			}
				
			// On document ready, call visualize on the datatable.
			$(document).ready(function() {			
				var table = document.getElementById('datatable'),
				options = {
					   chart: {
					      renderTo: 'container',
					      defaultSeriesType: 'column'
					   },
					   title: {
					      text: 'Questionnaire Graphic'
					   },
					   xAxis: {
					   },
					   yAxis: {
					      title: {
					         text: 'Answer Total'
					      }
					   },
					   tooltip: {
					      formatter: function() {
					         return '<b>'+ this.series.name +'</b><br/>'+
					            this.y +' '+ this.x.toLowerCase();
					      }
					   }
					};
				
			      					
				Highcharts.visualize(table, options);
			});
				
		</script>
	</head>
</html>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<table border=0 width=100% align="left">	
			<tr>
				<td colspan="6">
					<p align="justify">
						<b><font size="+1">QUESTIONNAIRE DASHBOARD</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>	
			</tr>
		</table>
		<?php include ('menu_view.php'); ?>
		<div id="container" style="width: 100%; height:350px; margin:auto"></div>
		<table align="left">
		<thead>
			<tr bgcolor="#CCCCCC">
				<th>Question</th>
			</tr>
		</thead>
		<tbody>
            <?php
                $sql_jumlah   = "SELECT * from cms_kuesioner,cms_tahun
								 where cms_kuesioner.id_tahun=cms_tahun.id_tahun
								 and cms_tahun.kode_aktif='1'
								 order by id_urutan_pertanyaan";        
                $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
				while($row=mysql_fetch_array($query_jumlah))
				{
					$id_urutan_pertanyaan=$row['id_urutan_pertanyaan'];
					$pertanyaan=$row['pertanyaan'];
					$angka2=$row['id_kuesioner'];
				?>
			<tr>
				<td><?php echo "$id_urutan_pertanyaan. $pertanyaan"; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
		</table>
		<table id="datatable" class="datatable" width="50%" align="right">
		<thead>
        <tr>
            <th width="25%">Number</th>
			<?php  
					echo "<th>A</th><th>B</th><th>C</th><th>D</th><th>E</th>";
			?>
    	</tr>
		</thead>
		<tbody>
            <?php
                $sql_jumlah   = "SELECT * from cms_kuesioner,cms_tahun
								 where cms_kuesioner.id_tahun=cms_tahun.id_tahun
								 and cms_tahun.kode_aktif='1'
								 order by id_urutan_pertanyaan";        
                $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
				while($row=mysql_fetch_array($query_jumlah))
				{
					$id_urutan_pertanyaan=$row['id_urutan_pertanyaan'];
					$pertanyaan=$row['pertanyaan'];
					$angka2=$row['id_kuesioner'];
				?>
				<tr>
					<th><div align="center"><?php echo $id_urutan_pertanyaan;?></div></th>
				<?php
					for ($i=0;$i<=4;$i++)
					{
					$angka=$i+1;
						
					$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
									  WHERE jawaban_kuesioner='$angka' 
									  and kuesioner_jawaban.id_kuesioner='$angka2'
									  and cms_kuesioner.id_kuesioner=kuesioner_jawaban.id_kuesioner
									  and cms_kuesioner.id_tahun=cms_tahun.id_tahun
									  and cms_tahun.kode_aktif='1'";
					$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
					while($row2=mysql_fetch_array($query_jumlah2))
					{
						$jumlah=$row2['jumlah'];
				?>
					<td align="center"><?php echo "$jumlah"; ?></td>
				<?php
					}
					}
				?>
				</tr>
				<?php
				}
				?>
		</tbody>
		</table>
		<table width="50%" align="right">
				<tr bgcolor="#CCCCCC">
					<th align="center" width="25%">Index</th>
					<th align="center">A</th>
					<th align="center">B</th>
					<th align="center">C</th>
					<th align="center">D</th>
					<th align="center">E</th>
				</tr>
            	<tr bgcolor="#CCCCCC">
					<th align="center" width="25%">
						Total
					</th>
					<td align="center">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='1'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							echo "$jumlah";
						?>
					</td>
					<td align="center">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='2'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							echo "$jumlah";
						?>
					</td>
					<td align="center">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='3'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							echo "$jumlah";
						?>
					</td>
					<td align="center">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='4'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							echo "$jumlah";
						?>
					</td>
					<td align="center">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='5'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							echo "$jumlah";
						?>
					</td>
				</tr>
            	<tr bgcolor="#CCCCCC">
					<th align="center" width="25%">
						Value
					</th>
					<td align="center">
						5
					</td>
					<td align="center">
						4
					</td>
					<td align="center">
						3
					</td>
					<td align="center">
						2
					</td>
					<td align="center">
						1
					</td>
				</tr>
            	<tr bgcolor="#CCCCCC">
					<th align="center" width="25%">
						Calculation
					</th>
					<td align="center" width="15%">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='1'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah=$jumlah*5;
							echo "$jumlah";
						?>
					</td>
					<td align="center" width="15%">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='2'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah=$jumlah*4;
							echo "$jumlah";
						?>
					</td>
					<td align="center" width="15%">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='3'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah=$jumlah*3;
							echo "$jumlah";
						?>
					</td>
					<td align="center" width="15%">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='4'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah=$jumlah*2;
							echo "$jumlah";
						?>
					</td>
					<td align="center" width="15%">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='5'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah=$jumlah*1;
							echo "$jumlah";
						?>
					</td>
				</tr>
            	<tr bgcolor="#CCCCCC">
					<td align="center" width="25%" colspan="3">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='1'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah1=$jumlah*5;
							
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='2'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah2=$jumlah*4;
							
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='3'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah3=$jumlah*3;
							
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='4'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah4=$jumlah*2;
							
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											WHERE jawaban_kuesioner='5'
											and kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
							while($row2=mysql_fetch_array($query_jumlah2))
							{
							$jumlah=$row2['jumlah'];
							}
							$jumlah5=$jumlah*1;
							
							$total=$jumlah1+$jumlah2+$jumlah3+$jumlah4+$jumlah5;
							
							echo "Total of Answer : $total ";	
						?>
					</td>
					<td align="center" width="25%" colspan="3">
						<?php
							$sql_jumlah2   = "SELECT count(jawaban_kuesioner) as jumlah FROM kuesioner_jawaban,cms_kuesioner,cms_tahun
											where kuesioner_jawaban.id_kuesioner=cms_kuesioner.id_kuesioner
											and cms_tahun.id_tahun=cms_kuesioner.id_tahun
											and cms_tahun.kode_aktif='1'";  
							$query_jumlah2 = mysql_query( $sql_jumlah2 ) or die(mysql_error());
								while($row2=mysql_fetch_array($query_jumlah2))
								{
								$jumlah=$row2['jumlah'];
								}
								$jumlah=$jumlah*5;
								
								echo "Total of Overall : $jumlah";
						?>
					</td>
				</tr>
				<?php
				$sql = "select * from kuesioner_jawaban";
				$res = mysql_query($sql);
				$banyakrecord=mysql_num_rows($res);
				if($banyakrecord>0)
				{
				?>
            	<tr bgcolor="#CCCCCC">
					<td align="center" width="25%" colspan="6">
						Prosentase
						<?php
							if (($total>0) and ($jumlah>0))
							{
								$persentase=(($total/$jumlah) * 100);
							}
							else
							{
								$persentase='0';
							}
							echo " : $persentase %";
						?>
					</td>
				</tr>
            	<tr bgcolor="#CCCCCC">
					<td align="center" width="25%" colspan="6">
						<?php
							if (($persentase>=0) && ($persentase<=20))
							{
								echo "<b>Participant totally disagree with performance of research seminar</b>";
							}
							else if (($persentase>20) && ($persentase<=40))
							{
								echo "<b>Participant disagree with performance of research seminar</b>";
							}
							else if (($persentase>40) && ($persentase<=60))
							{
								echo "<b>Participant netral disagree with performance of research seminar</b>";
							}
							else if (($persentase>60) && ($persentase<=80))
							{
								echo "<b>Participant agree with performance of research seminar</b>";
							}
							else if (($persentase>80) && ($persentase<=100))
							{
								echo "<b>Participant totally agree with performance of research seminar</b>";
							}
						?>
					</td>
				</tr>
				<?php
				}
				?>
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