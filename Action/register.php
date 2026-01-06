<?php
session_start();
require_once __DIR__ . '/../Config/config.php';
require_once __DIR__ . '/../Repos/UserRepository.php';
require_once __DIR__ . '/../Classes/Student.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? ''; // Not in DB anymore, ignoring
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Simple validation
    if ($password !== $confirm_password) {
        header("Location: /View/auth/register.php?error=Les mots de passe ne correspondent pas");
        exit;
    }

    $repo = new UserRepository($pdo);

    // Check if email already exists
    if ($repo->getStudentByEmail($email)) {
        header("Location: /View/auth/register.php?error=Cet email est déjà utilisé");
        exit;
    }

    // Prepare data
    // DB 'nom' stores full name
    $nom = trim($first_name . ' ' . $last_name);

    // Defaults for new columns not in form
    $age = 18; // Default or null
    $sexe = 'Male'; // Default or null
    $bourse = 0; // Default balance

    // Constructor: $nom, $email, $password, $age, $sexe, $balance
    $student = new Student($nom, $email, $password, $age, $sexe, $bourse);
    $student->password = password_hash($password, PASSWORD_DEFAULT); // double hashing check? No, setter handles it?
    // Wait, Student __set handles password hashing. constructor passes plain text?
    // Let's check Student.php. Constructor assigns directly. __set uses hashing.
    // If I use setter, it hashes. If I use constructor, I need to check if it hashes.
    // My Student.php: __construct($..., $password, ...) { ... $this->password = $password; }
    // It assigns DIRECTLY. So validation: password is NOT hashed in constructor.
    // But verify: Login uses password_verify. So it MUST be hashed in DB.
    // So I must hash it. 
    // Wait, __set intercepts property access?
    // $this->password = $password inside class refers to private property, does NOT trigger __set?
    // Actually, inside the class, $this->password accesses the property directly.
    // So I should hash it before passing to constructor OR use setter.

    // Let's rely on manual hashing here to be distinct and safe, 
    // OR create object then set password.

    $student = new Student($nom, $email, $password, $age, $sexe, $bourse);
    // Overwrite password with hashed version manually to be sure, or use setter if public (it's via __set)
    $student->password = $password; // This triggers __set if I access it from OUTSIDE class?
    // But here I am OUTSIDE the class (in Action/register.php).
    // So $student->password = $password triggers __set.
    // Student::__set hashes it.

    if ($repo->addStudent($student)) {
        header("Location: /View/auth/login.php?success=Compte créé avec succès");
        exit;
    } else {
        header("Location: /View/auth/register.php?error=Erreur lors de l'inscription");
        exit;
    }
} else {
    header("Location: /View/auth/register.php");
    exit;
}
