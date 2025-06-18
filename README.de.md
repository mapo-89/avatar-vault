<h1 align="center"> 👥 AvatarVault</h1>

<div align="center">

[![Build Status](https://github.com/mapo-89/avatar-vault/workflows/tests/badge.svg)](https://github.com/mapo-89/avatar-vault/actions)
<!--[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/framework)-->
[![Latest Stable Version](https://img.shields.io/github/v/release/mapo-89/avatar-vault)](https://github.com/mapo-89/avatar-vault)
[![Documentation](https://img.shields.io/badge/docs-online-blue)](https://github.com/mapo-89/avatar-vault)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

</div>

<p align="center">
    Verwalte und zeige Benutzer-Avatare sicher und einfach an – ähnlich wie Gravatar, aber komplett selbst gehostet.
</p>

## 📚 Inhaltsverzeichnis

- [🔍 Überblick](#-überblick)
- [✨ Features](#-features)
- [🛠️ Voraussetzungen](#-voraussetzungen)
- [⚙️ Installation](#-installation)
- [🛠️ Nutzung](#-nutzung)
- [📄 Lizenz](#-lizenz)

## 🔍 Überblick

AvatarVault ist ein self-hosted Avatar-Service. Er funktioniert ähnlich wie Gravatar, speichert die Bilder aber lokal und ermöglicht dir so volle Datenkontrolle. Ideal für Projekte, die Benutzerprofile mit Avataren integrieren und auf Datenschutz achten.


## ✨ Features

- 📷 Upload von Profilbildern
- 🔐 Speicherung & Abruf basierend auf MD5-Hash der E-Mail (wie Gravatar)
- ⚙️ Integrierte Nutzung des Pakets [`mapo-89/laravel-avatar-manager`](https://github.com/mapo-89/laravel-avatar-manager)
- 🌐 Direktes Einbinden des Avatars per URL
- 🧰 Anpassbar & erweiterbar nach Projektanforderungen


## 🛠️ Voraussetzungen

- PHP >= 8.1
- Laravel 12
- Composer & NPM
- MySQL/PostgreSQL
- Node.js >= 18

➡️ Siehe [🧰 Tech Stack](#-tech-stack) für detaillierte Komponenten.

## ⚙️ Installation

1. Repository klonen und Abhängigkeiten installieren:

   ```bash
   git clone https://github.com/mapo-89/avatar-vault
   cd avatar-vault
   composer install
   npm install && npm run build
   ```

2. `.env` Datei erstellen und konfigurieren:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3. Datenbank konfigurieren und Migrationen ausführen:

    ```bash
    php artisan migrate
    ```

## 🚀 Nutzung

1. 📇 Benutzer registrieren sich
2. 📅 Im Profilbild-Bereich kann ein Avatar hochgeladen werden
3. 📋 Intern wird das Bild gespeichert und mit dem E-Mail-Hash aufgerufen
4. 🌐 Partner zu Ausschreibungen einladen
5. 🔎 Angebote vergleichen und Empfehlungen abgeben
6. 💰 Abrechnungen über sevDesk automatisieren

## 🧰 Tech Stack

| Bereich        | Technologie                              |
|----------------|-------------------------------------------|
| Framework      | Laravel 12                                |
| Auth & Profile | Laravel Jetstream (Livewire oder Inertia) |
| Frontend       | Blade, Tailwind CSS, Alpine.js            |
| Avatar-Handling| mapo-89/laravel-avatar-manager            |
| Speicher       | Laravel Filesystem                        |
| Datenbank      | MySQL/PostgreSQL                          |

## 🧑‍💻 Maintainer

- [@mapo-89](https://github.com/mapo-89)


## 📄 Lizenz

Dieses Projekt ist unter der [MIT Lizenz](LICENSE) lizenziert.

