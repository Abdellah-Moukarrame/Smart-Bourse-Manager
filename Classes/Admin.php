<?php
class Admin
{
    private $id_admin;
    private $nom;
    private $age;
    private $email;
    private $sexe;
    private $password;

    public function __construct($nom, $email, $password, $age = null, $sexe = null)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
        $this->sexe = $sexe;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getId()
    {
        return $this->id_admin;
    }
    public function getNom()
    {
        return $this->nom;
    }
}
