<?php
$nilai = $_REQUEST['nilai'];

if ($nilai >= 85 && $nilai <= 100) {
    echo "Nilai A";
} else if ($nilai >= 75 && $nilai < 85) {
    echo "Nilai B";
} else if ($nilai >= 60 && $nilai < 75) {
    echo "Nilai C";
} else if ($nilai >= 50 && $nilai < 60) {
    echo "Nilai D";
} else if ($nilai >= 0 && $nilai < 50) {
    echo "Nilai E";
} else {
    echo "pe'a";
}
?>