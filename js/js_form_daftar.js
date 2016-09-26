$(document).ready(function(){
	$(".tampil_info").hide();
	$(".info_email").hide();
});

function aksi_daftar(){
	
	var cek = cek_kosong();
	
	var email = $(".input_email").val();
	
	if(cek_kosong()==1)
	{
		$(".tampil_info").html("Sorry, please fill all of required data.");
		$(".tampil_info").fadeIn();
	}
	else if(cek_email(email)==1)
	{
		$(".tampil_info").html("Sorry, your format of email is invalid.");
		$(".tampil_info").fadeIn();
	}
	else
	{
		var username 	= $(".input_username").val();
		var password 	= $(".input_password").val();
		var repassword 	= $(".input_repassword").val();
		var email 	= $(".input_email").val();
		var nama_lengkap 	= $(".input_nama_lengkap").val();
		var input_data = "&username="+username+"&password="+password+"&repassword="+repassword+"&email="+email+"&nama_lengkap="+nama_lengkap;
		
		//alert(username+' - '+email+' - '+password);
			$.ajax({
				url:"proses.php",
				type:"POST",
				data:input_data,
				success:function(data){
					$(".tampil_info").html(data);
					$(".tampil_info").fadeIn(data);
					//alert('ada');
				}
			});
	}
	
	return false;
}

function cek_kosong(){
	var cek;
	$(function(){
		
		data_username = $(".input_username").val().length;
		data_password = $(".input_password").val().length;
		data_repassword = $(".input_repassword").val().length;
		data_email = $(".input_email").val().length;
		data_nama_lengkap = $(".input_nama_lengkap").val().length;
		
		if((data_username<1) || (data_password<1) || (data_repassword<1) || (data_email<1) ||  (data_nama_lengkap<1)){
			cek = 1;
		}else{
			cek = 0;
		}
		
	});
	
	return cek;	
}

function cek_email(data){
	var regex_email= new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
	
	isi_email = data;
	
	if(regex_email.test(isi_email)){
		return 0;
	}else{
		return 1;
	}
}