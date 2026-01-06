<?php
/**
 * Register View
 * Handles student registration
 */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Smart Bourse Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow-xl p-8">
            <!-- Logo / Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-blue-700 mb-2">Smart Bourse Manager</h1>
                <p class="text-gray-600">Créez votre compte</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="../../Action/register.php" class="space-y-4">


                <!-- Last Name -->
                <!-- First Name & Last Name -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                        <input type="text" id="first_name" name="first_name" required
                            class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none transition"
                            placeholder="Jean">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input type="text" id="last_name" name="last_name" required
                            class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none transition"
                            placeholder="Dupont">
                    </div>
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                    <input type="tel" id="phone" name="phone"
                        class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none transition"
                        placeholder="06 12 34 56 78">
                </div>

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

                <!-- Confirm Password -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot
                        de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password" required
                        class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none transition"
                        placeholder="••••••••">
                </div>

                <!-- Terms & Conditions -->
                <div class="flex items-start">
                    <input type="checkbox" id="terms" name="terms" required class="rounded mt-1 text-blue-600">
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        J'accepte les <a href="#" class="text-blue-600 hover:text-blue-700">conditions d'utilisation</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200 mt-6">
                    S'inscrire
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">Vous avez déjà un compte ?
                    <a href="/View/auth/login.php" class="text-blue-600 hover:text-blue-700 font-semibold">Se
                        connecter</a>
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