<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan gaji</title>
</head>

<body>
    <h1> Perhitungan Gaji Karyawan </h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="gapok">Gaji Pokok</label>
    <input type="text" name="gaji_pokok" id="gaji_pokok"> <br>

    <label for="tunjangan">Tunjangan</label>
    <input type="text" name="tunjangan" id="tunjangan"> <br>

    <label for="potongan">Potongan</label>
    <input type="text" name="potongan" id="potongan"> <br>
    <button type="submit">Kalkulator Gaji</button>
    </form>

    <?php
      function hitungGajiBersih($gaji_pokok, $tunjangan, $potongan)
      {
        if (!is_numeric($gaji_pokok) || !is_numeric($tunjangan) || !is_numeric($potongan) ||
              $gaji_pokok < 0 || $tunjangan < 0 || $potongan < 0) {
              echo "Input tidak valid. Pastikan semua nilai adalah numerik dan tidak negatif.";
              return;
          }
          $gaji_bruto = $gaji_pokok + $tunjangan;
          $pajak_penghasilan = 0.1 * $gaji_bruto;
          $asuransi_kesehatan = 0.05 * $gaji_bruto;
          $gaji_bersih = $gaji_bruto - $pajak_penghasilan - $asuransi_kesehatan;

          echo "<h2>Hasil Perhitungan:</h2>";
          echo "Gaji Bruto: $gaji_bruto<br>";
          echo "Pajak Penghasilan: $pajak_penghasilan<br>";
          echo "Asuransi Kesehatan: $asuransi_kesehatan<br>";
          echo "Gaji Bersih: $gaji_bersih<br>";
      }
  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $gaji_pokok = filter_input(INPUT_POST, 'gaji_pokok', FILTER_VALIDATE_FLOAT);
          $tunjangan = filter_input(INPUT_POST, 'tunjangan', FILTER_VALIDATE_FLOAT);
          $potongan = filter_input(INPUT_POST, 'potongan', FILTER_VALIDATE_FLOAT);
  
          if ($gaji_pokok !== false && $tunjangan !== false && $potongan !== false) {
              hitungGajiBersih($gaji_pokok, $tunjangan, $potongan);
          } else {
              echo "Input tidak valid. Pastikan semua nilai adalah numerik.";
          }
      }
    ?>

</body>