<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}

//Form
$nama = $_POST['nama_user'];
$role = $_POST['role_user'];
$availability = $_POST['availability_user'];
$age = $_POST['age_user'];
$lokasi = $_POST['lokasi_user'];
$yoe = $_POST['yoe_user'];
$email = $_POST['email_user'];

// Pindahkan file
$sql = "INSERT INTO user (nama, role, availability, age, lokasi, yoe, email) VALUES ('$nama', '$role', '$availability', '$age', '$lokasi', '$yoe', '$email')";

// Jika terupload image, query
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