<?php

class Contact
{
    public $id;
    public $nama;
    public $email;
    public $nomorTelepon;

    public function __construct($id, $nama, $email, $nomorTelepon)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->email = $email;
        $this->nomorTelepon = $nomorTelepon;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getNomorTelepon()
    {
        return $this->nomorTelepon;
    }
}
?>