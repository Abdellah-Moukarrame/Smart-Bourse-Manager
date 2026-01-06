<?php
session_start();
require_once __DIR__ . '/../../Config/config.php';
require_once __DIR__ . '/../../Repos/UserRepository.php';

if (!isset($_SESSION['admin_email'])) {
    header('Location: /View/auth/login.php');
    exit();
}

$student_id = $_GET['student_id'] ?? null;
if (!$student_id) {
    header('Location: /View/admin/students.php');
    exit;
}

$userRepo = new UserRepository($pdo);
$student = $userRepo->getStudentById($student_id);
if (!$student) {
    header('Location: /View/admin/students.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer Bourse - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Envoyer Bourse</h2>
        <div class="mb-4">
            <p class="text-gray-600">Étudiant: <strong>
                    <?php echo htmlspecialchars($student->first_name . ' ' . $student->last_name); ?>
                </strong></p>
            <p class="text-gray-600">Email:
                <?php echo htmlspecialchars($student->email); ?>
            </p>
            <p class="text-gray-600">Solde Actuel:
                <?php echo number_format($student->bourse, 2); ?> DH
            </p>
        </div>
        <form action="/Action/send_scholarship_action.php" method="POST">
            <input type="hidden" name="student_id" value="<?php echo $student->id; ?>">
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Montant à envoyer (DH)</label>
                <input type="number" name="amount"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Ex: 1000" required min="1">
            </div>
            <div class="flex justify-between gap-4">
                <a href="/View/admin/students.php"
                    class="flex-1 bg-gray-300 text-gray-800 text-center py-2 rounded hover:bg-gray-400 transition">Annuler</a>
                <button type="submit"
                    class="flex-1 bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Envoyer</button>
            </div>
        </form>
    </div>
</body>

</html>