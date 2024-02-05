<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}

$id = $_POST['id'];

$sql = "DELETE FROM postingan WHERE id_postingan = $id;";

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