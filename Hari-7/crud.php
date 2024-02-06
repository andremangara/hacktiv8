<?php
require 'panggil.php';

if (!empty($_GET['aksi'] == 'tambah')) {
    $nama = strip_tags($_POST['namaTambah']);
    $telepon = strip_tags($_POST['notelpTambah']);
    $email = strip_tags($_POST['emailTambah']);

    $tabel = 'kontak';
    # proses insert
    $data = new Contact(0, $nama, $email, $telepon);
    $proses->tambahContact($data);
    echo '<script>alert("Tambah Data Berhasil");window.location="index.php"</script>';
} else if (!empty($_GET['aksi'] == 'edit')) {
    $id = strip_tags($_POST['id']);
    $nama = strip_tags($_POST['namaEdit']);
    $telepon = strip_tags($_POST['nomorteleponEdit']);
    $email = strip_tags($_POST['emailEdit']);

    $tabel = 'kontak';
    # proses insert
    $data1 = new Contact($id, $nama, $email, $telepon);
    $proses->editContact($data1);
    echo '<script>alert("Edit Data Berhasil");window.location="index.php"</script>';
} else if (!empty($_GET['aksi'] == 'hapus')) {
    $id = strip_tags($_POST['id']);
    $proses->hapusContact($id);
    echo '<script>alert("Delete Data Berhasil");window.location="index.php"</script>';
}
?>