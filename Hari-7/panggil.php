<?php
// panggil file
include 'koneksi.php';
include 'contact.php';
include 'contactmanager.php';
// cara panggil class di koneksi php
$db = new Koneksi();
// cara panggil koneksi di fungsi DBConnect()
$koneksi = $db->DBConnect();
// panggil class prosesCrud di file prosescrud.php
$proses = new ContactManager($koneksi);
// menghilangkan pesan error
// error_reporting(0);
?>