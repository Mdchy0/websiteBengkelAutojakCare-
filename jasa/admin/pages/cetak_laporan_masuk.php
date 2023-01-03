<?php
ob_start();
//Koneksi ke database
?>
<?php
include ("../../config/koneksi.php");
include ("../../config/cek.php");
// $bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];

    if($_GET['bulan']=='Januari'){
        $bulan='01';
    }
    else if($_GET['bulan']=='Februari'){
        $bulan='02';
    }
    else if($_GET['bulan']=='Maret'){
        $bulan='03';
    }
    else if($_GET['bulan']=='April'){
        $bulan='04';
    }
    else if($_GET['bulan']=='Mei'){
        $bulan='05';
    }
    else if($_GET['bulan']=='Juni'){
        $bulan='06';
    }
    else if($_GET['bulan']=='Juli'){
        $bulan='07';
    }
    else if($_GET['bulan']=='Agustus'){
        $bulan='08';
    }
    else if($_GET['bulan']=='September'){
        $bulan='09';
    }
    else if($_GET['bulan']=='Oktober'){
        $bulan='10';
    }
    else if($_GET['bulan']=='November'){
        $bulan='11';
    }
    else if($_GET['bulan']=='Desember'){
        $bulan='12';
    }

?>
<style>
td {
    padding: 3px 5px 3px 5px;
    border-right: 1px solid #666666;
    border-bottom: 1px solid #666666;
}
 
.head td {
    font-weight: bold;
    font-size: 12px;
    background: #b7f0ff; 
}
 
table .main tbody tr td {
    font-size: 12px;
}
 
table, table .main {
    width: 100%;
    border-top: 1px solid #666;
    border-left: 1px solid #666;
    border-collapse: collapse;
    background: #fff;
}
 
h1 {
    font-size:20px;
}
</style>
 </head>
 <body>
 <h2 align="Center">Laporan Surat Masuk Bulan <?= $_GET['bulan'];?> Tahun <?= $tahun;?></h2>
 
<table border="1" width="100%">
    <thead>
        <tr>
            <th width="5%"><p align="center">No.</th>
            <th width="15%"><p align="center">No. Surat</th>
            <th width="10%"><p align="center">Tanggal Surat</th>
            <th width="20%"><p align="center">Perihal</th>
            <th width="10%"><p align="center">Pengirim</th>
            <th width="10%"><p align="center">Tanggal Diterima</th>
            <th width="10%"><p align="center">Diterima Oleh</th>
            <th><p align="center">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $query = mysql_query("select * from tbl_surat_masuk join tbl_user using (id_user) where month(tgl_diterima) = '$bulan' and year(tgl_diterima) = '$tahun'");

            while($dt = mysql_fetch_array($query)){
        ?>
        <tr>
            <td align="center"><?= $no++;?></td>
            <td><?php echo $dt['no_surat'];?></td>
            <td align="center"><?php echo $dt['tgl_surat'];?></td>
            <td><?php echo $dt['perihal'];?></td>
            <td><?php echo $dt['pengirim'];?></td>
            <td align="center"><?php echo $dt['tgl_diterima'];?></td>
            <td><?php echo $dt['level'];?></td>
            <td><?php echo $dt['keterangan'];?></td>
        </tr>
       <?php } ?>
</table>

     <br />
    
<?php
date_default_timezone_set('Asia/Jakarta');
 $header = '<table style="border:0">
  <tr style="border:0">
    <td style="border:0">
      <img src="../../assets/logo.png" width="100" /> 
    </td>
    <td style="border:0" align="center"><h2>SMK Muhammadiyah 3 Pekanbaru</h2>
    <br>
      Jl. Cipta Karya
    </td>
    <td style="border:0">&nbsp;</td>
    <td style="border:0">&nbsp;</td>
    <td style="border:0">&nbsp;</td>
    <td style="border:0">&nbsp;</td><td style="border:0">&nbsp;</td><td style="border:0">&nbsp;</td><td style="border:0">&nbsp;</td>
  </tr>
  </table>
<hr align="left" width="896" style="height:inherit"  />
';

$footer = '<table cellpadding=0 cellspacing=0 style="border:none;">
           <tr><td style="margin-right:-5px;border:none;" align="left">
           Dicetak: '.date("d-m-Y H:i").'</td>
       <td style="margin-right:-5px;border:none;" align="right">
           Halaman: {PAGENO} / {nb}</td></tr></table>';            

$out = ob_get_contents();
ob_end_clean();
include("../../assets/mpdf/mpdf.php");
$mpdf=new mPDF('utf-8', "F4-L", 9 ,'Arial', 16, 16, 56, 16, 16, 4);
$mpdf->SetTitle("Laporan Surat Masuk");$mpdf->SetDisplayMode('fullpage');
$mpdf->setHTMLHeader($header);
$mpdf->setHTMLFooter($footer);
$stylesheet = file_get_contents('../../assets/mpdf/mpdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($out);
$mpdf->Output("Laporan Surat Masuk Bulan $bulan Tahun $tahun.pdf", 'I');
?>
</body>
</html>