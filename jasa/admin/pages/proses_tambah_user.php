<?php 
require "../config/koneksi.php"; 
  
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$hp=$_POST['hp'];
$status='1';
$username=$_POST['username'];
$password= md5($_POST['password']);

 $sql = "INSERT INTO user  
           ( 
        id_user, 
			  username,
			  password,
        nama,
        alamat,
        hp,
        status
           ) 
 
           VALUES  
           (  
        NULL,
			  '$username', 
        '$password', 
        '$nama', 
        '$alamat', 
        '$hp', 
			  '$status'
            )"; 

$hasil=mysql_query($sql);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data User Berhasil Ditambahkan');
document.location='index.php?p=user'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data User Gagal Ditambahkan');
document.location='index.php?p=tambah_user'</script><?php }
?>