<?php 
require "../config/koneksi.php"; 

$next=$_POST['next'];
$id_customer=$_POST['id_customer'];  
$nama=$_POST['nama'];
$no_hp=$_POST['no_hp'];
$alamat= $_POST['alamat'];
$nomor_plat=$_POST['nomor_plat'];
$type_mobil=$_POST['type_mobil'];
$no_antrian=$_POST['no_antrian'];
$id_jenis_service=$_POST['id_jenis_service'];
$nomor_plat=$_POST['nomor_plat'];
$total_biaya=$_POST['total_biaya'];
$tgl_pendaftaran=$_POST['tgl_pendaftaran'];
date_default_timezone_set('Asia/Jakarta');
// $jam_pendaftaran=date("H:i:s");
$jam_pendaftaran=$_POST['jam_pendaftaran'];

$cek = mysql_query("SELECT count(id_pendaftaran) as jumlah_daftar FROM pendaftaran WHERE jam_pendaftaran = '$jam_pendaftaran'");
$htg = mysql_fetch_array($cek);
$jumlahnya = $htg['jumlah_daftar'];
if($jumlahnya!=0){
?>
<script language="JavaScript">
alert('Maaf, Jam Yang Anda Inginkan Sudah Dibooking, Silahkan Pilih Jam Yang Lainnya');
document.location='../index.php'</script>
<?php 
}
else{

if($next>'30'){
	?>
<script language="JavaScript">
alert('Maaf, Antrian Hari Ini Sudah Penuh, Silahkan Daftar Kembali Di Hari Berikutnya');
document.location='../index.php'</script>	

<?php 
} elseif ($next<='30') {

$queryy = "insert into customer(id_customer, nama, no_hp, alamat, nomor_plat, type_mobil) values('$id_customer','$nama', '$no_hp', '$alamat', '$nomor_plat', '$type_mobil')" ;
$hasill = mysql_query($queryy);

$query = "insert into pendaftaran(id_pendaftaran, no_antrian, id_customer, id_jenis_service, tgl_pendaftaran, jam_pendaftaran, total_biaya, status) values(NULL,'$no_antrian', '$id_customer', '$id_jenis_service', '$tgl_pendaftaran', '$jam_pendaftaran', '$total_biaya', 'Pendaftaran')" ;
$hasil = mysql_query($query);
}
//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Pendaftaran Anda Berhasil Dilakukan, Silahkan Datang Ke service Kami Maksimal 10 Menit Dari Sekarang');
document.location='../laporan/struk.php?id=<?php echo $no_antrian;?>'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Pendaftaran Gagal Dilakukan');
document.location='../index.php'</script>
<?php 
}
}
?>