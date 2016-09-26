<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="3"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>COMMITTEE PAGE</title><html>
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
            text: 'Research Seminar Selection Paper Graphic'
         },
         xAxis: {
            categories: ['Category of Selection']
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
            $sql   = "SELECT distinct status_penerimaan_paper FROM cms_abstrak,cms_paper,cms_peserta,cms_tahun
						where cms_abstrak.id_pengguna=cms_peserta.id_pengguna
						and cms_paper.id_abstrak=cms_abstrak.id_abstrak
						and cms_peserta.id_tahun=cms_tahun.id_tahun
						and cms_tahun.kode_aktif='1'";
            $query = mysql_query( $sql,$link)  or die(mysql_error());
            while($ret = mysql_fetch_array($query) )
			{	      	
				$angka = $ret['status_penerimaan_paper'];
				$sql2 = "select status_penerimaan_paper from cms_paper where status_penerimaan_paper='$angka'";
				$res = mysql_query($sql2);
				while($select_result = mysql_fetch_array($res))
				{
             		$status_penerimaan=$select_result['status_penerimaan_paper'];         
					
					if ($status_penerimaan=='1')
					{
						$merek='Rejected';
					}
					else if ($status_penerimaan=='2')
					{
						$merek='Accepted';
					}
					else if ($status_penerimaan=='3')
					{
						$merek='Please Wait The Review';
					}
					else if ($status_penerimaan=='4')
					{
						$merek='Revision';
					}
				}                                      
                $sql_jumlah   = "SELECT count(*) as jumlah FROM cms_abstrak,cms_paper,cms_peserta,cms_tahun 
								WHERE cms_paper.status_penerimaan_paper='$angka' 
								and cms_paper.id_abstrak=cms_abstrak.id_abstrak
								and cms_abstrak.id_pengguna=cms_peserta.id_pengguna 
								and cms_peserta.id_tahun=cms_tahun.id_tahun 
								and cms_tahun.kode_aktif='1'";
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
						<b><font size="+1">SELECTION PAPER DASHBOARD</font></b>
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
		<?php                                 
                $jumlah2   = "SELECT * from cms_paper,cms_abstrak,cms_peserta,cms_tahun
							where cms_paper.id_abstrak=cms_abstrak.id_abstrak
							and cms_paper.status_review_paper=1
							and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
							and cms_peserta.id_tahun=cms_tahun.id_tahun
							and cms_tahun.kode_aktif='1'";
                $query_jumlah2 = mysql_query( $jumlah2 ) or die(mysql_error());
				$banyakrecord=mysql_num_rows($query_jumlah2);
				if($banyakrecord>0)
				{
		?>
		<table align="center" border="0" cellpadding="5" width=50%>
			<tr bgcolor="#CCCCCC" align="center">
				<td colspan="2"><b>Paper that not reviewed yet</b></td>
			</tr>
			<tr bgcolor="#CCCCCC" align="center">
				<td><b>ID Paper</b></td>
				<td><b>Title</b></td>
			</tr>
		<?php               
				}                  
                $jumlah   = "SELECT * from cms_paper,cms_abstrak,cms_peserta,cms_tahun
							where cms_paper.id_abstrak=cms_abstrak.id_abstrak
							and cms_paper.status_review_paper=1
							and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
							and cms_peserta.id_tahun=cms_tahun.id_tahun
							and cms_tahun.kode_aktif='1'";
                $query_jumlah = mysql_query( $jumlah ) or die(mysql_error());
                while( $data = mysql_fetch_array( $query_jumlah ) )
				{
					$id_paper=$data['id_paper']; 
					$judul=$data['judul']; 
						
						echo "<tr>
								<td align='center'>$id_paper</td>
								<td>$judul</td>
							  </tr>";
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