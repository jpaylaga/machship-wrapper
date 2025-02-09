# Machship Wrapper

This package is a Laravel wrapper for the Machship API. It is intended solely to demonstrate my coding style and understanding of the Machship API, based on their [public API documentation](https://live.machship.com/swagger/index.html).

## Features
- Provides a structured API wrapper for Machship services.
- Implements contracts, facades, and service providers for clean Laravel integration.
- Supports dependency injection and service container bindings.
- Uses Guzzle for API requests.

## Installation

You can install this package via Composer:

```bash
composer require jpaylaga/machship-wrapper
```

If you are using Laravel, the package supports auto-discovery. Otherwise, you may need to register the service provider manually.

## Configuration

After installation, publish the configuration file:

```bash
php artisan vendor:publish --tag=config
```

This will create a `config/machship.php` file where you can set your Machship API credentials.

### `.env` Configuration
Ensure you have the following environment variables set:

```
MACHSHIP_API_BASE_URL=https://api.machship.com
MACHSHIP_API_TOKEN=your-api-token
```

## Usage

### Resolving the Service
You can use the Machship facade:

```php
use Machship;

$attachments = Machship::attachments()->getAttachment(123);
$authCheck = Machship::authenticate()->ping();
```

Alternatively, resolve via dependency injection:

```php
use Jpaylaga\MachshipWrapper\Contracts\MachshipContract;

class ExampleController {
    protected $machship;

    public function __construct(MachshipContract $machship)
    {
        $this->machship = $machship;
    }

    public function index()
    {
        return $this->machship->attachments()->getAll();
    }
}
```

## Available Services

### Attachments
```php
Machship::attachments()->getAttachment($id);
Machship::attachments()->uploadAttachments($attachments);
```

### Authentication
```php
Machship::authenticate()->ping();
```

### Carrier Invoices
```php
Machship::carrierInvoices()->getAllCarrierInvoices();
Machship::carrierInvoices()->getEntriesForInvoice($invoiceId);
```

### Companies
```php
Machship::companies()->getAllCompanies();
```

## Testing

You can test the package using PHPUnit:

```bash
vendor/bin/phpunit
```

## Roadmap
- Improve error handling with custom exceptions.
- Add more Machship API endpoints.
- Enhance unit tests and mock responses.

## Disclaimer
This package is a work in progress and does not implement all Machship services. Additionally, no unit tests have been created, as this project was developed abruptly for demonstration purposes.

## License
This package is for demonstration purposes only and is not intended for production use.

## Author
Created by [Your Name] as a personal learning project.

