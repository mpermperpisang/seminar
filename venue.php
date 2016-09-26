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
		<link type="text/css" href="css/css.css" rel="stylesheet">	
		<title>VENUE</title>
 
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=AIzaSyBGBo5-XxT4K8a7Ib31qbRogdBKw0M5x2k" type="text/javascript"></script>
 
<script type="text/javascript">
 
//<![CDATA[
 
var iconBlue = new GIcon();
 
iconBlue.image = 'http://labs.google.com/ridefinder/images/mm_20_blue.png';
 
iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
 
iconBlue.iconSize = new GSize(12, 20);
 
iconBlue.shadowSize = new GSize(22, 20);
 
iconBlue.iconAnchor = new GPoint(6, 20);
 
iconBlue.infoWindowAnchor = new GPoint(5, 1);
 
var iconRed = new GIcon();
 
iconRed.image = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
 
iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
 
iconRed.iconSize = new GSize(12, 20);
 
iconRed.shadowSize = new GSize(22, 20);
 
iconRed.iconAnchor = new GPoint(6, 20);
 
iconRed.infoWindowAnchor = new GPoint(5, 1);
 
var iconGreen = new GIcon();
 
iconGreen.image = 'http://labs.google.com/ridefinder/images/mm_20_green.png';
 
iconGreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
 
iconGreen.iconSize = new GSize(12, 20);
 
iconGreen.shadowSize = new GSize(22, 20);
 
iconGreen.iconAnchor = new GPoint(6, 20);
 
iconGreen.infoWindowAnchor = new GPoint(5, 1);
 
var iconYellow = new GIcon();
 
iconYellow.image = 'http://labs.google.com/ridefinder/images/mm_20_yellow.png';
 
iconYellow.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
 
iconYellow.iconSize = new GSize(12, 20);
 
iconYellow.shadowSize = new GSize(22, 20);
 
iconYellow.iconAnchor = new GPoint(6, 20);
 
iconYellow.infoWindowAnchor = new GPoint(5, 1);
 
var customIcons = [];
 
customIcons["Hotel"] = iconBlue;
 
customIcons["Mall"] = iconRed;
 
customIcons["Restaurant"] = iconYellow;
 
customIcons["University"] = iconGreen;
 
function load() {
 
if (GBrowserIsCompatible()) {
 
var map = new GMap2(document.getElementById("map"));
 
map.addControl(new GSmallMapControl());
 
map.addControl(new GMapTypeControl());
 
<?php  
$sql = "SELECT * FROM cms_google_maps where kode_aktif='1'";
$result = mysql_query($sql);
while($data = mysql_fetch_object($result)) 
{
?>
map.setCenter(new GLatLng(<?=$data->lat;?>, <?=$data->lon;?>), 15);
<?php
}
?>
 
GDownloadUrl("include/generatexml.php", function(data) {
 
var xml = GXml.parse(data);
 
var markers = xml.documentElement.getElementsByTagName("marker");
 
for (var i = 0; i < markers.length; i++) {
 
var nama = markers[i].getAttribute("nama");
 
var alamat = markers[i].getAttribute("alamat");
 
var tipe = markers[i].getAttribute("tipe");
 
var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
 
parseFloat(markers[i].getAttribute("lon")));
 
var marker = createMarker(point, nama, alamat, tipe);
 
map.addOverlay(marker);
 
}
 
});
 
}
 
}
 
function createMarker(point, nama, alamat, tipe) {
 
var marker = new GMarker(point, customIcons[tipe]);
 
var html = "<b>" + nama + "</b> <br/>" + alamat;
 
GEvent.addListener(marker, 'click', function() {
 
marker.openInfoWindowHtml(html);
 
});
return marker;
}
//]]>
</script>
    </head>
    <body background="gambar/<?php echo "$satu"; ?>" onLoad="load()" onUnload="GUnload()">
		<?php include ('header.php'); 
		
			$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=2";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{								
				$dua=$select_result['isi_template'];
			}
			echo "$dua";
				
			$sql = "select * from cms_postingan
					where kategori_posting='12'";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{	
				$judul = $select_result['judul'];
				$upjudul=strtoupper($judul);
				$content=$select_result['content'];	
			
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=3";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$tiga=$select_result['isi_template'];
				}
				echo "$tiga";
				?>
			<div class='share'>
<span style='float:left;margin-right:15px;margin-top:1px'>Share on</span>
<a class='share_facebook' href='https://www.facebook.com/sharer.php?u=http://seminar-penelitian.com/venue.php' onclick='window.open(this.href,"_blank","height=430,width=640");return false;' rel='nofollow' title='Share to Facebook'>Facebook</a>
<a class='share_google' href='https://plus.google.com/share?url=http://seminar-penelitian.com/venue.php' onclick='window.open(this.href,"_blank","height=600,width=530");return false;' rel='nofollow' title='Share to Google+'>Google+</a>
<a class='share_twitter' href='https://twitter.com/share?url=http://seminar-penelitian.com/venue.php' onclick='window.open(this.href,"_blank","height=430,width=640");return false;' rel='nofollow' title='Share to Twitter'>Twitter</a>
</div>
				<?php
			echo "$upjudul";
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=4";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$empat=$select_result['isi_template'];
				}
				echo "$empat";
				
			echo "$content"; 
			}
				?>
<div align="center">
<table>
<tr>
<td bgcolor="#0000FF" width="25"></td><td><font color="#000000"><b>Hotel</b></font></td>
<td bgcolor="#FF0000" width="25"></td><td><font color="#000000"><b>Mall</b></font></td>
<td bgcolor="#FFFF00" width="25"></td><td><font color="#000000"><b>Restaurant</b></font></td>
<td bgcolor="#00FF00" width="25"></td><td><font color="#000000"><b>University</b></font></td>
</tr>
</table>
<div id="map" style="width: 50%px; height: 75%"></div>
</div>
							<?php 
			$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=6";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{								
				$enam=$select_result['isi_template'];
			}
			echo "$enam";
			include('menu_login.php');  
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=7";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{								
				$tujuh=$select_result['isi_template'];
			}
			echo "$tujuh"; ?>
		<?php include('footer.php'); ?>
	</body>
</html>
<?php
}
?>