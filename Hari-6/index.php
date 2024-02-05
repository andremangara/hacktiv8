<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Layout 1 Kolom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            color: #000;
        }

        #formProfile {
            display: none;
        }
    </style>
    <?php
    include "show.php";
    ?>
    <script>
        // function untuk show dan hide form
        function showHide() {
            var x = document.getElementById("formProfile");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        // mengisi nilai dari form ke profile
        function isiform() {
            console.log(document.getElementById("namaForm").value);
            document.getElementById("nama").innerHTML = document.getElementById("namaForm").value;
            document.getElementById("role").innerHTML = document.getElementById("roleForm").value;
            document.getElementById("availability").innerHTML = document.getElementById("availabilityForm").value;
            document.getElementById("usia").innerHTML = document.getElementById("ageForm").value;
            document.getElementById("lokasi").innerHTML = document.getElementById("lokasiForm").value;
            document.getElementById("yoe").innerHTML = document.getElementById("yoeForm").value;
            document.getElementById("email").innerHTML = document.getElementById("emailForm").value;
            showHide();
        }
    </script>
</head>

<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">BLOG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">INVENTORY</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian Profile -->
    <main class="container border">
        <div class="row">
            <div class="col-md-2 py-5">
                <div class="col-md-2">
                    <img style="border-radius: 100%;" src="<?php echo $photo ?>" alt="Ini adalah teks alternatif" />
                </div>
            </div>
            <div class="col-md-4 py-5">
                <h2 id="nama">
                    <?php echo $nama ?>
                </h2><br>
                <div id="role">
                    <?php echo $role ?>
                </div> <br>
                <button type="button" class="btn btn-primary" onclick="showHide()">Edit</button> <button type="button"
                    class="btn btn-outline-secondary">Resume</button>
            </div>
            <div class="col-md-6 py-5">
                <table>
                    <thead>
                        <tr>
                            <td>
                                <h4 for="Availability">Availability</h4>
                            </td>
                            <td style="padding-left: 20px;">
                                <h5 id="availability">
                                    <?php echo $availability ?>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 for="Usia">Usia</h4>
                            </td>
                            <td style="padding-left: 20px;">
                                <h5 id="usia">
                                    <?php echo $age ?>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 for="lokasi">Lokasi</h4>
                            </td>
                            <td style="padding-left: 20px;">
                                <h5 id="lokasi">
                                    <?php echo $lokasi ?>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 for="YoE">Pengalaman</h4>
                            </td>
                            <td style="padding-left: 20px;">
                                <h5 id="yoe">
                                    <?php echo $yoe ?> Tahun
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 for="email">Email</h4>
                            </td>
                            <td style="padding-left: 20px;">
                                <h5 id="email">
                                    <?php echo $email ?>
                                </h5>
                            </td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Bagian Form -->
    <div class="container" id="formProfile">
        <div class="row">
            <div class="col-12 py-5">
                <form action="update.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="namaForm" name="namaForm" placeholder="Enter nama">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="roleForm" name="roleForm" placeholder="Enter role">
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <input type="text" class="form-control" id="availabilityForm" name="availabilityForm"
                            placeholder="Enter availability">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="ageForm" name="ageForm" placeholder="Enter age">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasiForm" name="lokasiForm"
                            placeholder="Enter lokasi">
                    </div>
                    <div class="form-group">
                        <label for="yoe">Years Experience</label>
                        <input type="text" class="form-control" id="yoeForm" name="yoeForm"
                            placeholder="Enter years experience">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="emailForm" name="emailForm"
                            placeholder="Enter email">
                    </div>
                    <div style="padding-top: 20px;">
                        <button type="submit" class=" w-100 btn-success btn-lg btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>