<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" lang="id"><head>


    <title>RESEARCH SEMINAR</title>
    <style type="text/css">
<!--
.style4 {font-size: 10px}
-->
* { margin: 0; padding: 0; }

body {
    border-top-width: 30px;
    border-top-style: solid;
    font: 11px "Lucida Grande", Verdana, Arial, "Bitstream Vera Sans", sans-serif;
}

form {
    margin-left: 8px;
    padding: 16px 16px 40px 16px;
    font-weight: normal;
    -moz-border-radius: 11px;
    -khtml-border-radius: 11px;
    -webkit-border-radius: 11px;
    border-radius: 5px;
    background: #fff;
    border: 1px solid #e5e5e5;
    -moz-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    -webkit-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    -khtml-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    box-shadow: rgba(200,200,200,1) 0 4px 18px;
}

form .forgetmenot { font-weight: normal; float: left; margin-bottom: 0; }

#redirect form p {
    margin-bottom: 0;
}

label {
    color: #777;
    font-size: 13px;
}

form .forgetmenot label {
    font-size: 11px;
    line-height: 19px;
}
form p { margin-bottom: 24px; }

#nav {
    text-shadow: rgba(255,255,255,1) 0 1px 0;
}
#redirect { width: 320px; margin: 7em auto; }
#nav { margin: 0 0 0 8px; padding: 16px; }
    </style>
    </head>
<body class="login">

<div id="redirect" align="center">
<p class="message"><h2>USER WAS INSERTED SUCCESFULLY</h2></p>

<form name="loading" id="loading">
    <p>&nbsp;</p>
	<?php
			if(isset($_SESSION['login_member']))
			{
				if(($_SESSION['login_member']==true)&&
				(($_SESSION['aktif']=="1")||($_SESSION['aktif']=="2")||($_SESSION['aktif']=="3")||($_SESSION['aktif']=="4")||($_SESSION['aktif']=="5")))
				{
					echo "
					<p><img src='../gambar/loading.gif' alt='Loading' width='150' height='100' /></p>";
				}
				else if(($_SESSION['login_member']==false))
				{
					echo "
					<p><img src='gambar/loading.gif' alt='Loading' width='150' height='100' /></p>";
				}
			} 
			else if(!isset($_SESSION['login_member']))
			{
				echo "
				<p><img src='gambar/loading.gif' alt='Loading' width='150' height='100' /></p>";
			}
	?>
    <p>&nbsp;</p>
	<br />
    <p><span class="style4">Research Seminar</span></p>
		<?php 				
			$username=$_POST["username"];
			$sql = "select id_pengguna from cms_pengguna where username='$username'";
			$res = mysql_query($sql);
			$banyakrecord=mysql_num_rows($res);
			if($banyakrecord>0)
			{
				while($select_result = mysql_fetch_array($res))
				{
					$id_pengguna = $select_result['id_pengguna'];
				}
			$select = "INSERT INTO cms_peserta (id_pengguna)
			SELECT id_pengguna FROM cms_pengguna where id_pengguna='$id_pengguna' and kategori_pengguna=1;";
			$select_query = mysql_query($select);
			
			$select2 = "INSERT INTO cms_admin (id_pengguna)
			SELECT id_pengguna FROM cms_pengguna where id_pengguna='$id_pengguna' and kategori_pengguna=2;";
			$select_query2 = mysql_query($select2);
			
			$select3 = "INSERT INTO cms_panitia (id_pengguna)
			SELECT id_pengguna FROM cms_pengguna where id_pengguna='$id_pengguna' and kategori_pengguna=3;";
			$select_query3 = mysql_query($select3);
			
			$select4 = "INSERT INTO cms_reviewer (id_pengguna)
			SELECT id_pengguna FROM cms_pengguna where id_pengguna='$id_pengguna' and kategori_pengguna=4;";
			$select_query4 = mysql_query($select4);
			
			$select5 = "INSERT INTO cms_pimpinan(id_pengguna)
			SELECT id_pengguna FROM cms_pengguna where id_pengguna='$id_pengguna' and kategori_pengguna=5;";
			$select_query5 = mysql_query($select5);
			}
		?>
    <p>
      <label></label>
  </form>

</div>

</body></html>