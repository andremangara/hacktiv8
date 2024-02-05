<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    header("Location: dashboardadmin.php");
} else {
    die("Error Connection" . mysqli_error($conn));
}
mysqli_close($conn);

?>