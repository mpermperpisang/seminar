$(document).ready(function(){
	$(".tampil_info").hide();
	$(".info_email").hide();
});

function aksi_daftar(){
	
	var cek = cek_kosong();
	
	var email = $(".input_email").val();
	
	if(cek_kosong()==1){
		$(".tampil_info").html("Sorry, please fill all of required data");
		$(".tampil_info").fadeIn();
	}else if(cek_email(email)==1){
		$(".tampil_info").html("Sorry, your format of email is invalid");
		$(".tampil_info").fadeIn();
	}else{
		var email 	= $(".input_email").val();
		var username 	= $(".input_username").val();
		var masalah 	= $(".input_masalah").val();
		var input_data = "&email="+email+"&username="+username+"&masalah="+masalah;
		
		//alert(username+' - '+email+' - '+password);
		
		$.ajax({
			url:"konfirm_email.php",
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
		
		data_email = $(".input_email").val().length;
		data_username = $(".input_username").val().length;
		data_masalah = $(".input_masalah").val().length;
		
		if((data_email<1) || (data_username<1) || (data_masalah<1)){
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