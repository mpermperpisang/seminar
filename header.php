<table width=100% border="0" bgcolor="#FFFFFF">
	<tr>
			<?php 
				if(isset($_SESSION['login_member']))
				{
					if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="1")||($_SESSION['aktif']=="2")||($_SESSION['aktif']=="3")||($_SESSION['aktif']=="4")||($_SESSION['aktif']=="5"))
						{	
							$link=koneksi_db();			
							$sql2 = "select * from cms_header,cms_tahun
									where cms_header.id_tahun=cms_tahun.id_tahun
									and cms_tahun.kode_aktif='1'";
							$res2 = mysql_query($sql2);
								while($select_result2 = mysql_fetch_array($res2))
								{
									$tema_acara=$select_result2['tema_acara'];
									$uptema=strtoupper($tema_acara);
									$nama_acara=$select_result2['nama_acara'];
									$upnama=strtoupper($nama_acara);
									$tahun=$select_result2['bil_tahun'];
									$tempat=$select_result2['tempat_acara'];
									$uptempat=strtoupper($tempat);
									$logo_satu=$select_result2['logo_satu'];
									$logo_dua=$select_result2['logo_dua'];
									$akronim=$select_result2['akronim'];
									$upakronim=strtoupper($akronim);
									
								echo "
									<td align='left'><img src='../logo/$logo_satu' width='100' title='Logo Acara' /></td>
									<td align='center'>
										<h3><b>'$uptema'<br>$upnama&nbsp;($upakronim)&nbsp;$tahun<br>$uptempat</b></h3>
									</td>
									<td align='right'><img src='../logo/$logo_dua' width='100' title='Logo Universitas' /></td>";
								}
						}
				} 
				else
				{
							$link=koneksi_db();			
							$sql2 = "select * from cms_header,cms_tahun
									where cms_header.id_tahun=cms_tahun.id_tahun
									and cms_tahun.kode_aktif='1'";
							$res2 = mysql_query($sql2);
								while($select_result2 = mysql_fetch_array($res2))
								{
									$tema_acara=$select_result2['tema_acara'];
									$uptema=strtoupper($tema_acara);
									$nama_acara=$select_result2['nama_acara'];
									$upnama=strtoupper($nama_acara);
									$tahun=$select_result2['bil_tahun'];
									$tempat=$select_result2['tempat_acara'];
									$uptempat=strtoupper($tempat);
									$logo_satu=$select_result2['logo_satu'];
									$logo_dua=$select_result2['logo_dua'];
									$akronim=$select_result2['akronim'];
									$upakronim=strtoupper($akronim);
									
								echo "
									<td align='kiri'><img src='logo/$logo_satu' width='100' title='Logo Acara' /></td>
									<td align='center'>
										<h3><b>'$uptema'<br>$upnama&nbsp;($upakronim)&nbsp;$tahun<br>$uptempat</b></h3>
									</td>
									<td align='right'><img src='logo/$logo_dua' width='100' title='Logo Universitas' /></td>";
								}
				}
			?>	
	</tr>
</table>
<table width=100% bgcolor="#FFFFFF">
	<tr align="center">
			<?php 
				if(isset($_SESSION['login_member']))
				{
					if(($_SESSION['login_member']==true)&&($_SESSION['aktif']=="1")||($_SESSION['aktif']=="2")||($_SESSION['aktif']=="3")||($_SESSION['aktif']=="4")||($_SESSION['aktif']=="5"))
					{
							$nama_pengguna=$_SESSION['nama_pengguna'];
							$ucnama=ucwords($nama_pengguna);
							echo "
							<td align='left' background='../gambar/headerbg_2.jpg' style='border-top: 5px solid #F3F3F3;'>Welcome, ";echo $ucnama; echo"</td>
							";
							if ($_SESSION['aktif']=="1") {
								$id=$_SESSION['id_pengguna'];
								$query="select * from cms_peserta 
										where cms_peserta.id_pengguna='$id'
										and kategori_peserta is not null";
								$res_query = mysql_query($query);
								$banyakrecord=mysql_num_rows($res_query);
								if($banyakrecord>0)
								{
									echo "<td background='../gambar/blockdefault.gif' width=5% height='40' align='center'><a href='index.php'><b><font color='#FFFFFF'>Home</font></b></a></td>";
									echo "<td background='../gambar/blockdefault.gif' width=5% height='40' align='center'><a href='../logout.php'><b><font color='#FFFFFF'>LOG OUT</font></b></a></td>";
								}
								else
								{
									echo "<td background='../gambar/blockdefault.gif' width=5% height='40' align='center'><a href='../logout.php'><b><font color='#FFFFFF'>LOG OUT</font></b></a></td>";
								}
						}
						else
						{
								echo "<td background='../gambar/blockdefault.gif' width=5% height='40' align='center'><a href='index.php'><b><font color='#FFFFFF'>Home</font></b></a></td>";
								echo "<td background='../gambar/blockdefault.gif' width=5% height='40' align='center'><a href='../logout.php'><b><font color='#FFFFFF'>LOG OUT</font></b></a></td>";
						}
					}
				} 
				else
				{		
					$sql4 = "select * from cms_menu,cms_order_urutan
							where cms_menu.id_order_urutan=cms_order_urutan.id_order_urutan
							and cms_menu.kode_aktif='1'
							order by cms_menu.id_order_urutan";
					$res4 = mysql_query($sql4);
					while($select_result4 = mysql_fetch_array($res4))
					{
						$menu=$select_result4['nama_menu'];
						$link=$select_result4['link_file'];
						$ext=$select_result4['ext'];
					echo "<td background='gambar/headerbg.jpg' height='41'>		
					<a href='$link.$ext'><b><font color='white'>";echo strtoupper($menu); echo"</font></b></a></td>";
					}
					echo "<td background='gambar/headerbg_4.jpg' width=5% height='40' align='center'></td>
					";
				}
			?>
	</tr>
</table>
<br>