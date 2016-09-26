<?php
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="5"))
	{
?>
<table border=0 width=100% align="center">	
	<tr align="center">
		<td><a href="dashboard_peserta.php"><b><img src="../gambar/dashboard.png" width="20" align="absmiddle" />View Participant</b></a></td>	
		<td><a href="dashboard_kategori.php"><b><img src="../gambar/dashboard.png" width="20" align="absmiddle" />View Paper Category</b></a></td>	
		<td><a href="dashboard_paper.php"><b><img src="../gambar/dashboard.png" width="20" align="absmiddle" />View Selection Paper</b></a></td>		
	</tr>
</table>
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