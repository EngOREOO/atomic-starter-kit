# Ultimate Starter Kit

A comprehensive Laravel package that provides rapid setup for Authentication, Dynamic Authorization (ACL), and a full-featured Admin Dashboard.

**Created by [Ahmed Hany](https://github.com/EngOREOO/)**

## ✨ Features

- **🚀 One-Command Installation**: Setup your entire admin panel in minutes.
- **🔐 Integrated Authentication**: Built-in, fully customizable authentication system (Login, Register, Password Reset) replacing the need for external Breeze installation.
- **👥 Dynamic Role & Permission System**: Granular access control with a database-driven permission system.
- **🎨 Modern Admin Dashboard**: Sleek, glassmorphism-inspired UI built with Tailwind CSS.
- **🔑 Super Admin System**: Dedicated Super Admin role with global access.
- **📊 User Management**: Complete user CRUD operations.
- **🛡️ Permission Middleware**: Protect routes easily using `ultimate.permission`.
- **⚙️ Settings Management**: Built-in settings configuration.
- **🔍 Auto-Route Scanning**: Automatically detects routes and generates permissions.

---

## 📦 Installation

### Step 1: Add Repository Configuration

**IMPORTANT:** Since this package is hosted on GitHub, you need to tell Composer where to find it. Add the following to your project's `composer.json` file in the `repositories` array:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/EngOREOO/atomic-starter-kit.git"
    }
],
```

### Step 2: Require the Package

Run the following command in your terminal:

```bash
composer require engoreoo/ultimate-starter-kit
```

### Step 3: Install & Setup

Run the installation command to set up the database, publish assets, and configure the system:

```bash
php artisan ultimate:install
```

_Follow the interactive prompts to set up your Super Admin account._

### Step 4: Frontend Development

Install dependencies and start the development server to compile the Tailwind CSS styles:

```bash
npm install
npm run dev
```

---

## 🔧 Configuration

The package configuration file is located at `config/ultimate.php`.

```php
return [
    // The role name for the super admin who has all permissions
    'super_admin_role' => 'Super Admin',

    // The URI prefix for all admin routes (e.g., yoursite.com/admin/dashboard)
    'route_prefix' => 'admin',

    // The middleware group to apply to admin routes
    'middleware_group' => 'web',

    // Whether to automatically scan routes for permissions after installation
    'scan_on_install' => true,
];
```

---

## 🔐 Authentication & Customization

This package comes with its own authentication controllers and views, giving you full control over the login flow without relying on third-party scaffolding like Laravel Breeze.

### Views

All authentication views are located in `vendor/ultimate/auth`. To customize them, you can publish the views to your main `resources/views` directory:

```bash
php artisan vendor:publish --tag=ultimate-views
```

This will copy all package views to `resources/views/vendor/ultimate`. You can then edit files like:

- `resources/views/vendor/ultimate/auth/login.blade.php`
- `resources/views/vendor/ultimate/layouts/guest.blade.php` (The layout used for auth pages)

### Routes

Authentication routes are automatically registered with the prefix defined in your config (default: `/admin`).

- Login: `/admin/login`
- Register: `/admin/register`
- Dashboard: `/admin/dashboard`

---

## 🛡️ Usage

### Protecting Routes

To protect your own routes using the dynamic permission system, use the `ultimate.permission` middleware. The middleware automatically checks if the user has permission to access the route based on the route name (e.g., `admin.posts.create`).

```php
Route::middleware(['auth', 'ultimate.permission'])->group(function () {
    Route::resource('posts', PostController::class);
});
```

### Route Scanning

Whenever you add new routes that you want to be controlled by permissions, run the scan command:

```bash
php artisan ultimate:scan-routes
```

This will detect new routes and add them to the permissions table in your database.

---

## 🛠️ Available Commands

| Command                            | Description                                                              |
| ---------------------------------- | ------------------------------------------------------------------------ |
| `php artisan ultimate:install`     | Installs the package, runs migrations, and creates the Super Admin.      |
| `php artisan ultimate:scan-routes` | Scans your application routes and syncs them with the permissions table. |

---

## 📋 Troubleshooting

**"Could not find a matching version"**

- Ensure you added the `repositories` block to your `composer.json` correctly.
- Run `composer clear-cache`.

**"GitHub API limit exhausted"**

- Use a personal access token with Composer: `composer config --global github-oauth.github.com <YOUR_TOKEN>`

**Styles look broken**

- Ensure you are running `npm run dev` or have run `npm run build`.
- Verify that `ultimate-starter-kit` views are being scanned by Tailwind (this is handled automatically during install, but check `tailwind.config.js` if issues persist).

---

## Author

**Ahmed Hany**

- 🌐 **GitHub**: [@EngOREOO](https://github.com/EngOREOO/)
- 📧 **Email**: engoreoo@gmail.com

## License

The MIT License (MIT).
