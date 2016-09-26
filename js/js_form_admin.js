$(document).ready(function(){
	$(".tampil_info2").hide();
	$(".info_email2").hide();
});

function aksi_daftar(){
	
	var cek = cek_kosong();
	
	var email = $(".input_email").val();
	
	if(cek_kosong()==1){
		$(".tampil_info2").html("Sorry, please fill all of required data");
		$(".tampil_info2").fadeIn();
	}else if(cek_email(email)==1){
		$(".tampil_info2").html("Sorry, your format of email is invalid");
		$(".tampil_info2").fadeIn();
	}else{
		var email 	= $(".input_email").val();
		var username 	= $(".input_username").val();
		var password 	= $(".input_password").val();
		var nama 	= $(".input_nama").val();
		var input_data = "&username="+username+"&password="+password+"&email="+email+"&nama="+nama;
		
		//alert(username+' - '+email+' - '+password);
		
		$.ajax({
			url:"",
			type:"POST",
			data:input_data,
			success:function(data){
				$(".tampil_info2").html(data);
				$(".tampil_info2").fadeIn(data);
				//alert('ada');
			}
		});
	}
	
	return false;
}

function cek_kosong(){
	var cek;
	$(function(){
		
		data_email = $(".input_email").val().length;
		data_username = $(".input_username").val().length;
		data_password = $(".input_password").val().length;
		data_nama = $(".input_nama").val().length;
		
		if((data_email<1) || (data_username<1) || (data_password<1) || (data_nama<1)){
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