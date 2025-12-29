# Suivi Sportif

Application web de suivi de séances d'entraînement développée avec **Laravel** dans le cadre du cours PHP / Laravel.

---

## 📌 Description

Suivi Sportif permet aux utilisateurs de :
- s’inscrire et se connecter,
- créer, afficher, modifier et supprimer leurs propres séances,
- naviguer dans une interface simple et cohérente.

---

## 🛠️ Prérequis

Avant de commencer, assurez-vous d’avoir installé :

- PHP (version 8.2 ou supérieure)
- Composer
- Node.js et npm
- MySQL
- (Optionnel) Laravel Herd

---

## 🚀 Installation

### 1️⃣ Cloner le dépôt

```bash
git clone https://github.com/BornetFloryan/Suivi-sportif.git
cd Suivi-sportif
```

---

### 2️⃣ Installer les dépendances PHP

```bash
composer install
```

---

### 3️⃣ Installer les dépendances Front-End

```bash
npm install
```

---

## ⚙️ Configuration

### 4️⃣ Copier le fichier d’environnement

```bash
cp .env.example .env
```

Générer la clé de l’application :

```bash
php artisan key:generate
```

---

## 🗄️ Base de données

### 5️⃣ Créer la base de données MySQL

```sql
CREATE DATABASE suivi_sportif;
```

---

### 6️⃣ Configurer la connexion dans `.env`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=suivi_sportif
DB_USERNAME=root
DB_PASSWORD=
```

---

### 7️⃣ Lancer les migrations

```bash
php artisan migrate
```

---

## ▶️ Lancer l’application

### Méthode classique

**Terminal 1**
```bash
php artisan serve
```

Accès :
```
http://127.0.0.1:8000
```

**Terminal 2**
```bash
npm run dev
```

---

### Méthode avec Laravel Herd

Accès :
```
http://suivi-sportif.test
```

`npm run dev` reste obligatoire.

---

## 📌 Fonctionnalités

- Authentification (inscription / connexion)
- CRUD des séances
- Sécurisation par utilisateur

---

## 🎨 Style

- Tailwind CSS
- Laravel Breeze
- Interface cohérente et simple

---
