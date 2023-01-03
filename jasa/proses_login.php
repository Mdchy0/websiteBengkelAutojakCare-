<?php
error_reporting(0);
session_start();
require_once("config/koneksi.php");
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username' and password='$password'");
  $jumlah = mysql_num_rows($cekuser);
  $hasil = mysql_fetch_array($cekuser);  

	if($jumlah == 1 && $hasil['status'] == '1') {
		$_SESSION['id_user'] = $hasil['id_user'];
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $hasil['nama'];
		$_SESSION['alamat'] = $hasil['alamat'];
		$_SESSION['hp'] = $hasil['hp'];
	?>
		<script language="JavaScript">	
		document.location='admin/index.php?p=home'</script>

	<?php	
	} else {
	// jika login salah //
	?>
	 <script language="JavaScript">
		alert('Username atau password Anda salah'); 
		document.location='login.php'</script><?php
	echo mysql_error() ;
	}
?>