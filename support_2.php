</title>
    </head>
    <body background="gambar/<?php echo "$satu"; ?>">
		<?php include ('header.php'); 
		
			$sql = "select * from cms_template where kode_aktif=1 and urutan_tampil=2";
			$res = mysql_query($sql);
			while($select_result = mysql_fetch_array($res))
			{								
				$dua=$select_result['isi_template'];
			}
			echo "$dua";
				
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