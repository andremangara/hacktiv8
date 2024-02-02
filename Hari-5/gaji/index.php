<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Gaji</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <h1>PERHITUNGAN GAJI KARYAWAN</h1>
        <div>
            <label for="gapok">Gaji Pokok:</label>
            <input type="number" id="gapok" name="gapok" min="0" required /><br>
            <label for="tunjangan">Tunjangan:</label>
            <input type="number" id="tunjangan" name="tunjangan" min="0" required /><br>
            <label for="potongan">Potongan:</label>
            <input type="number" id="potongan" name="potongan" min="0" required />
        </div>
        <button type="submit" value="submit" name="submit">Submit</button>
    </form>
    <?php if (isset($_POST['submit'])): ?>
        <?php
        include 'hitunggaji.php';
        ?>
        <p>Maaci sudah ngitungin gajiku!</p>
    <?php endif; ?>
</body>

</html>