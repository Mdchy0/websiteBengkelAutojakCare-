<?php
include "../config/koneksi.php";//sambung ke mysql

//mengambil nilai dari form
$id_user = $_GET['id'];
$status=$_GET['status'];
if($status=='1'){
	$ganti_status = '0';
}
elseif($status=='0'){
	$ganti_status = '1';
}

echo "ID: $id_user, Status: $ganti_status";

$update = mysql_query("UPDATE user SET status = '$ganti_status' WHERE id_user = '$id_user'");

if ($update){
//echo "sukses update data";
?>
<script language="JavaScript">
alert('Status Berhasil Diubah');
document.location='index.php?p=user'
</script>

<?php
}else{
echo "gagal : ".mysql_error();
}
?>