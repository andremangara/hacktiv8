<?php
$gapok = $_REQUEST['gapok'];
$tunjangan = $_REQUEST['tunjangan'];
$potongan = $_REQUEST['potongan'];

$gajibruto = $gapok + $tunjangan;
$pajak = $gajibruto * 0.1;
$asuransi = $gajibruto * 0.05;
$gajibersih = $gajibruto - $pajak - $asuransi;


echo "Gaji Bruto = Rp. " . number_format($gajibruto, 2, ",", ".") . "<br>";
echo "Pajak Pendapatan = Rp. " . number_format($pajak, 2, ",", ".") . "<br>";
echo "Asuransi Kesehatan = Rp. " . number_format($asuransi, 2, ",", ".") . "<br>";
echo "Gaji Bersih = Rp. " . number_format($gajibersih, 2, ",", ".") . "<br>";
?>