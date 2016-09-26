<?php
if(!isset($_SESSION['login_member']))
{
?>
<br />
<table width=100% align="center">
	<tr>
		<td align="center">
			<div id="i-footer">	
			<?php	
				$link=koneksi_db();			
				$sql = "select * from cms_footer,cms_tahun
				where cms_footer.id_tahun=cms_tahun.id_tahun
				and cms_tahun.kode_aktif='1'";
				$res = mysql_query($sql);
				while($select_result = mysql_fetch_array($res))
				{
					$copy=$select_result['copyright'];
					$uccopy=ucwords($copy);
					$tahun=$select_result['bil_tahun'];
					echo "<div id='footer-center'><br />Copyright &copy; $tahun by $uccopy</div>";
				}		
			?>
			</div>
		</td>
	</tr>
</table>
<?php
}
?>