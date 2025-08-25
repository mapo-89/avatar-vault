<h1 align="center"> 👥 AvatarVault</h1>

<div align="center">

[![Build Status](https://github.com/mapo-89/avatar-vault/workflows/tests/badge.svg)](https://github.com/mapo-89/avatar-vault/actions)
<!--[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/framework)-->
[![Latest Stable Version](https://img.shields.io/github/v/release/mapo-89/avatar-vault)](https://github.com/mapo-89/avatar-vault)
[![Documentation](https://img.shields.io/badge/docs-online-blue)](https://github.com/mapo-89/avatar-vault)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)


</div>

<p align="center">
    Manage and display user avatars securely and easily – similar to Gravatar, but completely self-hosted.
</p>

📖 This README is also available in [🇩🇪 German](README.de.md).

## 📚 Table of contents

- [🔍 Overview](#-overview)
- [✨ Features](#-features)
- [🛠️ Requirements](#-requirements)
- [⚙️ Installation](#-installation)
- [🛠️ Usage](#-usage)
- [🔐 Authentik OIDC integration](#-authentik-oidc-integration)
- [🧰 Tech Stack](#-tech-stack)
- [🧑‍💻 Maintainer](#-maintainer)
- [📄 Lizenz](#-lizenz)

## 🔍 Überblick

AvatarVault is a self-hosted avatar service. It works similarly to Gravatar, but stores images locally, giving you full control over your data. Ideal for projects that integrate user profiles with avatars and are concerned about data protection.


## ✨ Features

- 📷 Upload profile pictures
- 🔐 Storage & retrieval based on MD5 hash of the email (like Gravatar)
- ⚙️ Integrated use of the package [`mapo-89/laravel-avatar-manager`](https://github.com/mapo-89/laravel-avatar-manager)
- 🌐 Direct integration of the avatar via URL
- 🧰 Customisable & extensible according to project requirements


## 🛠️ Requirements

- PHP >= 8.1
- Laravel 12
- Composer & NPM
- MySQL/PostgreSQL
- Node.js >= 18

➡️ See [🧰 Tech Stack](#-tech-stack) for detailed components.

## ⚙️ Installation

1. Clone the repository and install dependencies:

```bash
   git clone https://github.com/mapo-89/avatar-vault
   cd avatar-vault
   composer install
   npm install && npm run build
```

2. Create and configure the `.env` file:

```bash
    cp .env.example .env
    php artisan key:generate
```

3. Configure the database and run migrations:

```bash
    php artisan migrate
```

4. Build Laravel cache

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🚨 Configure trusted proxies (optional)

In Laravel, add the proxy IP address to `TrustedProxies` if necessary so that requests are handled correctly.

In `bootstrap/trust_proxies.php`

```php
$middleware->trustProxies("172.18.0.0/16");
```

Exclude this file from the Git worktree if necessary

```bash
git update-index --skip-worktree bootstrap/trust_proxies.php
```

### 🧪 Optional: Check status

If you want to check whether a file is marked as `skip-worktree`:

```bash
git ls-files -v | grep ^S
```

## 🚀 Usage

1. 📇 Users register
2. 📅 An avatar can be uploaded in the profile picture area
3. 📋 The image is stored internally and accessed using the email hash

## 🔐 Social Login

AvatarVault supports login via **Authentik** using **OIDC / Socialite**.
Additional authentication providers can be easily added via a provider-agnostic structure.

### 🛠️ Requirements

- Authentik account with an application created for AvatarVault  
- Local Laravel installation with Socialite & SocialiteProviders/Authentik  
- Public URL for redirect URI (e.g. via Localtunnel)

### 🌐 Localtunnel for local development

1. Install Localtunnel:

```bash
npm install -g localtunnel
lt --version
```

2. Start the Laravel server:

```bash
php artisan serve
```

3. Start the public tunnel:

```bash
lt --port 8000 --subdomain avatarvault
```

- The public URL (e.g. `https://avatarvault.loca.lt`) must be entered as the **Redirect URI** in Authentik.  
- **Note:** If a password is required for the tunnel, further information is provided at [https://loca.lt/mytunnelpassword](https://loca.lt/mytunnelpassword).

### ⚙️ Laravel configuration

The login buttons are only displayed if the corresponding credentials are set in `.env`.

```dotenv
AUTHENTIK_BASE_URL="https://auth.example.com/"
AUTHENTIK_CLIENT_ID=""
AUTHENTIK_CLIENT_SECRET=""
AUTHENTIK_REDIRECT_URI="http://localhost:8000/callback"
```

In `config/services.php`:

```php
"authentik" => [
    'base_url' => env("AUTHENTIK_BASE_URL"),
    "client_id" => env("AUTHENTIK_CLIENT_ID"),
    "client_secret" => env("AUTHENTIK_CLIENT_SECRET"),
    "redirect" => env("AUTHENTIK_REDIRECT_URI")
],
``` 

### 🔑 Usage

- Login via the link `/auth/authentik`
- After successful login, the OIDC data is stored in the user model (`oidc_sub`, `oidc_provider`, `oidc_groups`)
- The groups can be used for **gates / policies**
- New providers can be easily activated by adding them to `config/services.php` and `.env`.

## 🧰 Tech Stack

| Area        | Technology                              |
|----------------|-------------------------------------------|
| Framework      | Laravel 12                                |
| Auth & Profile | Laravel Jetstream (Livewire oder Inertia) |
| Frontend       | Blade, Tailwind CSS, Alpine.js            |
| Avatar handling| mapo-89/laravel-avatar-manager            |
| Storage       | Laravel Filesystem                        |
| Database      | MySQL/PostgreSQL                          |

## 🧑‍💻 Maintainer

- [@mapo-89](https://github.com/mapo-89)


## 📄 Licence

This project is licensed under the [MIT Licence](LICENSE).
