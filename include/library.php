<?php 
	session_start(); 
		
	function form_login()
	{
?>
		<form method=post action="login.php" name="form1">
			<table border=0 width=25% height=50% align="center">
				<tr>
					<td align="center">
						<font size="-1">Username or Email</font><br />
						<input type="text" name="username" size="20" maxlength="50" required>
					</td>
				</tr>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td align="center">
						<font size="-1">Password</font><br />
						<input type="password" name="password" size="20" maxlength="50" required>
					</td>
				</tr>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td align="center">
						<input type="submit" name="login" value="Login" title="Login" />
						<input type="reset" name="reset" value="Reset" title="Reset" />
					</td>
				</tr>
			</table>
		</form>
<?php
	}
	
	function tombol_logout()
	{
?>
		<table border=0 width="200" height="200" align="center" bgcolor="#FFFFFF">
			<tr>
				<td>
					<a href="logout.php" title="Log Out">
						<img src="gambar/logout.png" width="200" height="200" border="0" />
					</a>
				</td>
			</tr>
		</table>
<?php
	}
	
	function menu_member()
	{
		$telahlogin=(isset($_SESSION['login_member']));
		if($telahlogin==false)
			form_login();
		else
			tombol_logout();
	}
	
	function koneksi_db(){
		$host = "localhost";
		$database = "seminarp_cms_seminar_penelitian";
		$user = "seminarp_mper";
		$password = "pisang123";
		$link=mysql_connect($host,$user,$password);
		mysql_select_db($database,$link);
		if(!$link)
			echo "Error : ".mysql_error();
		return $link;
	}  
 
//fungsi untuk mengkonversi size file
	function formatBytes($bytes, $precision = 2) 
	{
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
	 
		$bytes = max($bytes, 0);
		$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
		$pow = min($pow, count($units) - 1);
	 
		$bytes /= pow(1024, $pow);
	 
		return round($bytes, $precision) . ' ' . $units[$pow];
	}
	
	function validasi($string) 
	{
		  $pattern = "[^a-zA-Z ]"; // karakter selain a-z A-Z & spasi
		  if(preg_match($pattern,$string)) 
		  {
			//match, berarti ada karakter selain alpha & spasi
			return false;
		  } 
		  else 
		  {
			return true;
		  }
	}  
?>