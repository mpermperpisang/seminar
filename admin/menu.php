<?php
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
?>
<table border=0 width=20% align="left">	
	<tr bgcolor="#CCCCCC" align="center">
		<td bgcolor="#CC3300" height="35" style="border-top:inset #FFFF00; border-bottom:outset #FFFF00;"><font color="white"><b>MENU</b></font></td>
	</tr>
	<tr>			
		<td><a href="profile.php"><b><img src="../gambar/edit_user.png" width="20" align="absmiddle">Manage Profile</b></a></td>	
	</tr>
	<tr>			
		<td><a href="account.php"><b><img src="../gambar/edit_account.png" width="20" align="absmiddle" />Manage Account</b></a></td>
	</tr>
	<tr>
		<td><a href="admin.php"><b><img src="../gambar/admin.png" width="20" align="absmiddle" />Manage Administrator</b></a></td>				
	</tr>
	<tr>
		<td><a href="panitia.php"><b><img src="../gambar/panitia.png" width="20" align="absmiddle" />Manage Committee</b></a></td>	
	</tr>
	<tr>
		<td><a href="peserta.php"><b><img src="../gambar/peserta.png" width="20" align="absmiddle" />Manage Participant</b></a></td>	
	</tr>
	<tr>
		<td><a href="reviewer.php"><b><img src="../gambar/reviewer.jpg" width="20" align="absmiddle" />Manage Reviewer</b></a></td>	
	</tr>
	<tr>
		<td><a href="year.php"><b><img src="../gambar/year.png" width="20" align="absmiddle" />Manage Month and Year</b></a></td>	
	</tr>
	<tr>
		<td><a href="acara.php"><b><img src="../gambar/due_date.png" width="20" align="absmiddle" />Manage Due Date of Seminar</b></a></td>	
	</tr>
	<tr>
		<td><a href="front_end.php"><b><img src="../gambar/post.png" width="20" align="absmiddle" />Manage Front End Post</b></a></td>	
	</tr>
	<tr>
		<td><a href="google_maps.php"><b><img src="../gambar/maps.png" width="20" align="absmiddle" />Manage Location Maps</b></a></td>	
	</tr>
	<tr>
		<td><a href="brosur.php"><b><img src="../gambar/brosur.png" width="20" align="absmiddle" />Manage Brochure</b></a></td>	
	</tr>
	<tr>
		<td><a href="template_paper.php"><b><img src="../gambar/template_paper.jpg" width="20" align="absmiddle" />Manage Template of Paper</b></a></td>	
	</tr>
	<tr>
		<td><a href="template.php"><b><img src="../gambar/template.png" width="20" align="absmiddle" />Manage Template</b></a></td>	
	</tr>
	<tr>
		<td><a href="header.php"><b><img src="../gambar/header.png" width="20" align="absmiddle" />Manage Header</b></a></td>	
	</tr>
	<tr>
		<td><a href="footer.php"><b><img src="../gambar/footer.png" width="20" align="absmiddle" />Manage Footer</b></a></td>	
	</tr>
	<tr>
		<td><a href="menu_list.php"><b><img src="../gambar/menu.png" width="20" align="absmiddle" />Manage Menu</b></a></td>	
	</tr>
</table>
<?php
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>