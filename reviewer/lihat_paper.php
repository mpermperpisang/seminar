<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="4"))
	{
	$link=koneksi_db();	
	$id_paper=$_REQUEST['id_paper'];
	$sql = "SELECT * FROM cms_paper,cms_abstrak 
			WHERE id_paper='$id_paper' 
			and cms_abstrak.id_abstrak=cms_paper.id_abstrak";
	$query = mysql_query($sql,$link);
	while($select_result = mysql_fetch_array($query))
	{
		$pdf = $select_result['id_paper'];
		$docx = $select_result['id_paper'];
		$doc = $select_result['id_paper'];
		$tipe = $select_result['tipe_file'];
		$judul = strtoupper($select_result['judul']);
	
	$sqla = "SELECT * FROM cms_tahun WHERE kode_aktif='1'";
	$querya = mysql_query($sqla,$link);
	while($select_resulta = mysql_fetch_array($querya))
	{
		$tahun = $select_resulta['bil_tahun'];
	}
	
	if ($tipe=='pdf')
	{
	?>
	<iframe src="http://docs.google.com/viewer?
url=www.seminar-penelitian.com/paper/<?php echo $tahun."/".$pdf."-".$judul.".pdf" ?>
&embedded=true" width=100% 
height=100%
style="border: none;"></iframe>
	<?php
	}
	else if ($tipe=='docx')
	{
	?>
	<iframe src="http://docs.google.com/viewer?
url=www.seminar-penelitian.com/paper/<?php echo $tahun."/".$docx."-".$judul.".docx" ?>
&embedded=true" width=100% 
height=100%
style="border: none;"></iframe>
	<?php
	}
	else if ($tipe=='doc')
	{
	?>
	<iframe src="http://docs.google.com/viewer?
url=www.seminar-penelitian.com/paper/<?php echo $tahun."/".$doc."-".$judul.".doc" ?>
&embedded=true" width=100% 
height=100%
style="border: none;"></iframe>
	<?php
	}
	}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"4"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
	
?>