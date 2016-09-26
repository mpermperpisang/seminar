<?php
				$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=4";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{								
					$empat=$select_result['isi_template'];
				}
				echo "$empat";
				?>