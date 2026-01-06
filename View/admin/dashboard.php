<?php
session_start();
require_once __DIR__ . '/../../Config/config.php';
require_once __DIR__ . '/../../Repos/UserRepository.php';
require_once __DIR__ . '/../../Repos/BourseRepository.php';

// Check Admin Auth (Simple check based on my login logic)
if (!isset($_SESSION['admin_email'])) {
    header('Location: /View/auth/login.php');
    exit();
}

$userRepo = new UserRepository($pdo);
$bourseRepo = new BourseRepository($pdo);

$total_students = $userRepo->countStudents();
$active_students = $userRepo->countActiveStudents();
$total_distributed = $bourseRepo->getTotalDistributed();
$bourses_sent_count = $bourseRepo->getCountSent();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin - Smart Bourse Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <nav class="bg-red-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Smart Bourse Manager - Admin</h1>
            <div class="flex gap-4 items-center">
                <span>Administrateur</span>
                <a href="/Action/logout.php" class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded">Déconnexion</a>
            </div>
        </div>
    </nav>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-2">Tableau de Bord Administrateur</h2>
            <p class="text-gray-600">Gérez les étudiants et distribuez les bourses</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-gray-600 text-sm mb-1">Nombre d'Étudiants</p>
                <p class="text-3xl font-bold text-indigo-600"><?php echo $total_students; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-gray-600 text-sm mb-1">Étudiants Actifs</p>
                <p class="text-3xl font-bold text-green-600"><?php echo $active_students; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-gray-600 text-sm mb-1">Bourses Envoyées</p>
                <p class="text-3xl font-bold text-blue-600"><?php echo $bourses_sent_count; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-gray-600 text-sm mb-1">Montant Distribué</p>
                <p class="text-3xl font-bold text-orange-600"><?php echo number_format($total_distributed, 2); ?> DH</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Actions Rapides</h3>
            <div class="flex gap-4 flex-wrap">
                <a href="/View/admin/students.php"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition">👥 Gérer les
                    Étudiants</a>
                <!-- Link to specific ID not possible here, just generic link or remove if redundant -->
            </div>
        </div>
    </div>
</body>

</html>