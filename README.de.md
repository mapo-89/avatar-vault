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

📖 Diese README ist auch auf [🇬🇧 Englisch](README.md) verfügbar.

## 📚 Inhaltsverzeichnis

- [🔍 Überblick](#-überblick)
- [✨ Features](#-features)
- [🛠️ Voraussetzungen](#-voraussetzungen)
- [⚙️ Installation](#-installation)
- [🛠️ Nutzung](#-nutzung)
- [🔐 Authentik OIDC Integration](#-authentik-oidc-integration)
- [🧰 Tech Stack](#-tech-stack)
- [🧑‍💻 Maintainer](#-maintainer)
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
4. Laravel Cache aufbauen

    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```
## 🚨 Trusted Proxies konfigurieren (optional)

In Laravel ggf. noch die Proxy-IP-Adresse bei den `TrustedProxies` hinzufügen, damit die Anfragen korrekt behandelt werden.

In `bootstrap/trust_proxies.php`

```php
$middleware->trustProxies('172.18.0.0/16');
```

Diese Datei ggf. aus dem Git Worktree ausschließen

```bash
git update-index --skip-worktree bootstrap/trust_proxies.php
```

### 🧪 Optional: Status prüfen

Wenn du prüfen willst, ob eine Datei als `skip-worktree` markiert ist:

```bash
git ls-files -v | grep ^S
```

## 🚀 Nutzung

1. 📇 Benutzer registrieren sich
2. 📅 Im Profilbild-Bereich kann ein Avatar hochgeladen werden
3. 📋 Intern wird das Bild gespeichert und mit dem E-Mail-Hash aufgerufen

## 🔐 Social Login

AvatarVault unterstützt die Anmeldung über **Authentik** mittels **OIDC / Socialite**.
weitere Auth-Provider können über eine provider-agnostische Struktur leicht ergänzt werden.

### 🛠️ Voraussetzungen

- Authentik Account mit erstellter Application für AvatarVault  
- Lokale Laravel-Installation mit Socialite & SocialiteProviders/Authentik  
- Öffentliche URL für Redirect URI (z. B. über Localtunnel)

### 🌐 Localtunnel für lokale Entwicklung

1. Localtunnel installieren:

```bash
npm install -g localtunnel
lt --version
```

2. Laravel-Server starten:

```bash
php artisan serve
```

3. Öffentlichen Tunnel starten:

```bash
lt --port 8000 --subdomain avatarvault
```

- Die öffentliche URL (z. B. `https://avatarvault.loca.lt`) muss als **Redirect URI** in Authentik eingetragen werden.  
- **Hinweis:** Falls ein Passwort für den Tunnel erforderlich ist, wird auf [https://loca.lt/mytunnelpassword](https://loca.lt/mytunnelpassword) weiterführende Information gegeben.

### ⚙️ Laravel Konfiguration

Die Login-Buttons werden nur angezeigt, wenn die entsprechenden Credentials in `.env` gesetzt sind.

```dotenv
AUTHENTIK_BASE_URL="https://auth.example.com/"
AUTHENTIK_CLIENT_ID=""
AUTHENTIK_CLIENT_SECRET=""
AUTHENTIK_REDIRECT_URI="http://localhost:8000/callback"
```

In `config/services.php`:

```php
'authentik' => [
    'base_url' => env('AUTHENTIK_BASE_URL'),
    'client_id' => env('AUTHENTIK_CLIENT_ID'),
    'client_secret' => env('AUTHENTIK_CLIENT_SECRET'),
    'redirect' => env('AUTHENTIK_REDIRECT_URI')
],
```

### 🔑 Nutzung

- Anmeldung erfolgt über den Link `/auth/authentik`  
- Nach erfolgreichem Login werden die OIDC-Daten im User-Modell gespeichert (`oidc_sub`, `oidc_provider`, `oidc_groups`)  
- Die Gruppen können für **Gates / Policies** genutzt werden  
- Neue Provider können einfach durch Hinzufügen in `config/services.php` und in `.env` aktiviert werden.

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

