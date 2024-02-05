<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}

$id = $_POST['id_user'];
$nama = $_POST['nama_user'];
$role = $_POST['role_user'];
$availability = $_POST['availability_user'];
$age = $_POST['age_user'];
$lokasi = $_POST['lokasi_user'];
$yoe = $_POST['yoe_user'];
$email = $_POST['email_user'];
//Images
$sql = "UPDATE user SET nama='$nama', role='$role', availability='$availability', age='$age', lokasi='$lokasi', yoe='$yoe', email='$email' WHERE id_user='$id'";

if (mysqli_query($conn, $sql)) {
    header("Location:" . $_SERVER['HTTP_REFERER'] . "");
    // echo "masuk";
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>