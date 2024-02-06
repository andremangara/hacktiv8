<?php
require 'panggil.php';

// // Contoh penggunaan
// $contactManager = new ContactManager();

// // Menambahkan kontak
// $contact1 = new Contact(1, 'John Doe', 'john.doe@example.com', '123456789');
// $contactManager->tambahContact($contact1);

// $contact2 = new Contact(2, 'Jane Doe', 'jane.doe@example.com', '987654321');
// $contactManager->tambahContact($contact2);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKontak">
            Tambah Kontak
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalTambahKontak" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kontak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="crud.php?aksi=tambah" method="POST">
                            <div class="form-group">
                                <label for="namaTambah" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="namaTambah" name="namaTambah">
                            </div>
                            <div class="form-group">
                                <label for="emailTambah" class="col-form-label">Email:</label>
                                <input type="text" class="form-control" id="emailTambah" name="emailTambah">
                            </div>
                            <div class="form-group">
                                <label for="notelpTambah" class="col-form-label">No Telp:</label>
                                <input type="text" class="form-control" id="notelpTambah" name="notelpTambah">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Control</th>
                </tr>
            </thead>
            <?php
            $i = 1;
            $contactsArray = $proses->getContactsAll();
            foreach ($contactsArray as $contact) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo $i ?>
                        </th>
                        <td>
                            <?php echo $contact['nama'] ?>
                        </td>
                        <td>
                            <?php echo $contact['email'] ?>
                        </td>
                        <td>
                            <?php echo $contact['nomortelepon'] ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalEdit<?php echo $contact['id'] ?>">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalDelete<?php echo $contact['id'] ?>">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit<?php echo $contact['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="modalEditCenterTitle<?php echo $contact['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Kontak</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="crud.php?aksi=edit" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="id" name="id"
                                            value="<?php echo $contact['id']; ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-form-label">Nama:</label>
                                        <input type="text" class="form-control" id="namaEdit" name="namaEdit"
                                            value="<?php echo $contact['nama']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-form-label">Email:</label>
                                        <input type="text" class="form-control" id="emailEdit" name="emailEdit"
                                            value="<?php echo $contact['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-form-label">Nomor Telepon:</label>
                                        <input type="text" class="form-control" id="nomorteleponEdit"
                                            name="nomorteleponEdit" value="<?php echo $contact['nomortelepon']; ?>">
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
                <div class="modal fade" id="modalDelete<?php echo $contact['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="modalDeleteTitle<?php echo $contact['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Postingan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="crud.php?aksi=hapus" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="id" name="id"
                                            value="<?php echo $contact['id']; ?>" hidden>
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
                <?php
                $i++;
            }
            ?>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>