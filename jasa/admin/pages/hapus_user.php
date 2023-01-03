<?php
include "../config/koneksi.php";
$id_user = $_GET['id_user'];
$hasil=mysql_query("delete from user where id_user='$id_user'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='index.php?p=user'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='index.php?p=user'</script><?php }
?>