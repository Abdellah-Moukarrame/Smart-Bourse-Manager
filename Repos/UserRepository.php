<?php
require_once __DIR__ . '/../Classes/Student.php';
require_once __DIR__ . '/../Classes/Admin.php';

class UserRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Ajouter étudiant (User)
    public function addStudent(Student $student)
    {
        // Columns: id_user, nom, age, email, sexe, password, balance
        $stmt = $this->pdo->prepare("INSERT INTO users (nom, age, email, sexe, password, balance) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $student->nom,
            $student->age,
            $student->email,
            $student->sexe,
            $student->password,
            $student->balance
        ]);
    }

    // Chercher étudiant par email
    public function getStudentByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $student = new Student(
                $data['nom'],
                $data['email'],
                $data['password'],
                $data['age'],
                $data['sexe'],
                $data['balance']
            );
            $student->id = $data['id_user'];
            return $student;
        }
        return null;
    }

    public function getStudentById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id_user = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $student = new Student(
                $data['nom'],
                $data['email'],
                $data['password'],
                $data['age'],
                $data['sexe'],
                $data['balance']
            );
            $student->id = $data['id_user'];
            return $student;
        }
        return null;
    }

    // Chercher admin par email
    public function getAdminByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            // Admin constructor: $nom, $email, $password, $age, $sexe
            return new Admin($data['nom'], $data['email'], $data['password'], $data['age'], $data['sexe']);
        }
        return null;
    }

    // Admin Methods
    public function getAllStudents()
    {
        $stmt = $this->pdo->query("SELECT * FROM users ORDER BY id_user DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $students = [];
        foreach ($rows as $data) {
            // Constructor: $nom, $email, $password, $age, $sexe, $balance
            $student = new Student(
                $data['nom'],
                $data['email'],
                $data['password'],
                $data['age'],
                $data['sexe'],
                $data['balance']
            );
            $student->id = $data['id_user'];
            $students[] = $student;
        }
        return $students;
    }

    public function countStudents()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) as count FROM users");
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }

    public function countActiveStudents()
    {
        // Note: 'status' column not mentioned in new schema. Assuming all are active or ignoring.
        // Returning total count for now to avoid errors if status doesn't exist.
        return $this->countStudents();
    }

    // Status toggle removed/commented as 'status' column not in schema provided
    /*
    public function toggleStatus($id)
    {
        // ...
    }
    */

    public function addBalance($id, $amount)
    {
        $sql = "UPDATE users SET balance = balance + ? WHERE id_user = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$amount, $id]);
    }
}
