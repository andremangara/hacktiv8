<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}

$id = $_POST['id'];
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$konten = $_POST['konten'];
//Images
$images = $_FILES['fileToUpload']['name'];
$namaSementara = $_FILES['fileToUpload']['tmp_name'];
$target_dir = 'img/';
$target_file = $target_dir . basename($images);
$terupload = move_uploaded_file($namaSementara, $target_file);
$sql = "UPDATE postingan SET judul='$judul', kategori='$kategori', konten='$konten', images='$target_file' WHERE id_postingan='$id'";

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