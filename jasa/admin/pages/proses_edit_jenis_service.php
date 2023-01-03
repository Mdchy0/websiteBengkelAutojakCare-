<?php 
require "../config/koneksi.php"; 
  
$id_jenis_service=$_POST['id_jenis_service'];
$jenis_service=$_POST['jenis_service'];
$biaya=$_POST['biaya'];

$sql2 = "UPDATE jenis_service SET jenis_service = '$jenis_service', biaya = '$biaya' WHERE id_jenis_service = '$id_jenis_service'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=jenis_service'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Diubah');
document.location='index.php?p=edit_jenis_service&id_jenis_service=<?= $id_jenis_service;?>'</script><?php }
?>