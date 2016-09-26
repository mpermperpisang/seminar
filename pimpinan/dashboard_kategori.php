<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>HEADSIP PAGE</title><html>
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
            text: 'Research Seminar Category Interest Graphic'
         },
         xAxis: {
            categories: ['Category of Paper']
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
            $sql   = "SELECT distinct id_bidang_kajian FROM cms_abstrak,cms_peserta,cms_tahun
					where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
					and cms_tahun.id_tahun=cms_peserta.id_tahun
					and cms_tahun.kode_aktif='1'";
            $query = mysql_query( $sql,$link)  or die(mysql_error());
            while($ret = mysql_fetch_array($query) )
			{	      	
				$angka = $ret['id_bidang_kajian'];
				$sql2 = "select nama_bidang_kajian from cms_bidang_kajian,cms_abstrak,cms_peserta,cms_tahun
						where cms_bidang_kajian.id_bidang_kajian='$angka'
						and cms_abstrak.id_bidang_kajian=cms_bidang_kajian.id_bidang_kajian
						and cms_abstrak.id_pengguna=cms_peserta.id_pengguna
						and cms_peserta.id_tahun=cms_tahun.id_tahun
						and cms_tahun.kode_aktif='1'";
				$res = mysql_query($sql2);
				while($select_result = mysql_fetch_array($res))
				{
             		$merek=$select_result['nama_bidang_kajian'];         
				}    
            	$merek2=$ret['id_bidang_kajian'];                                   
                $sql_jumlah   = "SELECT count(*) as jumlah FROM cms_abstrak,cms_peserta,cms_tahun WHERE id_bidang_kajian='$merek2' and cms_abstrak.id_pengguna=cms_peserta.id_pengguna and cms_peserta.id_tahun=cms_tahun.id_tahun and cms_tahun.kode_aktif='1'";
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
						<b><font size="+1">CATEGORY OF PAPER DASHBOARD</font></b>
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