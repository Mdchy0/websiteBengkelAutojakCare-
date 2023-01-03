<?php 
require "../config/koneksi.php"; 
  
$type_mobil=$_POST['type_mobil'];

 $sql = "INSERT INTO type_mobil  
           ( 
        id_type_mobil, 
			  type_mobil
           ) 
 
           VALUES  
           (  
        NULL,
			  '$type_mobil'
            )"; 

$hasil=mysql_query($sql);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Pembayaran Berhasil Ditambahkan');
document.location='index.php?p=type_mobil'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Pembayaran Gagal Ditambahkan');
document.location='index.php?p=tambah_type_mobil'</script><?php }
?>