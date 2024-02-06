<?php
class ContactManager
{
    protected $db;
    function __construct($db)
    {
        $this->db = $db;
    }

    private $contacts = [];

    public function tambahContact(Contact $contact)
    {
        $sql = "INSERT INTO kontak (nama, email, nomortelepon) VALUES ('$contact->nama', '$contact->email', '$contact->nomorTelepon')";
        $row = $this->db->prepare($sql);
        return $row->execute();
    }

    public function editContact(Contact $contact)
    {
        echo $contact->nama;
        echo $contact->email;
        echo $contact->nomorTelepon;
        echo $contact->id;

        $sql = "UPDATE kontak SET nama = '$contact->nama', email = '$contact->email', nomortelepon = '$contact->nomorTelepon' WHERE id = '$contact->id'";
        $row = $this->db->prepare($sql);
        return $row->execute();
    }

    public function hapusContact($id)
    {
        $sql = "DELETE FROM kontak WHERE id = $id;";
        $row = $this->db->prepare($sql);
        return $row->execute();
    }

    public function getContactsAll()
    {
        $row = $this->db->prepare("SELECT * FROM kontak");
        $row->execute();
        return $hasil = $row->fetchAll();
    }
}
?>