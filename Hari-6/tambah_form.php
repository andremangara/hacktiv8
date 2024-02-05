<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}

//Form
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$konten = $_POST['konten'];

//Images
$images = $_FILES['fileToUpload']['name'];
$namaSementara = $_FILES['fileToUpload']['tmp_name'];
$target_dir = 'img/';
$target_file = $target_dir . basename($images);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Pindahkan file
$terupload = move_uploaded_file($namaSementara, $target_file);
$sql = "INSERT INTO postingan (judul, kategori, konten, images) VALUES ('$judul', '$kategori', '$konten', '$target_file')";

// Jika terupload image, query
if ($terupload) {
    if (mysqli_query($conn, $sql)) {
        header("Location:" . $_SERVER['HTTP_REFERER'] . "");
        // echo "masuk";
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
} else {
    echo "Upload Gagal!";
}

// Close connection
mysqli_close($conn);
?>