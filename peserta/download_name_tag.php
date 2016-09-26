<?php
	include('../include/library.php');
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="1"))
	{
	$link=koneksi_db();
	$id=$_SESSION['id_pengguna'];
	
	$sqla = "select foto,tipe_file from cms_peserta
			where id_pengguna='$id'
			and (foto is not null or foto<>'')
			and (tipe_file is not null or tipe_file<>'')";
	$resa = mysql_query($sqla);
	$banyakrecorda=mysql_num_rows($resa);
	if($banyakrecorda>0)
	{
	
		$query_update = "update cms_peserta set 
						hadir_presentasi='1'
						where id_pengguna='$id'";
		$update = mysql_query($query_update);
		
		$sql = "select * from cms_peserta,cms_pengguna
				where cms_peserta.id_pengguna='$id' 
				and cms_pengguna.id_pengguna=cms_peserta.id_pengguna";
		$res = mysql_query($sql);
		$banyakrecord=mysql_num_rows($res);
		if($banyakrecord>0)
		{
			define('FPDF_FONTPATH','../pdf/font/');
		 
			require('../pdf/fpdf.php');
		 
			$pdf=new FPDF('L','mm',array(62,88));
			$pdf->SetMargins(2,3,2);
		 
			$pdf->Open();
		 
			$pdf->AddPage();
			
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(84,10.5,'Name Tag Peserta Seminar Penelitian',1,1,'C');
			$pdf->Ln(1);
			$pdf->Ln(1);
			$pdf->Line(85, 15.5, 3, 15.5);
			$pdf->Ln(1);
			$pdf->Ln(1);
			$pdf->Ln(1);
			$pdf->Ln(1);
			$pdf->Ln(1);
			$pdf->Ln(1);
			$pdf->Ln(1);
			$pdf->SetFont('Arial','B',8);
			while($select_result = mysql_fetch_array($res))
			{
				$foto=$select_result['foto'];
				$tipe_file=$select_result['tipe_file'];
				$kategori_peserta=$select_result['kategori_peserta'];
				
				if ($kategori_peserta=='1')
				{
					$ket='Participant With Paper';
				}
				else if ($kategori_peserta=='2')
				{
					$ket='Participant Without Paper';
				}
				
				if (($foto=='male') || ($foto=='female'))
				{
					$tampil=$foto.".".$tipe_file;
				}
				else
				{
					$tampil=$id.".".$tipe_file;
				}
				
				$pdf->Cell(35.5,0.5,'Name',0,0,'L');
				$pdf->Cell(3.5,0.5,ucwords ($select_result['nama_pengguna']),0,0,'L');
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Cell(35.5,0.5,'Type of Participant',0,0,'L');
				$pdf->Cell(3.5,0.5,$ket,0,0,'L');
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Ln(1);
				$pdf->Cell(35.5,0.5,'Institution',0,0,'L');
				$pdf->Cell(3.5,0.5,ucwords ($select_result['institusi']),0,0,'L');
				$pdf->Image("../foto/".$tampil,60,37,20);
			}
		$pdf->Output();						
		}
	}
	else
	{
?>
<html>
	<head>
		<link type="text/css" href="../css/css.css" rel="stylesheet">	
		<title>PARTICIPANT PAGE</title>
    </head>
    <body>	
		<?php include ('../header.php'); ?>
		<?php include ('menu.php'); ?>
			<table border=0 width=75% align="center">	
				<tr>
					<td>
						<p align="justify">
							<b><font size="+1">UPLOAD SCAN OF TRANSFER</font></b>
							<br>
						<img src="../gambar/line.jpg" width=100% height="3">
						<br>						
						<img src="../gambar/line_2.jpg" width=100% height="5">
						<table border="0" width=100%>
							<tr align="center">
								<td>Please Update Your Profile First. Do not forget to choose your gender if it null</td>
							</tr>
						</table>
					</p>
					</td>
				</tr>
			</table>
		<?php include('../footer.php'); ?>
	</body>
</html>
<?php
	}
	}
	else if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']<>"1"))
	{
		header("Location: hak_akses.php");
	}
	else
	{
		header("Location: ../belum_login.php");
	}
?>
							