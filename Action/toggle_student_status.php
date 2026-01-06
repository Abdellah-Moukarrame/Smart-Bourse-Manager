<?php
session_start();
require_once __DIR__ . '/../Config/config.php';

// Check Admin Auth
if (!isset($_SESSION['admin_email'])) {
    header('Location: /View/auth/login.php');
    exit();
}

// Redirect back with message
// Since correct DB schema does not have 'status' column, we cannot toggle it.
header("Location: /View/admin/students.php?error=La colonne 'status' n'existe pas dans la base de données.");
exit;
