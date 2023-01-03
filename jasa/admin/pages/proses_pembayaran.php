<?php 
require "../config/koneksi.php"; 
  
$id_pendaftaran=$_POST['id_pendaftaran'];
$id_user=$_POST['id_user'];
$status=$_POST['status'];
$no_nota=$_POST['no_nota'];
$tanggal=$_POST['tanggal'];
$total=$_POST['total'];
$bayar=$_POST['bayar'];
$kembali=$_POST['kembali'];
$nama_mekanik=$_POST['nama_mekanik'];

 $sql = "INSERT INTO transaksi  
           ( 
        id_transaksi, 
			  id_pendaftaran,
			  no_nota,
			  tanggal,
			  bayar,
			  kembali,
			  total,
			  status,
			  id_user,
			  nama_mekanik
           ) 
 
           VALUES  
           (  
        NULL,
			  '$id_pendaftaran', 
			  '$no_nota', 
			  '$tanggal',
			  '$bayar',
			  '$kembali',  
			  '$total',
			  '$status',
			  '$id_user',
			  '$nama_mekanik'  
            )"; 

$hasil=mysql_query($sql);

$sql2 = "UPDATE pendaftaran SET status = 'Lunas' WHERE id_pendaftaran = '$id_pendaftaran'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Pembayaran Berhasil Ditambahkan');
document.location='index.php?p=pendaftaran'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Pembayaran Gagal Ditambahkan');
document.location='index.php?p=tambah_pembayaran&id_pendaftaran=<?= $id_pendaftaran;?>'</script><?php }
?>