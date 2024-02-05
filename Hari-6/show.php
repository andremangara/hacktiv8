<?php
$conn = mysqli_connect("localhost", "root", "", "portofolio");
if ($conn === false) {
    die("Error Connection" . mysqli_connect_error());
}
$sql = "SELECT * FROM user WHERE id_user = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $nama = $row["nama"];
        $role = $row["role"];
        $availability = $row["availability"];
        $age = $row["age"];
        $lokasi = $row["lokasi"];
        $yoe = $row["yoe"];
        $email = $row["email"];
        $photo = $row["photo"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>