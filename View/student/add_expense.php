<?php
/**
 * Add Expense View
 * Form to add a new expense
 */
session_start();
require_once __DIR__ . '/../../Config/config.php';
require_once __DIR__ . '/../../Repos/UserRepository.php';
require_once __DIR__ . '/../../Repos/ExpenseRepository.php';

// Check if user is authenticated
if (!isset($_SESSION['student_id'])) {
    header('Location: /View/auth/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Dépense - Smart Bourse Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-indigo-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Smart Bourse Manager</h1>
            <div class="flex gap-4 items-center">
                <span>Bienvenue, <!-- Student Name --></span>
                <a href="/Action/logout.php" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">Déconnexion</a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="max-w-2xl mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-2">Ajouter une Dépense</h2>
            <p class="text-gray-600">Enregistrez une nouvelle dépense pour suivre votre budget</p>
        </div>

        <!-- Expense Form -->
        <div class="bg-white rounded-lg shadow p-8">
            <form method="POST" action="/Action/create_expense.php" class="space-y-6">
                <!-- Expense Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre de la Dépense
                        *</label>
                    <input type="text" id="title" name="title" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition"
                        placeholder="Ex: Loyer, Nourriture, Transports...">
                </div>

                <!-- Expense Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Montant (DH) *</label>
                    <input type="number" id="amount" name="amount" required step="0.01" min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition"
                        placeholder="0.00">
                </div>

                <!-- Expense Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
                    <select id="category" name="category" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition">
                        <option value="">-- Sélectionner une catégorie --</option>
                        <option value="primary">⭐ Premium (Essentielle)</option>
                        <option value="secondary">🔹 Secondaire (Non-essentielle)</option>
                    </select>
                </div>

                <!-- Category Info -->
                <div id="category-info" class="hidden p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <p class="text-sm text-blue-700">
                        <strong>Premium:</strong> Dépenses essentielles automatiquement déduites
                    </p>
                    <p class="text-sm text-blue-700 mt-2">
                        <strong>Secondaire:</strong> Dépenses non essentielles du budget disponible
                    </p>
                </div>

                <!-- Expense Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description
                        (Optionnel)</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition resize-none"
                        placeholder="Ajoutez des détails sur cette dépense..."></textarea>
                </div>

                <!-- Expense Date -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date de la Dépense *</label>
                    <input type="date" id="date" name="date" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition">
                </div>

                <!-- Form Actions -->
                <div class="flex gap-4 pt-4">
                    <button type="submit"
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200">
                        ✓ Ajouter la Dépense
                    </button>
                    <a href="/View/student/expenses.php"
                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 rounded-lg transition duration-200 text-center">
                        ✕ Annuler
                    </a>
                </div>
            </form>

            <!-- Error Message -->
            <?php if (isset($_GET['error'])): ?>
                <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Set today's date as default
        document.getElementById('date').valueAsDate = new Date();

        // Show category info when category is selected
        document.getElementById('category').addEventListener('change', function () {
            const categoryInfo = document.getElementById('category-info');
            if (this.value) {
                categoryInfo.classList.remove('hidden');
            } else {
                categoryInfo.classList.add('hidden');
            }
        });
    </script>
</body>

</html>