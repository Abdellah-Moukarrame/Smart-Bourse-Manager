<?php
/**
 * Student Dashboard View
 */
session_start();
require_once __DIR__ . '/../../Config/config.php';
require_once __DIR__ . '/../../Repos/UserRepository.php';
require_once __DIR__ . '/../../Repos/ExpenseRepository.php';

if (!isset($_SESSION['student_id'])) {
    header('Location: /View/auth/login.php');
    exit();
}

$userRepo = new UserRepository($pdo);
$expenseRepo = new ExpenseRepository($pdo);

$student = $userRepo->getStudentById($_SESSION['student_id']);
if (!$student) {
    echo "Étudiant introuvable.";
    exit;
}

$total_bourse = $student->bourse;
$total_spent = $expenseRepo->getTotalSpentByStudent($student->id);
$remaining_balance = $total_bourse - $total_spent;

$premium_spent = $expenseRepo->getSpentByCategoryType($student->id, 'primary');
$secondary_spent = $expenseRepo->getSpentByCategoryType($student->id, 'secondary');

// Example logic: Premium budget is effectively what you spend on it, 
// but let's say we just track what is spent.
// Secondary budget available = Total Bourse - Premium Spent - Secondary Spent = Remaining.
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Smart Bourse Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-indigo-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="text-2xl">🎓</span>
                <h1 class="text-xl font-bold">Smart Bourse</h1>
            </div>
            <div class="flex gap-4 items-center">
                <span>Bienvenue,
                    <?php echo htmlspecialchars($student->first_name . ' ' . $student->last_name); ?></span>
                <a href="/Action/logout.php"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-sm transition">Déconnexion</a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Notification -->
        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($_GET['success']); ?></span>
            </div>
        <?php endif; ?>

        <!-- Welcome Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Tableau de Bord</h2>
            <p class="text-gray-600">Gérez votre budget mensuel efficacement</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Scholarship Amount Card -->
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-indigo-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1 uppercase font-semibold">Montant Bourse</p>
                        <p class="text-3xl font-bold text-indigo-600"><?php echo number_format($total_bourse, 2); ?> DH
                        </p>
                    </div>
                    <div class="text-4xl opacity-50">💰</div>
                </div>
            </div>

            <!-- Spent Amount Card -->
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-orange-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1 uppercase font-semibold">Montant Dépensé</p>
                        <p class="text-3xl font-bold text-orange-600"><?php echo number_format($total_spent, 2); ?> DH
                        </p>
                    </div>
                    <div class="text-4xl opacity-50">📊</div>
                </div>
            </div>

            <!-- Remaining Balance Card -->
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1 uppercase font-semibold">Solde Restant</p>
                        <p class="text-3xl font-bold text-green-600"><?php echo number_format($remaining_balance, 2); ?>
                            DH</p>
                    </div>
                    <div class="text-4xl opacity-50">✓</div>
                </div>
            </div>
        </div>

        <!-- Expense Categories Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Premium Category -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="text-2xl">⭐</span> Catégorie Premium
                </h3>
                <p class="text-gray-600 text-sm mb-4">Dépenses essentielles (logement, frais fixes).</p>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-4 bg-red-50 rounded-lg">
                        <span class="text-gray-800 font-medium">Dépensé ce mois</span>
                        <span class="font-bold text-red-600 text-lg"><?php echo number_format($premium_spent, 2); ?>
                            DH</span>
                    </div>
                </div>
            </div>

            <!-- Secondary Category -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="text-2xl">🔹</span> Catégorie Secondaire
                </h3>
                <p class="text-gray-600 text-sm mb-4">Loisirs, sorties, et autres dépenses variables.</p>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-4 bg-blue-50 rounded-lg">
                        <span class="text-gray-800 font-medium">Dépensé ce mois</span>
                        <span class="font-bold text-blue-600 text-lg"><?php echo number_format($secondary_spent, 2); ?>
                            DH</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Actions Rapides</h3>
            <div class="flex gap-4 flex-wrap">
                <a href="/View/student/add_expense.php"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition flex items-center gap-2 font-medium shadow-md">
                    <span>➕</span> Ajouter une Dépense
                </a>
                <a href="/View/student/expenses.php"
                    class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-6 py-3 rounded-lg transition flex items-center gap-2 font-medium">
                    <span>📋</span> Voir Toutes les Dépenses
                </a>
            </div>
        </div>
    </div>
</body>

</html>