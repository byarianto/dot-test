## Requirements
- PHP 7.2 Above
- Composer

## Installation

### Install Vendor
```
composer install
composer dumpautoload
```

### Migrate Database
```
php artisan migrate
```

### Setup Environment
```
cp .env.example .env
```

## Fetch API Raja Ongkir
type = province/city
```
php artisan fetch {type}
```