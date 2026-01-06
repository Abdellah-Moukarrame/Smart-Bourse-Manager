<?php
session_start();
require_once __DIR__ . '/../../Config/config.php';
require_once __DIR__ . '/../../Repos/UserRepository.php';

if (!isset($_SESSION['admin_email'])) {
    header('Location: /View/auth/login.php');
    exit();
}

$userRepo = new UserRepository($pdo);
$students = $userRepo->getAllStudents();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Étudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <nav class="bg-red-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Admin - Gestion Étudiants</h1>
            <div class="flex gap-4 items-center">
                <a href="/View/admin/dashboard.php" class="text-white hover:text-gray-200">Tableau de Bord</a>
                <a href="/Action/logout.php"
                    class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded transition">Déconnexion</a>
            </div>
        </div>
    </nav>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8 flex justify-between items-center">
            <h2 class="text-3xl font-bold text-gray-800">Liste des Étudiants</h2>
            <a href="/View/admin/dashboard.php"
                class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition">← Retour</a>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Nom Complet</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Téléphone</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Statut</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Solde (DH)</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-800">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php foreach ($students as $student): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-800 font-semibold">
                                <?php echo htmlspecialchars($student->first_name . ' ' . $student->last_name); ?>
                            </td>
                            <td class="px-6 py-4 text-gray-600"><?php echo htmlspecialchars($student->email); ?></td>
                            <td class="px-6 py-4 text-gray-600"><?php echo htmlspecialchars($student->phone ?? '-'); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if (($student->status ?? 'active') === 'active'): ?>
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Actif</span>
                                <?php else: ?>
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">Inactif</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-indigo-600">
                                <?php echo number_format($student->bourse, 2); ?>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="/View/admin/send_scholarship.php?student_id=<?php echo $student->id; ?>"
                                    class="inline-block bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">Envoyer
                                    Bourse</a>
                                <a href="/Action/toggle_student_status.php?id=<?php echo $student->id; ?>"
                                    class="inline-block bg-orange-500 text-white px-3 py-1 rounded text-xs hover:bg-orange-600"
                                    onclick="return confirm('Changer le statut ?');">
                                    <?php echo ($student->status ?? 'active') === 'active' ? 'Désactiver' : 'Activer'; ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>