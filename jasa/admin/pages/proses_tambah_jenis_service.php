<?php 
require "../config/koneksi.php"; 
  
$jenis_service=$_POST['jenis_service'];
$biaya=$_POST['biaya'];

 $sql = "INSERT INTO jenis_service  
           ( 
        id_jenis_service, 
			  jenis_service,
			  biaya
           ) 
 
           VALUES  
           (  
        NULL,
			  '$jenis_service', 
			  '$biaya'
            )"; 

$hasil=mysql_query($sql);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Pembayaran Berhasil Ditambahkan');
document.location='index.php?p=jenis_service'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Pembayaran Gagal Ditambahkan');
document.location='index.php?p=tambah_jenis_service'</script><?php }
?>