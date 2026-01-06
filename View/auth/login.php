<?php
/**
 * Login View
 * Handles user authentication for both students and admin
 */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Smart Bourse Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow-xl p-8">
            <!-- Logo / Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-blue-700 mb-2">Smart Bourse Manager</h1>
                <p class="text-gray-600">Gérez votre bourse intelligemment</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="../../Action/login.php" class="space-y-4">


                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none transition"
                        placeholder="votre@email.com">
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none transition"
                        placeholder="••••••••">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="rounded text-blue-600">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Se souvenir de moi</label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200">
                    Se connecter
                </button>
            </form>

            <!-- Sign Up Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">Pas encore de compte ?
                    <a href="/View/auth/register.php"
                        class="text-blue-600 hover:text-blue-700 font-semibold">S'inscrire</a>
                </p>
            </div>

            <!-- Error Message -->
            <?php if (isset($_GET['error'])): ?>
                <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>