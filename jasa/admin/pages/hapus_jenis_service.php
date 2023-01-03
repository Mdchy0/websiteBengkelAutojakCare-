<?php
include "../config/koneksi.php";
$id_jenis_service = $_GET['id_jenis_service'];
$hasil=mysql_query("delete from jenis_service where id_jenis_service='$id_jenis_service'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='index.php?p=jenis_service'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='index.php?p=jenis_service'</script><?php }
?>