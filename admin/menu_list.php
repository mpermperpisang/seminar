<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="2"))
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>ADMIN PAGE</title>
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
				<td colspan="7">
					<p align="justify">
						<b><font size="+1">MENU LIST</font></b>
						<?php			
							$link=koneksi_db();			
							$sql = "select * from cms_menu,cms_order_urutan
									where cms_menu.id_order_urutan=cms_order_urutan.id_order_urutan";
						?>	
				</td>			
				<td align="right"><br>
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<select name="fieldcari">
										<option value="nama_menu" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="nama_menu") echo "selected";?>>Name of Menu</option>
										<option value="link_file" <?php if(isset($_POST['fieldcari']) && $_POST['fieldcari']=="link_file") echo "selected";?>>Link</option>
									</select>
									<input type="text" name="keyword" size=10 value="<?php if (isset($_POST["keyword"])) echo $_POST['keyword'];?>">
									<input type="image" src="../gambar/enter.jpg" width="20" align="absmiddle">
								</form>
								<?php
									if(isset($_POST['keyword']))
									{
										$fieldcari=$_POST['fieldcari'];
										$keyword=$_POST['keyword'];
										$sql=$sql." and $fieldcari like '%$keyword%' 
												order by cms_menu.id_order_urutan";
									}
								?>
				</td>	
			</tr>
			<tr>
				<td colspan="8">
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
				</td>
			</tr>
			<tr>
				<td colspan="7">
					<a href="add_menu.php"><img src="../gambar/add.png" width="25" title="Add Menu"></a>
					<a href="add_urutan.php"><img src="../gambar/sequence.png" width="25" title="Add Sequence"></a>
					<a href="php_file.php"><img src="../gambar/arsip.png" width="25" title="Manage PHP File"></a>
					<a href='post_menu.php'><img src='../gambar/who.png' title='View anyone who posting menu' width=25></a>
				</td>
				<td>
						<?php
							$res = mysql_query($sql);
							$banyakrecord=mysql_num_rows($res);
							if($banyakrecord>0)
							{
						?>
								<div align="right">There are <b><?php echo $banyakrecord;?></b> data of menu</div>
				</td>
			</tr>
		</table>
		<table align="center" border="0" cellpadding="5" width=100%>
					<tr bgcolor="#CCCCCC">
						<th>ID Menu</th>
						<th>Name of Menu</th>
						<th>Order of Menu</th>
						<th>Active Status</th>
						<th colspan="4">Action</th>
					</tr>
						<?php 
							}
							else
							{
						?>
								<div align="right">Data of menu not found</div>	
						<?php
							};
						?>
						<?php
								while($select_result = mysql_fetch_array($res))
								{
									$id_menu = $select_result['id_menu'];
									$menu = $select_result['nama_menu'];
									$ucmenu = ucwords($menu);
									$urutan = $select_result['order_urutan'];
									$kode_aktif = $select_result['kode_aktif'];
									
									if ($kode_aktif=='0')
									{
										$ket='Nonactive';
									}
									else if ($kode_aktif=='1')
									{
										$ket='Active';
									}
									echo "
									<tr>
										<td align='center'>$id_menu</td>
										<td>$ucmenu</td>
										<td align='center'>$urutan</td>
										<td align='center'>$ket</td>
										<form method=\"POST\" action=\"edit_menu.php?id=$id_menu\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_menu\" name=\"id_menu\"><center>
											<input type='image' title='Edit Menu' src='../gambar/edit.png' width='25'>
										</td>
										</form>";
										if ($kode_aktif=='0')
										{
										echo "
										<form method=\"POST\" action=\"publish_menu.php?id=$id_menu\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_menu\" name=\"id_menu\"><center>
											<input type='image' title='Active Menu' src='../gambar/publish.jpg' width='25'>
										</td>
										</form>";
										}
										else
										{
										echo "
										<form method=\"POST\" action=\"unpublish_menu.php?id=$id_menu\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_menu\" name=\"id_menu\"><center>
											<input type='image' title='Nonactive Menu' src='../gambar/unpublish.png' width='25'>
										</td>
										</form>";
										}
										if (($menu<>'home') && ($menu<>'payment') && ($menu<>'call for paper') && ($menu<>'venue') && ($menu<>'committee') && ($menu<>'important date') && ($menu<>'contact'))
										{
										echo "
										<form method=\"POST\" action=\"delete_menu.php?id=$id_menu\">
										<td align='center'>
											<input type=\"hidden\" value=\"$id_menu\" name=\"id_menu\"><center>
											<input type='image' title='Delete Menu' src='../gambar/delete.png' width='25' onclick='return confirmSubmit()'>
										</td>
										</form>";
										}
										else
										{
										echo "
										<td>
										</td>";
										}
										echo "
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
	  ($_SESSION['aktif']<>"2"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>