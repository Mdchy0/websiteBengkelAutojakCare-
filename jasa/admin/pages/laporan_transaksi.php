<?php
ob_start();
session_start();
error_reporting(0);
//Koneksi ke database
?>
<?php
include("../../config/koneksi.php");
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

  table,
  table .main {
    width: 100%;
    border-top: 1px solid #666;
    border-left: 1px solid #666;
    border-collapse: collapse;
    background: #fff;
  }

  h1 {
    font-size: 20px;
  }
</style>
</head>

<body>
  <?php
  $tgl_awal = $_GET['tgl_awal'];
  $tgl_akhir = $_GET['tgl_akhir'];

  ?>
  <h2 align="Center">Laporan Transaksi Tanggal <?= $tgl_awal; ?> Sampai <?= $tgl_akhir; ?></h2>



  <table border='1' style="width:100%">
    <thead>
      <tr>
        <th>No.</th>
        <th>No. Antrian</th>
        <th>Jam Daftar</th>
        <th>Nama</th>
        <th>No. Plat</th>
        <th>Jenis service</th>
        <th>Total Biaya</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $nomor = 1;
      $grand_total = 0;
      $sqll = "select * from transaksi join pendaftaran using (id_pendaftaran) join jenis_service using(id_jenis_service) join customer where pendaftaran.id_customer=customer.id_customer and tanggal between '$tgl_awal' and '$tgl_akhir' order by id_transaksi desc";
      $resultt = mysql_query($sqll);
      while ($data = mysql_fetch_array($resultt)) {
        $grand_total = $grand_total + $data['total_biaya'];
      ?>
        <tr>
          <td><?= $nomor++; ?></td>
          <td><?= $data['no_antrian']; ?></td>
          <td><?= $data['jam_pendaftaran']; ?></td>
          <td><?= $data['nama']; ?></td>
          <td><?= $data['nomor_plat']; ?></td>
          <td><?= $data['jenis_service']; ?></td>
          <td align="right"><?= number_format($data['total_biaya'], 2); ?></td>
          <td><?= $data['status']; ?></td>
        </tr>

      <?php
      }
      ?>
      <tr>
        <td colspan="6" align="right"><b>Grand Total</b>
        <td align="right">Rp. <?= number_format($grand_total, 2); ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <hr>
  <br>

  <br />
  <?php
  date_default_timezone_set('Asia/Jakarta'); ?>
  <table width="787" cellpadding=0 cellspacing=0 style="border:none;" align="center">
    <tr style="border:none">
      <td width="212" style="border:none">
        <div align="center">&nbsp;</div>
      </td>
      <td width="352" style="border:none">&nbsp;</td>
      <td width="352" style="border:none">&nbsp;</td>
      <td width="209" style="border:none">
        <div align="center"><span class="style1">
            Pekanbaru, <?php echo date("d M Y"); ?>
          </span></div>
      </td>
    </tr>
    <tr style="border:none">
      <td width="212" style="border:none">
        <div align="center">&nbsp;</div>
      </td>
      <td width="352" style="border:none">&nbsp;</td>
      <td width="352" style="border:none">&nbsp;</td>
      <td width="209" style="border:none">
        <div align="center">Admin</div>
      </td>
    </tr>

    <tr style="border:none">
      <td style="border:none">
        <div align="center"></div>
      </td>
      <td style="border:none">&nbsp;</td>
      <td width="352" style="border:none">&nbsp;</td>
      <td style="border:none">
        <div align="center"></div>
      </td>
    </tr>
    <tr style="border:none">
      <td style="border:none">
        <div align="center"></div>
      </td>
      <td style="border:none">&nbsp;</td>
      <td width="352" style="border:none">&nbsp;</td>
      <td style="border:none">
        <div align="center"></div>
      </td>
    </tr>
    <tr style="border:none">
      <td style="border:none">
        <div align="center"></div>
      </td>
      <td style="border:none">&nbsp;</td>
      <td width="352" style="border:none">&nbsp;</td>
      <td style="border:none">
        <div align="center"></div>
      </td>
    </tr style="border:none">
    <tr style="border:none">
      <td style="border:none">
        <div align="center"><u>&nbsp;</u></div>
      </td>
      <td style="border:none">&nbsp;</td>
      <td width="352" style="border:none">&nbsp;</td>
      <td style="border:none">
        <pre><div align="center"> <u><?= $_SESSION['nama']; ?></u> </div></pre>
      </td>
    </tr>

  </table>
  <?php
  date_default_timezone_set('Asia/Jakarta');
  $header = '<p align="center"><img src="../../images/logo1.png" width="100" height="100" />
<div align="center">Jl. HR. Soebrantas Km 1.6 Panam <br> No. HP 082286827094</div>
 </p>
<hr align="left" width="896" style="height:inherit"  /> 

';

  $footer = '<table cellpadding=0 cellspacing=0 style="border:none;">
           <tr><td style="margin-right:-5px;border:none;" align="left">
           Dicetak: ' . date("d-m-Y H:i") . '</td>
       <td style="margin-right:-5px;border:none;" align="right">
           Halaman: {PAGENO} / {nb}</td></tr></table>';

  $out = ob_get_contents();
  ob_end_clean();
  include("../../assets/mpdf/mpdf.php");
  $mpdf = new mPDF('utf-8', "F4-L", 9, 'Arial', 16, 16, 56, 16, 16, 4);
  $mpdf->SetTitle("Laporan tranksaksi");
  $mpdf->SetDisplayMode('fullpage');
  $mpdf->setHTMLHeader($header);
  $mpdf->setHTMLFooter($footer);
  $stylesheet = file_get_contents('../../assets/mpdf/mpdf.css');
  $mpdf->WriteHTML($stylesheet, 1);
  $mpdf->WriteHTML($out);
  $mpdf->Output("Laporan Transaksi Tanggal $tgl_awal sampai $tgl_akhir.pdf", 'I');
  ?>
</body>

</html>