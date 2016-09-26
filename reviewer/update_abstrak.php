<?php
include "../include/library.php";
	if(($_SESSION['login_member']==true)&& 
	  ($_SESSION['aktif']=="4"))
	{
include "../include/aktifasi_email.php";
$link=koneksi_db();
$id=$_SESSION['id_pengguna'];
$id_abstrak = $_POST['id_abstrak'];
$status_penerimaan = $_POST['status_penerimaan'];
$reviewer = $_POST['reviewer'];

// mencari alamat email si user
$query = "SELECT * FROM cms_abstrak, cms_peserta, cms_pengguna
		where cms_abstrak.id_abstrak='$id_abstrak'
		and cms_peserta.id_pengguna=cms_abstrak.id_pengguna
		and cms_pengguna.id_pengguna=cms_peserta.id_pengguna";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$alamatEmail = $data['email'];
$namaUsername = $data['username'];

$abstrak="select * from cms_abstrak
	where cms_abstrak.id_abstrak='$id_abstrak'";
$hasil_abstrak = mysql_query($abstrak);
$data2  = mysql_fetch_array($hasil_abstrak);
$judul = strtoupper($data2['judul']);

$abstrak2="select * from cms_abstrak
	where status_penerimaan_abstrak='$status_penerimaan'";
$hasil_abstrak2 = mysql_query($abstrak2);
$data3  = mysql_fetch_array($hasil_abstrak2);
$status_terima = $data3['status_penerimaan_abstrak'];
if ($status_terima=='1')
{
	$ket="Rejected";
	$keterangan="scan proof of transfer";
}
else if ($status_terima=='2')
{
	$ket="Accepted";
	$keterangan="full paper";
}

// title atau subject email
$title  = "ABSTRACT REVIEW RESULT";

// isi pesan email disertai password
$pesan  = "Your abstract review result,,\n\nID abstract ".$id_abstrak."\n\ntitle : ".$judul."\n\nhas been ".$ket."\n\nnext step please upload your ".$keterangan." in website seminar-penelitian.com";

// header email berisi alamat pengirim
$header = "From: reviewer@seminar-penelitian.com";

// mengirim email
@$kirimEmail = mail($alamatEmail, $title, $pesan, $header);

// cek status pengiriman email
if ($kirimEmail) {

		$sql2 = "select * from review_abstrak
			 where id_abstrak='$id_abstrak'
			 and id_pengguna='$id'";
	$query2 = mysql_query($sql2,$link);
	$banyakrecord=mysql_num_rows($query2);
	if($banyakrecord<2)
	{
									
		$query_insert = "update review_abstrak set
						 id_pengguna='$id'
						 where id_abstrak='$id_abstrak'
						 and id_pengguna='$id')";
		$insert = mysql_query($query_insert);
		
		$query_insert2 = "insert into review_abstrak (id_review_abstrak,id_pengguna,id_abstrak)
						values ('','$reviewer','$id_abstrak')";
		$insert = mysql_query($query_insert2);
	}
	else
	{
		$query_insert = "update review_abstrak set
						 id_pengguna='$id'
						 where id_abstrak='$id_abstrak'
						 and id_pengguna='$id'";
		$insert = mysql_query($query_insert);
		
		$query_insert2 = "update review_abstrak set
						 id_pengguna='$reviewer'
						 where id_abstrak='$id_abstrak'
						 and id_pengguna not in ('$id')";
		$insert = mysql_query($query_insert2);
	}
	
	$query_insert3 = "update cms_abstrak set
					  status_review_abstrak='2',
					  status_penerimaan_abstrak='$status_penerimaan'
					  where id_abstrak='$id_abstrak'";
	$insert = mysql_query($query_insert3);
	if($insert)
		{
		include("../redirectview_update.php");
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=abstract.php'>";
		}
	
	else
		{
		include("../redirectview_gagal.php");
		echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=abstract.php'>";
		}

}
else
{
	include("../redirectview_gagal_email.php");
	echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=abstract.php'>";
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
