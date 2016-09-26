<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>HEADSHIP PAGE</title><html>
	<head>
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Research Seminar Participant Graphic'
         },
         xAxis: {
            categories: ['Category of Participant']
         },
         yAxis: {
            title: {
               text: 'Participant Total'
            }
         },
              series:             
            [
			
            <?php 
			$link=koneksi_db();	
            $sql   = "SELECT distinct kategori_peserta FROM cms_peserta,cms_tahun
					where cms_peserta.id_tahun=cms_tahun.id_tahun
					and cms_tahun.kode_aktif='1'";
            $query = mysql_query( $sql,$link)  or die(mysql_error());
            while($ret = mysql_fetch_array($query) )
			{	      	
				$angka = $ret['kategori_peserta'];
				$sql2 = "select kategori_peserta from cms_peserta where kategori_peserta='$angka'";
				$res = mysql_query($sql2);
				while($select_result = mysql_fetch_array($res))
				{
             		$kategori_peserta=$select_result['kategori_peserta'];     
					if ($kategori_peserta=='1')
					{
						$merek='Participant With Paper';
					}
					if ($kategori_peserta=='2')
					{
						$merek='Participant Without Paper';
					}     
				}  
				 
				
            	$merek2=$ret['kategori_peserta'];                                   
                $sql_jumlah   = "SELECT count(*) as jumlah FROM cms_peserta,cms_tahun WHERE kategori_peserta='$merek2' and cms_tahun.kode_aktif='1' and cms_peserta.id_tahun=cms_tahun.id_tahun";        
                $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                while( $data = mysql_fetch_array( $query_jumlah ) )
				{
                    $jumlah = $data['jumlah'];                 
                }             
			?>
                {
                     name: '<?php echo $merek; ?>',
                     data: [<?php echo $jumlah; ?>]
                },
            <?php } ?>
            ]
      });
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
						<b><font size="+1">PARTICIPANT DASHBOARD</font></b>
						<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>	
			</tr>
		</table>
		<?php include ('menu_view.php'); ?>
		<table align="center" border="0" cellpadding="5" width=100%>
			<div id='container' style="width: 95%; height:350px; margin:auto"></div>
		</table>
		<table align="center" border="0" cellpadding="5" width=75%>
				<?php
					$sql="select * from cms_peserta,cms_tahun
							where cms_peserta.kategori_peserta=1
							and cms_peserta.id_tahun=cms_tahun.id_tahun
							and cms_tahun.kode_aktif='1'";
					$query = mysql_query($sql);
					$banyakrecord=mysql_num_rows($query);
					$sql2="select * from cms_peserta,cms_tahun
							where cms_peserta.kategori_peserta=2
							and cms_peserta.id_tahun=cms_tahun.id_tahun
							and cms_tahun.kode_aktif='1'";
					$query2 = mysql_query($sql2);
					$banyakrecord2=mysql_num_rows($query2);
					
					if ($banyakrecord>$banyakrecord2)
					{
						$ket='Implementation of Research Seminar is Succesful for Collect Participant With Paper';
					}
					else if ($banyakrecord<$banyakrecord2)
					{
						$ket='Implementation of Research Seminar is Unsuccesful for Collect Participant With Paper';
					}
					else
					{
						$ket='Implementation of Research Seminar is Equal';
					}
				?>
			<tr bgcolor="#CCCCCC" align="center">
				<td colspan="3"><?php echo "$ket"; ?></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr bgcolor="#CCCCCC" align="center">
				<td><b>Year</b></td>
				<td><b>Total Participant With Paper</b></td>
				<td><b>Total Participant Without Paper</b></td>
			</tr>
			<?php
			$sql2="select * from cms_tahun
					order by bil_tahun desc";
			$query2 = mysql_query($sql2);
			while($select_result2 = mysql_fetch_array($query2))
			{
				$tahun=$select_result2['bil_tahun'];
				$id_tahun=$select_result2['id_tahun'];
				
				$sql3="select * from cms_peserta,cms_tahun
						where cms_peserta.id_tahun=cms_tahun.id_tahun
						and cms_peserta.id_tahun='$id_tahun'
						and cms_peserta.kategori_peserta=1";
				$query3 = mysql_query($sql3);					
				$banyakrecord3=mysql_num_rows($query3);
				
				$sql4="select * from cms_peserta,cms_tahun
						where cms_peserta.id_tahun=cms_tahun.id_tahun
						and cms_peserta.id_tahun='$id_tahun'
						and cms_peserta.kategori_peserta=2";
				$query4 = mysql_query($sql4);
				$banyakrecord4=mysql_num_rows($query4);
				echo "
					<tr>
						<td align='center'>$tahun</td>
						<td align='center'>$banyakrecord3</td>
						<td align='center'>$banyakrecord4</td>
					</tr>
				";
			}
			?>
		</table>
		<?php include('../footer.php'); ?>
	</body>
</html>
<?php
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"5"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>