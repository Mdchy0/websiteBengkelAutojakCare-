<?php 
require "../config/koneksi.php"; 
  
$id_type_mobil=$_POST['id_type_mobil'];
$type_mobil=$_POST['type_mobil'];

$sql2 = "UPDATE type_mobil SET type_mobil = '$type_mobil' WHERE id_type_mobil = '$id_type_mobil'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=type_mobil'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Diubah');
document.location='index.php?p=edit_type_mobil&id_type_mobil=<?= $id_type_mobil;?>'</script><?php }
?>