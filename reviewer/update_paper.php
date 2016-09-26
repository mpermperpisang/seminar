<?php
include "../include/library.php";
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="4"))
	{
include "../include/aktifasi_email.php";
$link=koneksi_db();
$id=$_SESSION['id_pengguna'];
$id_paper = $_POST['id_paper'];
$status_penerimaan = $_POST['status_penerimaan'];
$reviewer = $_POST['reviewer'];
$review = $_POST['review'];
$akhir = $_POST['akhir'];
$nilai = $_POST['nilai'];

// mencari alamat email si user
$query = "SELECT * FROM cms_abstrak, cms_peserta, cms_pengguna, cms_paper
		where cms_paper.id_paper='$id_paper'
		and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
		and cms_pengguna.id_pengguna=cms_peserta.id_pengguna
		and cms_paper.id_abstrak=cms_abstrak.id_abstrak";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$alamatEmail = $data['email'];
$namaUsername = $data['username'];

$abstrak="select * from cms_paper,cms_abstrak
	where cms_paper.id_paper='$id_paper'
	and cms_abstrak.id_abstrak=cms_paper.id_abstrak";
$hasil_abstrak = mysql_query($abstrak);
$data2  = mysql_fetch_array($hasil_abstrak);
$judul = strtoupper($data2['judul']);

$abstrak2="select * from cms_paper
	where status_penerimaan_paper='$status_penerimaan'";
$hasil_abstrak2 = mysql_query($abstrak2);
$data3  = mysql_fetch_array($hasil_abstrak2);
$status_terima = $data3['status_penerimaan_paper'];
if ($status_terima=='1')
{
	$ket="Rejected";
}
else if ($status_terima=='2')
{
	$ket="Accepted";
}

// title atau subject email
$title  = "PAPER REVIEW RESULT";

if (empty($akhir) || $akhir=='0000-00-00')
{
// isi pesan email disertai password
$pesan  = "Your paper review result,,\n\nID abstract ".$id_paper."\n\nTitle : ".$judul."\n\nhas been ".$ket."\n\nThere is no revision for your paper.\n\nNext step please upload scan of payment in website seminar-penelitian.com";
}
else
{
$pesan  = "Your paper review result,,\n\nID abstract ".$id_paper."\n\nTitle : ".$judul."\n\nhas been ".$ket."\n\nThere is a revision until ".$akhir."\n\nCheck more info about your revision in website seminar-penelitian.com";
}

// header email berisi alamat pengirim
$header = "From: reviewer@seminar-penelitian.com";

// mengirim email
@$kirimEmail = mail($alamatEmail, $title, $pesan, $header);

// cek status pengiriman email
if ($kirimEmail) {

	$sql2 = "select * from review_paper
			 where id_paper='$id_paper'
			 and id_pengguna='$id'";
	$query2 = mysql_query($sql2,$link);
	$banyakrecord=mysql_num_rows($query2);
	if($banyakrecord<2)
	{
									
		$query_insert = "update review_paper set
						 id_pengguna='$id'
						 where id_paper='$id_paper'
						 and id_pengguna='$id'";
		$insert = mysql_query($query_insert);
		
		$query_insert2 = "insert into review_paper (id_review_paper,id_pengguna,id_paper)
						values ('','$reviewer','$id_paper')";
		$insert = mysql_query($query_insert2);
	}
	else
	{
		$query_insert = "update review_paper set
						 id_pengguna='$id'
						 where id_paper='$id_paper'
						 and id_pengguna='$id'";
		$insert = mysql_query($query_insert);
		
		$query_insert2 = "update review_paper set
						 id_pengguna='$reviewer'
						 where id_paper='$id_paper'
						 and id_pengguna not in ('$id')";
		$insert = mysql_query($query_insert2);
	}
	
	$query_insert3 = "update cms_paper set
					  status_review_paper='2',
					  review='$review',
					  akhir_review='$akhir',
					  status_penerimaan_paper='$status_penerimaan',
					  nilai='$nilai'
					  where id_paper='$id_paper'";
	$insert = mysql_query($query_insert3);
	
	if($insert)
		{
		include("../redirectview_update.php");
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=paper.php'>";
		}
	
	else
		{
		include("../redirectview_gagal.php");
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=paper.php'>";
		}

}
else
{
	include("../redirectview_gagal_email.php");
	echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=paper.php'>";
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
