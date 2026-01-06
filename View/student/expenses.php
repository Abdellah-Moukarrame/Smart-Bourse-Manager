<?php
/**
 * Student Expenses List View
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
$expenses = $expenseRepo->getExpensesByStudentId($student->id);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Dépenses - Smart Bourse Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-indigo-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <a href="/View/student/dashboard.php" class="text-xl font-bold flex items-center gap-2">
                    <span class="text-2xl">🎓</span> Smart Bourse
                </a>
            </div>
            <div class="flex gap-4 items-center">
                <span><?php echo htmlspecialchars($student->first_name); ?></span>
                <a href="/Action/logout.php"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-sm transition">Déconnexion</a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Mes Dépenses</h2>
                <p class="text-gray-600 mt-1">Historique complet de vos transactions</p>
            </div>
            <a href="/View/student/add_expense.php"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition shadow flex items-center gap-2">
                <span>➕</span> Nouvelle Dépense
            </a>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (empty($expenses)): ?>
            <!-- Empty State -->
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <div class="text-6xl mb-4 opacity-50">📭</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Aucune dépense trouvée</h3>
                <p class="text-gray-600 mb-6">Commencez par ajouter votre première dépense.</p>
                <a href="/View/student/add_expense.php"
                    class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Ajouter une dépense
                </a>
            </div>
        <?php else: ?>
            <!-- Expenses Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Titre</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Montant</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Catégorie</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($expenses as $expense): ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                        <?php echo htmlspecialchars($expense->title); ?>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-bold <?php echo ($expense->category_type === 'primary') ? 'text-red-600' : 'text-blue-600'; ?>">
                                        <?php echo number_format($expense->amount, 2); ?> DH
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php if ($expense->category_type === 'primary'): ?>
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                ⭐ Premium
                                            </span>
                                        <?php else: ?>
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                🔹 Secondaire
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo htmlspecialchars($expense->date); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <a href="/Action/delete_expense.php?id=<?php echo $expense->id; ?>"
                                            class="text-red-600 hover:text-red-900 ml-4 font-semibold"
                                            onclick="return confirm('Voulez-vous vraiment supprimer cette dépense ?');">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>