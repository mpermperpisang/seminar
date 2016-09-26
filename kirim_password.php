<?php
include "include/library.php";
include "include/aktifasi_email.php";
$link=koneksi_db();
$email = $_POST['email'];
$username = $_POST['username'];
if (ctype_alnum($username))
{
// mencari alamat email si user
$query = "SELECT * FROM cms_pengguna WHERE email = '$email' and username = '$username'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$alamatEmail = $data['email'];
$namaUsername = $data['username'];
$nama_pengguna = $data['nama_pengguna'];
$ucnama=ucwords($nama_pengguna);
$pw = $data['pw'];

// title atau subject email
$title  = "Forgot password facility of research seminar account";

// isi pesan email disertai password
$pesan  = "Hello, ".$ucnama."\n\nThere is a request for password of your research seminar account.\n\nYour username : ".$namaUsername."\n\nYour password is ".$pw. "\n\nDon't forget to change your old password.";

// header email berisi alamat pengirim
$header = "From: admin@seminar-penelitian.com";

// mengirim email
@$kirimEmail = mail($alamatEmail, $title, $pesan, $header);

// cek status pengiriman email

	if (@$kirimEmail)
	{
		echo "Password has been sent to your email. Cek your inbox or spam folder";
	}
	else 
	{
		echo "Not successfull sending password to email";
	}
}
else
{
	echo "Please do not use space or weird character for username";
}

?>
