<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admin Dashboard</title>
    <style>
        .container {
            width: 100%;
            min-height: 50vh;
            background-color: linear-gradient(135deg, #0dcaf0, #0d6efd);
            padding: 50px;
        }
    </style>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "portofolio");
    if ($conn === false) {
        die("Error Connection" . mysqli_connect_error());
    }
    $sql = "SELECT * FROM postingan";
    $sql2 = "SELECT * FROM kategori";
    $sql3 = "SELECT * FROM user";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    $result4 = $conn->query($sql2);
    $result5 = $conn->query($sql2);
    $conn->close();
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Tugas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="dashboardadmin.php">Admin</a>
                </li>
            </ul>
            <span class="navbar-text">
                Tugas website blog
            </span>
        </div>
    </nav>
    <!-- Tabel Postingan -->
    <div class="container">
        <h1>Dashboard Admin</h1>
        <h3>Table Postingan</h3>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAdd">
                Tambah Postingan
            </button>
        </div>
        <!-- Modal Add -->
        <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalAddTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Postingan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="tambah_form.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul" class="col-form-label">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul">
                            </div>
                            <div class="form-group">
                                <label for="kategori" class="col-form-label">Kategori:</label>
                                <!-- <input type="text" class="form-control" id="kategori" name="kategori"> -->
                                <select class="form-select form-select-sm" aria-label="Small select example"
                                    name="kategori">
                                    <?php
                                    while (
                                        $category = mysqli_fetch_array(
                                            $result2,
                                            MYSQLI_ASSOC
                                        )
                                    ):
                                        ;
                                        ?>
                                        <option value="<?php echo $category["id_kategori"]; ?>">
                                            <?php echo $category["kategori"]; ?>
                                        </option>
                                        <?php
                                    endwhile;
                                    // While loop must be terminated
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="konten" class="col-form-label">Konten:</label>
                                <textarea class="form-control" id="konten" name="konten"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Image:</label>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Konten</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Images</th>
                    <th scope="col">Control</th>
                </tr>
            </thead>
            <?php
            $i = 1;
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tbody>
                        <tr>
                            <?php $rowID = $row["id_postingan"] ?>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $row['judul']; ?>
                            </td>
                            <td>
                                <?php echo $row['konten']; ?>
                            </td>
                            <td>
                                <?php echo $row['kategori']; ?>
                            </td>
                            <td>
                                <?php echo $row['images']; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalCenter<?php echo $row['id_postingan'] ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModalDelete<?php echo $row['id_postingan'] ?>">Delete</button>
                                </div>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="exampleModalCenter<?php echo $row['id_postingan'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalCenterTitle<?php echo $row['id_postingan'] ?>"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Postingan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="edit_form.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="id" name="id"
                                                value="<?php echo $row['id_postingan']; ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul" class="col-form-label">Judul:</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                value="<?php echo $row['judul']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori" class="col-form-label">Kategori:</label>
                                            <select class="form-select form-select-sm" aria-label="Small select example"
                                                name="kategori">
                                                <option value="">Select Kategori</option>
                                                <?php
                                                $conn = mysqli_connect("localhost", "root", "", "portofolio");
                                                $sql2 = "SELECT * FROM kategori";
                                                $result4 = $conn->query($sql2);
                                                // Tampilkan data kategori sebagai opsi
                                                while ($rowkategori = $result4->fetch_assoc()) {
                                                    $selected = ($rowkategori['id_kategori'] == $row['kategori']) ? 'selected' : '';
                                                    echo '<option value="' . $rowkategori['id_kategori'] . '" ' . $selected . '>' . $rowkategori['kategori'] . '</option>';
                                                }

                                                // $conn->close();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="konten" class="col-form-label">Konten:</label>
                                            <textarea class="form-control" id="konten"
                                                name="konten"><?php echo $row['konten']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="col-form-label">Image:</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete -->
                    <div class="modal fade" id="exampleModalDelete<?php echo $row['id_postingan'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalDeleteTitle<?php echo $row['id_postingan'] ?>"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Postingan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="delete_form.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="id" name="id"
                                                value="<?php echo $row['id_postingan']; ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="konten" class="col-form-label">Yakin delete konten ini?</label>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                }
            } ?>
        </table>
    </div>
    <!-- Tabel Kategori -->
    <div class="container">
        <h3>Table Kategori</h3>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategori">
                Tambah Kategori
            </button>
        </div>
        <!-- Modal Add -->
        <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahKategoriLongTitle">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="tambah_kategori.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="kategoriform" class="col-form-label">Kategori:</label>
                                <input type="text" class="form-control" id="kategoriform" name="kategoriform">
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Control</th>
                </tr>
            </thead>
            <?php
            $i = 1;
            if ($result5->num_rows > 0) {
                // output data of each row
                while ($row = $result5->fetch_assoc()) {
                    ?>
                    <tbody>
                        <tr>
                            <?php $rowID = $row["id_kategori"] ?>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $row['kategori']; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#kategoriModalEdit<?php echo $row['id_kategori'] ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#kategoriModalDelete<?php echo $row['id_kategori'] ?>">Delete</button>
                                </div>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="kategoriModalEdit<?php echo $row['id_kategori'] ?>" tabindex="-1" role="dialog"
                        aria-labelledby="kategoriModalEditTitle<?php echo $row['id_kategori'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="edit_kategori.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="id_kategori" name="id_kategori"
                                                value="<?php echo $row['id_kategori']; ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategoriform" class="col-form-label">Kategori:</label>
                                            <input type="text" class="form-control" id="kategoriform" name="kategoriform"
                                                value="<?php echo $row['kategori']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete -->
                    <div class="modal fade" id="kategoriModalDelete<?php echo $row['id_kategori'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="kategoriModalDeleteTitle<?php echo $row['id_kategori'] ?>"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="kategoriModalLongTitle">Delete Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="delete_kategori.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="id_kategori" name="id_kategori"
                                                value="<?php echo $row['id_kategori']; ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="konten" class="col-form-label">Yakin delete kategori ini?</label>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                }
            } ?>
        </table>
    </div>
    <!-- Tabel User -->
    <div class="container">
        <h3>Table User</h3>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUser">
                Tambah User
            </button>
        </div>
        <!-- Modal Add -->
        <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="tambahUserTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahUserLongTitle">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="tambah_user.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama_user" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama_user" name="nama_user">
                            </div>
                            <div class="form-group">
                                <label for="role_user" class="col-form-label">Role:</label>
                                <input type="text" class="form-control" id="role_user" name="role_user">
                            </div>
                            <div class="form-group">
                                <label for="availability_user" class="col-form-label">Availability:</label>
                                <input type="text" class="form-control" id="availability_user" name="availability_user">
                            </div>
                            <div class="form-group">
                                <label for="age_user" class="col-form-label">Umur:</label>
                                <input type="text" class="form-control" id="age_user" name="age_user">
                            </div>
                            <div class="form-group">
                                <label for="lokasi_user" class="col-form-label">Lokasi:</label>
                                <textarea class="form-control" id="lokasi_user" name="lokasi_user"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="yoe_user" class="col-form-label">Year of Experience:</label>
                                <input type="text" class="form-control" id="yoe_user" name="yoe_user">
                            </div>
                            <div class="form-group">
                                <label for="email_user" class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="email_user" name="email_user">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Role</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Year of Experience</th>
                    <th scope="col">Email</th>
                    <th scope="col">Control</th>
                </tr>
            </thead>
            <?php
            $i = 1;
            if ($result3->num_rows > 0) {
                // output data of each row
                while ($row = $result3->fetch_assoc()) {
                    ?>
                    <tbody>
                        <tr>
                            <?php $rowID = $row["id_user"] ?>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $row['nama']; ?>
                            </td>
                            <td>
                                <?php echo $row['role']; ?>
                            </td>
                            <td>
                                <?php echo $row['availability']; ?>
                            </td>
                            <td>
                                <?php echo $row['age']; ?>
                            </td>
                            <td>
                                <?php echo $row['lokasi']; ?>
                            </td>
                            <td>
                                <?php echo $row['yoe']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#userModalEdit<?php echo $row['id_user'] ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#userModalDelete<?php echo $row['id_user'] ?>">Delete</button>
                                </div>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="userModalEdit<?php echo $row['id_user'] ?>" tabindex="-1" role="dialog"
                        aria-labelledby="userModalEditTitle<?php echo $row['id_user'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="edit_user.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="id_user" name="id_user"
                                                value="<?php echo $row['id_user']; ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_user" class="col-form-label">Nama:</label>
                                            <input type="text" class="form-control" id="nama_user" name="nama_user"
                                                value="<?php echo $row['nama']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="role_user" class="col-form-label">Role:</label>
                                            <input type="text" class="form-control" id="role_user" name="role_user"
                                                value="<?php echo $row['role']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="availability_user" class="col-form-label">Availability:</label>
                                            <input type="text" class="form-control" id="availability_user"
                                                name="availability_user" value="<?php echo $row['availability']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="age_user" class="col-form-label">Umur:</label>
                                            <input type="text" class="form-control" id="age_user" name="age_user"
                                                value="<?php echo $row['age']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi_user" class="col-form-label">Lokasi:</label>
                                            <textarea class="form-control" id="lokasi_user"
                                                name="lokasi_user"><?php echo $row['lokasi']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="yoe_user" class="col-form-label">Year of Experience:</label>
                                            <input type="text" class="form-control" id="yoe_user" name="yoe_user"
                                                value="<?php echo $row['yoe']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email_user" class="col-form-label">Email:</label>
                                            <input type="email" class="form-control" id="email_user" name="email_user"
                                                value="<?php echo $row['email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete -->
                    <div class="modal fade" id="userModalDelete<?php echo $row['id_user'] ?>" tabindex="-1" role="dialog"
                        aria-labelledby="userModalDeleteTitle<?php echo $row['id_user'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userModalLongTitle">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="delete_user.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="id_user" name="id_user"
                                                value="<?php echo $row['id_user']; ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="konten" class="col-form-label">Yakin delete user ini?</label>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                }
            } ?>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>