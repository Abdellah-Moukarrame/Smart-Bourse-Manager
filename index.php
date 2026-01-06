<?php
/**
 * Smart Bourse Manager - Landing Page
 * Main entry point for the application
 * 
 * This file serves as the landing page showcasing the platform's features
 * and providing navigation to authentication pages.
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Bourse Manager - Gérez votre bourse intelligemment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(118, 75, 162, 0.1) 0%, transparent 50%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo / Branding -->
                <div class="flex items-center gap-2">
                    <div class="text-3xl">🎓</div>
                    <div>
                        <h1 class="text-2xl font-bold gradient-text">Smart Bourse Manager</h1>
                        <p class="text-xs text-gray-600">Hackathon YouCode</p>
                    </div>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden md:flex items-center gap-6">
                    <a href="#home" class="text-gray-700 hover:text-indigo-600 font-medium transition">Accueil</a>
                    <a href="#features" class="text-gray-700 hover:text-indigo-600 font-medium transition">Fonctionnalités</a>
                    <a href="#how-it-works" class="text-gray-700 hover:text-indigo-600 font-medium transition">Comment ça marche</a>
                </div>

                <!-- Auth Buttons (Desktop) -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="View/auth/login.php" class="px-4 py-2 text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 font-medium transition">
                        👤 Connexion Étudiant
                    </a>
                    <a href="View/auth/login.php?role=admin" class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 font-medium transition">
                        🔐 Admin
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <a href="#home" class="block px-4 py-2 text-gray-700 hover:text-indigo-600">Accueil</a>
                <a href="#features" class="block px-4 py-2 text-gray-700 hover:text-indigo-600">Fonctionnalités</a>
                <a href="#how-it-works" class="block px-4 py-2 text-gray-700 hover:text-indigo-600">Comment ça marche</a>
                <div class="flex gap-2 px-4 py-2">
                    <a href="View/auth/login.php" class="flex-1 px-4 py-2 text-center text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 font-medium text-sm">
                        Connexion
                    </a>
                    <a href="View/auth/login.php?role=admin" class="flex-1 px-4 py-2 text-center text-white bg-red-600 rounded-lg hover:bg-red-700 font-medium text-sm">
                        Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-pattern min-h-screen flex items-center pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h2 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight mb-6">
                        Gérez votre bourse plus
                        <span class="gradient-text">intelligemment</span>
                    </h2>
                    
                    <p class="text-lg text-gray-600 mb-8">
                        Smart Bourse Manager est votre compagnon personnel pour maîtriser votre budget mensuel. 
                        Suivez vos dépenses, analysez vos habitudes de consommation et priorisez vos budget essentiels.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="View/auth/register.php" class="px-8 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition text-center">
                            🚀 Commencer Maintenant
                        </a>
                        <a href="View/auth/login.php" class="px-8 py-3 bg-white text-indigo-600 border-2 border-indigo-600 rounded-lg font-semibold hover:bg-indigo-50 transition text-center">
                            Se Connecter
                        </a>
                    </div>

                    <!-- Trust Badge -->
                    <div class="mt-12 flex items-center gap-4 text-sm text-gray-600">
                        <div class="flex">
                            <span class="text-2xl">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p>Conçu par les étudiants, pour les étudiants</p>
                    </div>
                </div>

                <!-- Right Illustration -->
                <div class="hidden md:block">
                    <div class="relative h-96 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-2xl flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-8xl mb-4">💰</div>
                            <p class="text-gray-600 font-semibold">Gestion intelligente du budget</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">Fonctionnalités Clés</h3>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Découvrez tous les outils pour optimiser votre gestion budgétaire
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Feature 1: Scholarship Management -->
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-200">
                    <div class="text-5xl mb-4">💳</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Gestion de la Bourse</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Visualisez votre montant de bourse reçu et suivez en temps réel votre budget disponible.
                    </p>
                </div>

                <!-- Feature 2: Expense Tracking -->
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-200">
                    <div class="text-5xl mb-4">📊</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Suivi des Dépenses</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Enregistrez chaque dépense avec titre, montant et catégorie pour un suivi détaillé.
                    </p>
                </div>

                <!-- Feature 3: Smart Categories -->
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-200">
                    <div class="text-5xl mb-4">⭐</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Catégories Intelligentes</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Divisez vos dépenses en Premium (essentielles) et Secondaire (non-essentielles).
                    </p>
                </div>

                <!-- Feature 4: Budget Analysis -->
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-200">
                    <div class="text-5xl mb-4">📈</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Analyse du Budget</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Analysez vos habitudes de consommation et optimisez votre gestion budgétaire.
                    </p>
                </div>

                <!-- Feature 5: Secure Authentication -->
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-200">
                    <div class="text-5xl mb-4">🔐</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Authentification Sécurisée</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Connectez-vous en tant qu'étudiant ou administrateur avec vos identifiants sécurisés.
                    </p>
                </div>

                <!-- Feature 6: Admin Control -->
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-200">
                    <div class="text-5xl mb-4">👥</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Gestion Admin</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Les administrateurs peuvent envoyer des bourses et gérer les étudiants authentifiés.
                    </p>
                </div>

                <!-- Feature 7: Edit & Delete -->
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-200">
                    <div class="text-5xl mb-4">✏️</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Gestion Complète</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Modifiez ou supprimez vos dépenses à tout moment selon vos besoins.
                    </p>
                </div>

                <!-- Feature 8: Responsive Design -->
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-200">
                    <div class="text-5xl mb-4">📱</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Interface Responsive</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Accédez à votre tableau de bord depuis n'importe quel appareil, n'importe où.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">Comment ça marche ?</h3>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Quatre étapes simples pour commencer à gérer votre bourse
                </p>
            </div>

            <!-- Steps Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                            1
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2 text-center">S'authentifier</h4>
                        <p class="text-gray-600 text-sm text-center">
                            Créez votre compte étudiant ou connectez-vous à votre espace.
                        </p>
                    </div>
                    <!-- Connector Line (hidden on mobile) -->
                    <div class="hidden md:block absolute top-8 left-1/2 w-full h-1 bg-gray-200 -z-10" style="margin-left: 2rem; width: calc(100% + 2rem);"></div>
                </div>

                <!-- Step 2 -->
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                            2
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2 text-center">Recevoir la Bourse</h4>
                        <p class="text-gray-600 text-sm text-center">
                            L'administrateur vous envoie votre bourse mensuelle directement.
                        </p>
                    </div>
                    <div class="hidden md:block absolute top-8 left-1/2 w-full h-1 bg-gray-200 -z-10" style="margin-left: 2rem; width: calc(100% + 2rem);"></div>
                </div>

                <!-- Step 3 -->
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                            3
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2 text-center">Enregistrer les Dépenses</h4>
                        <p class="text-gray-600 text-sm text-center">
                            Ajoutez chaque dépense avec ses détails et sa catégorie.
                        </p>
                    </div>
                    <div class="hidden md:block absolute top-8 left-1/2 w-full h-1 bg-gray-200 -z-10" style="margin-left: 2rem; width: calc(100% + 2rem);"></div>
                </div>

                <!-- Step 4 -->
                <div class="relative">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                            4
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2 text-center">Analyser & Optimiser</h4>
                        <p class="text-gray-600 text-sm text-center">
                            Consultez vos graphiques et optimisez votre budget mensuel.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-16 text-center">
                <p class="text-gray-600 mb-6">Prêt à commencer votre gestion budgétaire intelligente ?</p>
                <a href="View/auth/register.php" class="inline-block px-8 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition">
                    S'inscrire Maintenant
                </a>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-4xl font-bold mb-4">Rejoignez des centaines d'étudiants</h3>
            <p class="text-lg mb-8 opacity-90">
                Smart Bourse Manager aide les étudiants à mieux gérer leur budget et atteindre leurs objectifs financiers.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="View/auth/register.php" class="px-8 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Créer un compte gratuit
                </a>
                <a href="View/auth/login.php" class="px-8 py-3 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition">
                    Se connecter
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="text-2xl">🎓</div>
                        <h4 class="text-xl font-bold text-white">Smart Bourse Manager</h4>
                    </div>
                    <p class="text-sm">
                        Gérez votre bourse intelligemment avec notre plateforme intuitive et sécurisée.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h5 class="text-white font-semibold mb-4">Navigation</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#home" class="hover:text-white transition">Accueil</a></li>
                        <li><a href="#features" class="hover:text-white transition">Fonctionnalités</a></li>
                        <li><a href="#how-it-works" class="hover:text-white transition">Comment ça marche</a></li>
                    </ul>
                </div>

                <!-- Auth Links -->
                <div>
                    <h5 class="text-white font-semibold mb-4">Accès</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="View/auth/login.php" class="hover:text-white transition">Connexion Étudiant</a></li>
                        <li><a href="View/auth/register.php" class="hover:text-white transition">Inscription</a></li>
                        <li><a href="View/auth/login.php?role=admin" class="hover:text-white transition">Espace Admin</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h5 class="text-white font-semibold mb-4">À propos</h5>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <span class="text-white">Hackathon YouCode</span>
                        </li>
                        <li class="text-xs text-gray-500">
                            © 2026 Smart Bourse Manager
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-500">
                        © 2026 Smart Bourse Manager. Tous droits réservés.
                    </p>
                    <div class="flex gap-6 mt-4 md:mt-0 text-sm">
                        <a href="#" class="text-gray-400 hover:text-white transition">Politique de confidentialité</a>
                        <a href="#" class="text-gray-400 hover:text-white transition">Conditions d'utilisation</a>
                        <a href="#" class="text-gray-400 hover:text-white transition">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when a link is clicked
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>
