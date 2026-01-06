<?php
session_start();
require_once __DIR__ . '/../Config/config.php';
require_once __DIR__ . '/../Repos/UserRepository.php';

// Check Admin Auth
if (!isset($_SESSION['admin_email'])) {
    header('Location: /View/auth/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'] ?? null;
    $amount = $_POST['amount'] ?? 0;

    if (!$student_id || !$amount || $amount <= 0) {
        header("Location: /View/admin/send_scholarship.php?student_id=$student_id&error=Montant invalide");
        exit;
    }

    $repo = new UserRepository($pdo);

    if ($repo->addBalance($student_id, $amount)) {
        header("Location: /View/admin/students.php?success=Bourse envoyée avec succès");
        exit;
    } else {
        header("Location: /View/admin/send_scholarship.php?student_id=$student_id&error=Erreur lors de l'envoi");
        exit;
    }
} else {
    header('Location: /View/admin/students.php');
    exit;
}
