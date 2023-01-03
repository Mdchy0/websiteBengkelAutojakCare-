<?php 
require "../config/koneksi.php"; 
  
$id_pendaftaran=$_POST['id_pendaftaran'];
$status=$_POST['status'];

$sql2 = "UPDATE pendaftaran SET status = '$status' WHERE id_pendaftaran = '$id_pendaftaran'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Status Berhasil Diubah');
document.location='index.php?p=pendaftaran'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Status Gagal Diubah');
document.location='index.php?p=pendaftaran'</script><?php }
?>