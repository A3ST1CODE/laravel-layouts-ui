# Laravel Layouts UI

A Laravel package to generate reusable layout templates for your Laravel applications. This package provides a complete set of blade layout templates and associated assets for quick Laravel application setup.

## Features

- Pre-built responsive layout templates
- Automated assets extraction
- Easy installation and setup
- Support for Laravel 8.x and 9.x
- Customizable templates
- Built-in navigation components

## Requirements

- PHP ^7.3|^8.0
- Laravel ^8.0|^9.0
- ZipArchive PHP extension

## Installation

Install the package via Composer:

```bash
composer require a3stic0de/laravel-layouts-ui
```

The package will automatically register its service provider [`LayoutsServiceProvider`](src/LayoutsServiceProvider.php).

## Usage

### Quick Setup

Generate all layouts and extract assets using the provided Artisan command:

```bash
php artisan layouts:generate
```

This command will:
1. Create layout files in `resources/views/layouts/`
2. Extract assets to `public/assets/`

### Manual Publishing

Publish only the layout views:

```bash
php artisan vendor:publish --tag=layouts
```

Publish only the assets:

```bash
php artisan vendor:publish --tag=assets
```

## Layout Components

The package includes the following blade templates:

- `main.blade.php` - Base layout template
- `navbar.blade.php` - Navigation bar component
- `sidebar.blade.php` - Sidebar navigation component
- `footer.blade.php` - Footer component

## Configuration

The layout templates are highly customizable. After publishing, you can find them in:

```
resources/views/layouts/
├── main.blade.php
├── navbar.blade.php
├── sidebar.blade.php
└── footer.blade.php
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Security

If you discover any security-related issues, please email via GitHub instead of using the issue tracker.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).