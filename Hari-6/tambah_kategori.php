<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}

//Form
$kategori = $_POST['kategoriform'];

// Pindahkan file
$sql = "INSERT INTO kategori (kategori) VALUES ('$kategori')";

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