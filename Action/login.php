<?php
session_start();
require_once __DIR__ . '/../Config/config.php';
require_once __DIR__ . '/../Repos/UserRepository.php';
require_once __DIR__ . '/../Classes/Student.php';
require_once __DIR__ . '/../Classes/Admin.php';

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $repo = new UserRepository($pdo);

    // 1. Tenter la connexion Admin
    $admin = $repo->getAdminByEmail($email);
    if ($admin && password_verify($password, $admin->getPassword())) {
        $_SESSION['admin_email'] = $email;
        $_SESSION['role'] = 'admin';
        header("Location: /View/admin/dashboard.php");
        exit;
    }

    // 2. Tenter la connexion Étudiant (User)
    $student = $repo->getStudentByEmail($email);
    // Note: Student uses __get for password, id access
    if ($student && password_verify($password, $student->password)) {
        $_SESSION['student_email'] = $email;
        $_SESSION['student_id'] = $student->id; // Using __get which maps to id_user
        $_SESSION['role'] = 'student';
        header("Location: /View/student/dashboard.php");
        exit;
    }

    // 3. Échec
    header("Location: /View/auth/login.php?error=Email ou mot de passe incorrect");
    exit;
} else {
    // Rediriger si page accédée directement
    header("Location: /View/auth/login.php");
    exit;
}
