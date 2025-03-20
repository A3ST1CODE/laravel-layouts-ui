# Laravel Layouts UI

A Laravel package to generate reusable layout templates for your Laravel applications.

## Installation

You can install the package via composer:

```bash
composer require a3stic0de/laravel-layouts-ui
```

The package will automatically register its service provider.

## Usage

To generate the layout views, run:

```bash
php artisan layouts:generate
```

This will create the following layout files in your `resources/views/layouts` directory:
- `main.blade.php`
- `navbar.blade.php`
- `sidebar.blade.php`
- `footer.blade.php`

## Manual Publishing

If you prefer to publish the views manually, you can use:

```bash
php artisan vendor:publish --tag=layouts
```

## Requirements

- PHP ^7.3|^8.0
- Laravel ^8.0|^9.0

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).