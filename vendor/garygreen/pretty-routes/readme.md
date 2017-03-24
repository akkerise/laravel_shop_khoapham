Pretty Routes for Laravel 5
====

Visualise your routes in pretty format.

![Pretty Routes](https://raw.githubusercontent.com/garygreen/pretty-routes/master/screenshot.png)

# Installation

```bash
composer require garygreen/pretty-routes
```

Add to your `config/app.php` providers array:

```php
PrettyRoutes\ServiceProvider::class,
```

By default the package exposes a `/routes` url. If you wish to configure this, publish the config.

```bash
php artisan vendor:publish --provider="PrettyRoutes\ServiceProvider"
```
