<?php 
require "../config/koneksi.php"; 
  
$id_user=$_POST['id_user'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$hp=$_POST['hp'];
$username=$_POST['username'];
$password= md5($_POST['password']);

$sql2 = "UPDATE user SET nama = '$nama', alamat = '$alamat', hp = '$hp', username = '$username', password = '$password' WHERE id_user = '$id_user'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=user'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Diubah');
document.location='index.php?p=edit_user&id_user=<?= $id_user;?>'</script><?php }
?>