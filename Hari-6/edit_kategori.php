<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}

$id = $_POST['id_kategori'];
$kategori = $_POST['kategoriform'];
//Images
$sql = "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'";

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