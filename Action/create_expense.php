<?php
session_start();
require_once __DIR__ . '/../Config/config.php';
require_once __DIR__ . '/../Repos/ExpenseRepository.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: /View/auth/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $amount = $_POST['amount'] ?? 0;
    $category = $_POST['category'] ?? '';
    $date = $_POST['date'] ?? date('Y-m-d');
    $description = $_POST['description'] ?? ''; // Not used in repo currently, but good to have in POST

    if (empty($title) || empty($amount) || empty($category)) {
        header("Location: /View/student/add_expense.php?error=Veuillez remplir tous les champs obligatoires");
        exit;
    }

    $repo = new ExpenseRepository($pdo);
    // addExpense($title, $amount, $category, $date, $student_id)
    if ($repo->addExpense($title, $amount, $category, $date, $_SESSION['student_id'])) {
        header("Location: /View/student/dashboard.php?success=Dépense ajoutée avec succès");
        exit;
    } else {
        header("Location: /View/student/add_expense.php?error=Erreur lors de l'ajout de la dépense");
        exit;
    }
} else {
    header("Location: /View/student/add_expense.php");
    exit;
}
