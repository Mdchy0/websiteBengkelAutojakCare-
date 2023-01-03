<?php
include "../config/koneksi.php";
$id_type_mobil = $_GET['id_type_mobil'];
$hasil=mysql_query("delete from type_mobil where id_type_mobil='$id_type_mobil'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='index.php?p=type_mobil'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='index.php?p=type_mobil'</script><?php }
?>