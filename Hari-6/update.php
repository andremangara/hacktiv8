<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}

// $nama = $_POST['namaForm'];
// $role = $_POST['roleForm'];
// $availability = $_POST['availabilityForm'];
// $age = $_POST['ageForm'];
// $lokasi = $_POST['lokasiForm'];
// $yoe = $_POST['yoeForm'];
// $email = $_POST['emailForm'];

$nama = $_POST['namaForm'];
$role = $_POST['roleForm'];
$availability = $_POST['availabilityForm'];
$age = $_POST['ageForm'];
$lokasi = $_POST['lokasiForm'];
$yoe = $_POST['yoeForm'];
$email = $_POST['emailForm'];

echo $_POST['namaForm'] . $_POST['roleForm'] . $_POST['availabilityForm'] . $_POST['ageForm'] . $_POST['lokasiForm'] . $_POST['yoeForm'] . $_POST['emailForm'];

$sql = "UPDATE user SET nama='$nama', role='$role', availability='$availability', age='$age', lokasi= '$lokasi', yoe='$yoe', email= '$email'  WHERE id_user=1";

if (mysqli_query($conn, $sql)) {
    header("Location:" . $_SERVER['HTTP_REFERER'] . "");
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
$conn->close();
?>