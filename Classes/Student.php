<?php
class Student
{
    private $id_user;
    private $nom;
    private $age;
    private $email;
    private $sexe;
    private $password;
    private $balance;

    public function __construct($nom, $email, $password, $age = null, $sexe = null, $balance = 0)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->balance = $balance;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        // Backward compatibility mapping
        if ($property === 'id')
            return $this->id_user;
        if ($property === 'bourse')
            return $this->balance;
        if ($property === 'first_name')
            return $this->nom; // Return full name
        if ($property === 'last_name')
            return ''; // Empty for now
        if ($property === 'phone')
            return 'N/A'; // Not in DB
        if ($property === 'status')
            return 'active'; // Default status

        throw new Exception("Propriété inconnue: $property");
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            if ($property === 'password') {
                $this->$property = password_hash($value, PASSWORD_DEFAULT);
            } else {
                $this->$property = $value;
            }
        }
        // Backward compatibility mapping
        elseif ($property === 'id')
            $this->id_user = $value;
        elseif ($property === 'bourse')
            $this->balance = $value;
        elseif ($property === 'first_name')
            $this->nom = $value; // Overwrite
        else {
            throw new Exception("Propriété inconnue: $property");
        }
    }
}
