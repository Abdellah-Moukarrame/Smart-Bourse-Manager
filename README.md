# 🎓 Smart Bourse Manager

## 📌 Description
Smart Bourse Manager est une application web conçue pour aider les étudiants à gérer efficacement leur **bourse mensuelle**, dont le montant peut varier (ex : **1000 DH, 2000 DH**, etc.).  
Elle permet de suivre les dépenses, analyser les habitudes de consommation et mieux organiser le budget selon les priorités.

---

## ❓ Problématique
Tous les étudiants bénéficient de la bourse, cependant **leurs habitudes de dépenses diffèrent fortement** d’un étudiant à un autre.  
L’absence d’un outil de suivi clair rend la gestion du budget difficile et empêche les étudiants de prioriser leurs dépenses essentielles.

---

## 💡 Solution
Smart Bourse Manager propose :
- Un **suivi détaillé des dépenses**
- Une **gestion intelligente du budget**
- Une **analyse des habitudes de consommation**
- Une **priorisation automatique des dépenses essentielles**

---

## 🔐 Authentification
- Les **étudiants** doivent s’authentifier pour accéder à leur tableau de bord
- L’**administrateur** doit également s’authentifier pour accéder à l’espace admin

---

## 👤 Fonctionnalités

### 🎓 Espace Étudiant
Après authentification, l’étudiant accède à son **dashboard personnel** :

- Visualisation du **montant de la bourse reçue**
- Suivi du **budget dépensé** et du **solde restant**
- Ajout et modification des dépenses avec :
  - **Titre de la dépense**
  - **Montant**
  - **Catégorie**
- Analyse des habitudes de consommation

#### 💡 Catégories de dépenses
Les dépenses sont divisées en **deux catégories** :

- ⭐ **Catégorie Premium (prioritaire)**  
  - Dépenses essentielles  
  - Après le dépôt de la bourse, le montant réservé à cette catégorie est **déduit automatiquement**

- 🔹 **Catégorie Secondaire**  
  - Dépenses non essentielles  
  - Gérée à partir du budget restant

---

### 🛠️ Espace Administrateur
- L’administrateur peut **gérer uniquement les étudiants déjà authentifiés** dans l’application  
- Il **ne peut pas ajouter manuellement des étudiants**
- Fonctionnalités principales :
  - Consulter la liste des étudiants
  - Gérer leur statut
  - **Envoyer la bourse mensuelle** (montant variable) aux étudiants
  - Suivre les envois de bourse

---

## 🧰 Technologies utilisées
- **Frontend** :
  - HTML
  - Tailwind CSS
  - GSAP / GSAP Native (animations)
- **Backend** :
  - PHP **OOP (Programmation Orientée Objet)**
- **Base de données** :
  - MySQL
- **Design & UI** :
  - Figma (AI-assisted)

---

## 🚀 Objectifs du projet
- Aider les étudiants à **mieux gérer leur bourse**
- Encourager une **priorisation intelligente des dépenses**
- Offrir une **vision claire et structurée du budget**
- Fournir à l’administration un **contrôle simple et efficace**

---

## 🏁 Contexte
Projet réalisé dans le cadre du **Hackathon YouCode**.
