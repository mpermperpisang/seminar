<?php
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=5";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$lima=$select_result['isi_template'];
				}
				echo "$lima";
		
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
			echo "$tujuh";
				include('footer.php'); ?>
	</body>
</html>