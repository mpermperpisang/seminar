<?php
	function secure_input($data){
		$secure_data = mysql_real_escape_string($data);
		return $secure_data;
	}
	
	function auto_respon($email,$username,$kode,$nama){
		include_once("class.phpmailer.php");
		$ucnama=ucwords($nama);
		$mail = new PHPMailer();
		$mail->IsMail();
		$mail->FromName   = "From: admin@seminar-penelitian.com"; $mail->FromName = "seminar-penelitian.com";
		$mail->Subject = "Activation account participant of research seminar";
		$mail->Body = "Thank you ".$ucnama." for registration..<br /> Click this link below for activated your research seminar account<br />http://seminar-penelitian.com/aktifasi.php?kode=$kode";
		$mail->AddAddress($email);
		$mail->IsHTML(true);
		if(!$mail->Send()){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	function cek_kode_aktifasi($kode){
		$sql = "select * from cms_pengguna where kode_email='$kode' and id_kategori_pengguna=1";
		$res = mysql_query($sql);
		$data = mysql_fetch_array($res);
		$cek_ada = mysql_num_rows($res);
		
		if($cek_ada == 0){
			$cek = 1; # member belum aktifasi
		}else{
			$cek = 0; # member sudah aktifasi
		}
		
		return $cek;
	}
?>